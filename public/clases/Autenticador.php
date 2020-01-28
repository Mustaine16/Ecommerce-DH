<?php

abstract class Autenticador{

  private static $errores;

  /*
  ***********
  VALIDACIONES
      DE
  REGISTRO
  ***********
  */

//Valida que los inputs del formulario sean validos, es decir que mail sea mail, que no vengan vacios, etc
  public function validarFormularioRegistracion($POST,$FILES){

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
  public function validarRegistracionEnBBDD($POST){
  
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



  /**
   * Get the value of errores
   */ 
  public function getErrores()
  {
    return self::$errores;
  }

  /**
   * Set the value of errores
   *
   * @return  self
   */ 
  public function setErrores($errores)
  {
    $this->errores = $errores;

    return $this;
  }
}


?>