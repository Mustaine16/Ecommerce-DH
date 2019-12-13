<?php

/*
***********
VALIDACIONES
    DE
REGISTRO
***********
*/

//Valida que los inputs del formulario sean validos, es decir que mail sea mail, que no vengan vacios, etc
function validarFormularioRegistracion($POST,$FILES)
{

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
        else if($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "webp"){
            $errores["avatar"] = "Solo se admiten imagenes .png , .jpg , .jpeg o .webp";
        }
    }

    return $errores;
}

//La idea es que no haya 2 usuarios con un mismo mail o nombre de ususario
function validarRegistracion($POST)
{
    
    $error = [];

    $usuariosJSON = file_get_contents("usuarios/usuarios.json"); //traerme el json

    $usuarios = json_decode($usuariosJSON,true); //decodearlo

    if($usuarios){

        foreach ($usuarios as $usuario) {

            if($usuario["email"] == strtolower($POST["email"])){
                $error["email"] = "Ya se existe un usuario registrado con este email";
                var_dump("MAN EL EMAIL");
            }
            
            if($usuario["username"] == strtolower($POST["username"])){
                $error["username"] = "Ya se existe un usuario con este nombre";
            }
        }   
        return $error;
    }else{
        return $error ;
    }   


    //chequear usuario

    //guardar errores

    //else --> esta todo OK, registrar al usuario
}

//Persistimos los datos que sean validos en login o registro
function persistirDato($arrayDeErrores, $campo)
{
    if (isset($arrayDeErrores[$campo])) {
        return "";
    } else {
        if (isset($_POST[$campo])) {
            return $_POST[$campo];
        }
    }
}

//Mostramos los errores debajo de cada input del registro
function mostrarErrorRegistro($erroresFormulario, $erroresRegistro,$input)
{
    if(isset($erroresFormulario[$input])) {
        echo "<small class='text-danger'>" . $erroresFormulario[$input] . "</small>";
    } 
    
    if(isset($erroresRegistro[$input])) {
        echo "<small class='text-danger'>" . $erroresRegistro[$input] . "</small>";
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
function validarLogin($POST)
{
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
     

function mostrarErrorLogin($erroresLogin,$input)
{

    if(isset($erroresLogin[$input])) {
        echo "<small class='text-danger'>" . $erroresLogin[$input] . "</small>";
    } 
}

function buscarUsuarioPorEmail($email)
{
    $arrayUsuarios = getJSONDecodeado();
    foreach($arrayUsuarios as $usuario) {
      if($usuario['email'] == $email) {
        return $usuario;
      }
    }
}

?>