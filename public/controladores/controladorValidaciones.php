<?php

/*
*********** 
  MOSTRAR
  ERRORES
    Y
  PERSISTIR
  DATOS
***********
*/


//Persistimos los datos que sean validos en login o registro
function persistirDato($arrayDeErrores, $campo){
    if (isset($arrayDeErrores[$campo])) {
        return "";
    } else {
        if (isset($_POST[$campo])) {
            return $_POST[$campo];
        }
    }
}

//Mostramos los errores debajo de cada input del registro
function mostrarError(string $input,$erroresFormulario, $erroresBBDD = null){
    if(isset($erroresFormulario[$input])) {
        echo "<small class='text-danger'>" . $erroresFormulario[$input] . "</small>";
    } 
    
    if(isset($erroresBBDD[$input])) {
        echo "<small class='text-danger'>" . $erroresBBDD[$input] . "</small>";
    } 

}

/*
***********
VALIDACIONES
    DE
REGISTRO
***********
*/

//Valida que los inputs del formulario sean validos, es decir que mail sea mail, que no vengan vacios, etc
function validarFormularioRegistracion($POST,$FILES){

    $errores = [];


    // Validamos campo "email"
    if (isset($POST["email"])) {
        if (empty($POST["email"])) {
            $errores["email"] = "Este campo debe completarse.";
        } elseif (!filter_var($POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errores["email"] = "Debés ingresar un email válido.";
        }
    }

    // Validamos campo "Nombre de usuario"
    if (isset($POST["username"])) {
        if (empty($POST["username"])) {
            $errores["username"] = "Este campo debe completarse.";
        } elseif (strlen($POST["username"]) < 6) {
            $errores["username"] = "Tu nombre debe tener al menos 6 caracteres.";
        }
    }

    // Validamos campo "password"
    if (isset($POST["password"])) {
        if (empty($POST["password"])) {
            $errores["password"] = "Este campo debe completarse.";
        } elseif (strlen($POST["password"]) < 6) {
            $errores["password"] = "Tu contraseña debe tener al menos 6 caracteres.";
        }
    }

    // Validamos campo "repassword"
    if (isset($POST["repassword"])) {
        if (empty($POST["repassword"])) {
            $errores["repassword"] = "Este campo debe completarse.";
        } elseif ($POST["password"] != $POST["repassword"]) {
            $errores["repassword"] = "Las contraseñas no coinciden.";
        }
    }

    //Validamos el Avatar
    if(isset($FILES["avatar"])){

        //Extension del archivo
        $ext = strtolower(pathinfo($FILES["avatar"]["name"],PATHINFO_EXTENSION));

        //Si el Avatar viene vacio
        if($FILES["avatar"]["error"] == 4){
            $errores["avatar"] = "El avatar es obligatorio";
        }
        //Algun error de carga
        else if ($FILES["avatar"]["error"] != 0){
            $errores["avatar"] = "Hubo un error al cargar el avatar";
        }
        //Tipo de archivo invalido
        else if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
            $errores["avatar"] = "Solo se admiten imagenes .png , .jpg o .jpeg ";
        }
    }

    return $errores;
}

//La idea es que no haya 2 usuarios con un mismo mail o nombre de ususario
function validarUsuarioEmailDuplicado($POST){
    
    $errores = [];

    $usuariosJSON = file_get_contents("usuarios/usuarios.json"); //traerme el json

    $usuarios = json_decode($usuariosJSON,true); //decodearlo

    if($usuarios){

        foreach ($usuarios as $usuario) {

            if($usuario["email"] == strtolower($POST["email"])){
                $errores["email"] = "Ya se existe un usuario registrado con este email";
            }

            if($usuario["username"] == strtolower($POST["username"])){
                $errores["username"] = "Ya se existe un usuario con este nombre";
            }
        }

        //ESTO ES EN CASO DE QUE SE IMPLEMENTE LA FUNCION EN EDITAR CUENTA
        /*
        * Puede ocurrir que el usuario solo quiera cambiar el usuario pero no el email, y viceversa 
        */
        if($_SESSION){

            if($_SESSION["email"] && $_SESSION["email"] == $POST["email"]){
                unset($errores["email"]);
            }
    
            if($_SESSION["username"] && $_SESSION["username"] == $POST["username"]){
                unset($errores["username"]);
            }
        }
        
        return $errores;
        
    }else{
        return $errores ;
    }   
}


/*
***********
VALIDACIONES
    DE
  LOGIN
***********
*/


//Valida que los inputs del formulario sean validos, es decir que mail sea mail, que no vengan vacios, etc
function validarLogin($POST){
    $errores = [];
    $email = trim($POST['email']);
    $pass = trim($POST['password']);

    //Errores de campos invalidos
    
    if(empty($email)) {
      $errores['email'] = 'El campo email es obligatorio';

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores['email'] = 'El formato introducido no es válido';

    } else if(empty($pass)) {

      $errores['password'] = 'El campo password es obligatorio';

    } else {

    //Errores de validacion en Base de Datos
        
      $usuario = buscarUsuarioPorEmail($email);

      if($usuario){

        if( !password_verify($pass, $usuario['password']) ) {
            $errores['password'] = 'Contraseña Incorrecta';
        }

      } else {

        $errores['email'] = "No existe un usuario registrado con ese email";
        
      }


    }

    return $errores;
}
     

/*
***********
VALIDACIONES
    DE
  PERFIL,
  CUENTA,
  CAMBIO DE
  PASSWORD
***********
*/

/*
 * Estas funciones validan los datos de perfil,
 * en realidad repiten en su mayoria las validaciones de mas arriba, 
 * asi que se podria modularizar mejor pero ante la duda de que no funcione algo que ya 
 * funcionaba simplemente copiar y pegar.
 *  En el caso validarDatosPersonales(), la validacion es muy simple y arbitraria:
 * nombre y apellido sin numeros, direccion y ciudad mimino de 5 caracteres.
 */

function validarPassword($POST){
    $errores=[];
    if (isset($POST["password"])) {
        if (empty($POST["password"])) {
            $errores["password"] = "Este campo debe completarse.";
        } elseif (strlen($POST["password"]) < 6) {
            $errores["password"] = "Tu contraseña debe tener al menos 6 caracteres.";
        }
    }

    // Validamos campo "repassword"
    if (isset($POST["repassword"])) {
        if (empty($POST["repassword"])) {
            $errores["repassword"] = "Este campo debe completarse.";
        } elseif ($POST["password"] != $POST["repassword"]) {
            $errores["repassword"] = "Las contraseñas no coinciden.";
        }
    }

    return $errores;
}

function validarCuenta($POST){
    
    $errores = [];
    // Validamos campo "email"
    if (isset($POST["email"])) {
        if (empty($POST["email"])) {
            $errores["email"] = "Este campo debe completarse.";
        } elseif (!filter_var($POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errores["email"] = "Debés ingresar un email válido.";
        }
    }
    // Validamos campo "Nombre de usuario"
    if (isset($POST["username"])) {
        if (empty($POST["username"])) {
            $errores["username"] = "Este campo debe completarse.";
        } elseif (strlen($POST["username"]) < 6) {
            $errores["username"] = "Tu nombre  de usuario debe tener al menos 6 caracteres.";
        }
    }
    return $errores;
}

function validarDatosPersonales($POST){

    $errores=[];

    // Validamos campo "Nombre de usuario"
    if (isset($POST["nombre"])) {
        if (empty($POST["nombre"])) {
            $errores["nombre"] = "Este campo debe completarse.";
        } elseif (strlen($POST["nombre"]) < 2) {
            $errores["nombre"] = "Tu nombre debe tener al menos 2 caracteres.";
        }elseif(!ctype_alpha($POST["nombre"])){
            $errores["nombre"] = "Tu nombre contiene número(s).";
        }
    }

    // Validamos campo "Apellido"
    if (isset($POST["apellido"])) {
        if (empty($POST["apellido"])) {
            $errores["apellido"] = "Este campo debe completarse.";
        } elseif (strlen($POST["apellido"]) < 2) {
            $errores["apellido"] = "Tu apellido debe tener al menos 2 caracteres.";
        }elseif(!ctype_alpha($POST["apellido"])){
            $errores["apellido"] = "Tu apellido contiene número(s).";
        }
    }

    // Validamos campo "Direccion"
    if (isset($POST["direccion"])) {
        if (empty($POST["direccion"])) {
            $errores["direccion"] = "Este campo debe completarse.";
        } elseif (strlen($POST["direccion"]) < 5) {
            $errores["direccion"] = "Tu direccion  debe tener al menos 5 caracteres.";
        }
    }

    // Validamos campo "Ciudad"
    if (isset($POST["ciudad"])) {
        if (empty($POST["ciudad"])) {
            $errores["ciudad"] = "Este campo debe completarse.";
        } elseif (strlen($POST["ciudad"]) < 2) {
            $errores["ciudad"] = "Tu ciudad  debe tener al menos 2 caracteres.";
        }
    }

    return $errores;
}


/**
 * VALIDACION FORMULARIO DE CONTACTO
 * en realidad repite en su mayoria las validaciones de mas arriba,
 * pero como es otro tipo de formulario por eso tiene otro nombre.
 * Con una modularizacion mayor se podr'ia eliminar redundancia, pero como
 * cada if devuelve un error  para un array de errores, hay que pensar y planicar bien
 * el asunto.
 */
function validarFormularioContacto($array){
    $errores = [];


    // Validamos campo "email"
    if (empty( $array["email"]) ) {
        $errores["email"] = "Este campo debe completarse.";
            if (isset( $array["email"]) ) {
        } elseif (!filter_var( $array["email"], FILTER_VALIDATE_EMAIL) ) {
            $errores["email"] = "Debés ingresar un email válido.";
        }
    }
    // Validamos campo "nombre"
    if (isset($array["nombre"])) {
        if (empty( $array["nombre"]) ) {
            $errores["nombre"] = "Este campo debe completarse.";
        } elseif (strlen( $array["nombre"] ) < 2) {
            $errores["nombre"] = "Tu nombre debe tener al menos 2 caracteres.";
        }
    }
    // Validamos campo "apellido"
    if (isset($array["apellido"])) {
        if (empty( $array["apellido"]) ) {
            $errores["apellido"] = "Este campo debe completarse.";
        } elseif (strlen( $array["apellido"] ) < 2) {
            $errores["apellido"] = "Tu apellido debe tener al menos 2 caracteres.";
        }
    }

    // Validamos campo "password"
    if (isset( $array["password"]) ) {
        if ( empty( $array["password"]) ) {
            $errores["password"] = "Este campo debe completarse.";
        } elseif ( strlen( $array["password"] ) < 2) {
            $errores["password"] = "Tu password debe tener al menos 2 caracteres.";
        }
    }

    // Validamos campo "telefono"
    if ( isset( $array["telefono"]) ) {
        if (empty( $array["telefono"]) ) {
            $errores["telefono"] = "Este campo debe completarse.";
        } elseif ( is_nan( $array["telefono"]) ) {
            $errores["telefono"] = "Ingrese un numero valido";
        }
    }

    return $errores;
}

?>