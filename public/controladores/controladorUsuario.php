<?php

require_once "helpers.php";


function registrarUsuario($POST, $FILES, &$errores){


  if ($POST){

    $Autenticador = new Autenticador;

    //Estos metodos validan los inputs y datos del usuario
    $Autenticador->validarRegistracion($_POST,$_FILES);
    //Arrays donde vamos a guardar los posibles errores
    $errores = $Autenticador->getErrores();

    if(count($errores) == 0){

      //Crear el objeto del Cliente/Admin

      $usuario;

      if($POST["username"] == "_admin"){
        $usuario = new Admin($POST["username"], $POST["password"], $POST["email"]);
      }else{
        $usuario = new Cliente($POST["username"], $POST["password"], $POST["email"]);
      }

      // Registrando al usuario

      $usuario->registrarse();

      //Redireccionar

      header("Location:login.php");
    }



  }
}

function loguearUsuario($POST, &$erroresLogin){

  $Autenticador = new Autenticador;
  
  //Estos metodos validan los inputs y datos del usuario
  $Autenticador->validarLogin($_POST);
  
  //Arrays donde vamos a guardar los posibles errores
  $erroresLogin = $Autenticador->getErrores();
   
  if ( count($erroresLogin) === 0 ) {

    // LOGUEO AL USUARIO E INICIO SESION

    session_start();

    $dataUsuario = $Autenticador->buscarUsuarioPorEmail($POST['email']);

    if($dataUsuario["permisos"]){
      $admin = new Admin();
      $admin->loguearse($dataUsuario);
    }else{
      $cliente = new Cliente();
      $cliente->loguearse($dataUsuario);
    }

  }
}

function editarPerfil($POST, &$SESSION, &$errores){

  if($POST){ 

    //VERIFICAMOS ERRORES

    $Autenticador = new Autenticador;
  
    $Autenticador->validarPerfil($_POST);
  
    $errores = $Autenticador->getErrores();
  
    //En caso de no haber errores, creamos una instancia de Cliente
    //Su metodo EditarPerfil Modificara la BBDD y $_SESSION actual
  
    if (count($errores) == 0){
  
      $Cliente = new Cliente($SESSION["email"], "", "");
  
      $Cliente->editarPerfil($POST, $SESSION);
  
    } 

  }
}

function editarCuenta($POST, &$SESSION, &$errores){

  if($POST){
    //VERIFICAMOS ERRORES

    $Autenticador = new Autenticador;

    $Autenticador->validarCuenta($_POST);

    $errores = $Autenticador->getErrores();

    //En caso de no haber errores, creamos una instancia de   Cliente
    //Su metodo EditarCuenta Modificara la BBDD y $_SESSION actual

    if (count($errores) == 0){

      $Cliente = new Cliente($SESSION["email"], "", "");

      $Cliente->editarCuenta($POST, $SESSION);

    } 
  }
}

function cambiarPassword($POST, &$SESSION, &$errores){

  if($POST){
    //VERIFICAMOS ERRORES

    $Autenticador = new Autenticador;

    $Autenticador->validarPassword($_POST);

    $errores = $Autenticador->getErrores();

    //En caso de no haber errores, creamos una instancia de   Cliente
    //Su metodo EditarCuenta Modificara la BBDD y $_SESSION actual

    if (count($errores) == 0){

      $Cliente = new Cliente($SESSION["email"], "", "");

      $Cliente->cambiarPassword($POST, $SESSION);

    } 
  }
}

function subirAvatar($FILES,$avatarFileName){
  move_uploaded_file($FILES["avatar"]["tmp_name"], "usuarios/avatars/" . $avatarFileName);
}

function checkCookie(){

  if(session_status() == PHP_SESSION_NONE){

  session_start(); 

  }

  if(isset($_COOKIE['email']) && !isset($_SESSION['email'])){
      // LOGUEO AL USUARIO E INICIO SESION

      // session_start();

      $Autenticador = new Autenticador;

      $usuario = $Autenticador->buscarUsuarioPorEmail($_COOKIE['email']);

      //Creo una posicion en $_SESSION por cada posicion del usuario, para evitar tener que hardcodear y checkear si existe tal o cual dato

      foreach ($usuario as $key => $value) {

        if($key != 'password'){
          $_SESSION[$key] = $value;
        }
        
      }
  }
}

function recuperarPass($POST){
  $jsonUsuarios = getJSONDecodeado();
 
  if($POST){
    $email = $POST['email'];
    foreach ($jsonUsuarios as $posicion => $usuario) {
      if ($POST['email'] == $usuario['email']) {

      setcookie("user-email-for-reset-password",$email);
      header("Location:resetpassword.php");

      }elseif (empty($POST['email'])) {

        echo "El campo no puede estar vacio";
        break;

      }elseif (!(buscarUsuarioPorEmail($email))) {

        echo "Email no encontrado";
        break;

      }
    }
  } 
}

?>