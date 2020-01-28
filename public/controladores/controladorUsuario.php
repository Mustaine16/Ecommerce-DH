<?php

require_once "helpers.php";

function crearUsuario($POST, $FILES){

  $idAvatar = uniqid("img_"); //ID unico con el cual vamos a crear el nombre del archivo del avatar
  $ext = strtolower(pathinfo($FILES["avatar"]["name"],PATHINFO_EXTENSION));

  $avatarFileName = $idAvatar . "." . $ext;

  // Crear el array para cada usuario y retornalo
  $usuarioFinal = [
      "email" => strtolower($POST["email"]),
      "username" => strtolower(trim($POST["username"])),
      "password" => password_hash($POST['password'], PASSWORD_DEFAULT),
      "avatar" => $avatarFileName
  ];

  return $usuarioFinal;
}

function editarUsuario($POST, &$SESSION = false, $COOKIE = false){

  if($POST){

    /*OBTENER EL USUARIO */

    if($SESSION){

      $usuarioEditado = buscarUsuarioPorEmail($SESSION['email']);

    }else if($COOKIE){ 

      /*Este caso se da, cuando el usuario olvidó su contraseña y necesita resetearla */

      $usuarioEditado = buscarUsuarioPorEmail($COOKIE["user-email-for-reset-password"]);

    }
   
    /*DATOS A MODIFICAR */

    foreach ($POST as $key => $value) {

      //CAMBIAR CONTRASEÑA
      
      if($key == "password"){
        $usuarioEditado["password"] = password_hash($POST["password"],PASSWORD_DEFAULT);
      }

      //SI EL USUARIO CAMBIA EL EMAIL, TAMBIEN DEBE ACTUALIZARSE LA COOKIE DE EMAIL
      if($key == "email" && isset($_COOKIE["email"])){
        setcookie("email", $POST['email'], time() + 60 * 60 * 24 * 7);
      }

      //DATOS RESTANTES

      if($key != "guardar" && $key != "password" && $key != "repassword"){
        $usuarioEditado[$key] = $POST[$key];
      }

    }

    //Abrir la base de datos y cambio usuario por UsuarioEditado

    $usuarios = getJSONDecodeado();

    foreach ($usuarios as &$usuario) {

      if($SESSION){

        if($usuario['email'] == $SESSION['email']){
          $usuario = $usuarioEditado;
          break;
        }

      }else if($COOKIE){

        if($usuario['email'] == $COOKIE["user-email-for-reset-password"]){
          $usuario = $usuarioEditado;
          break;
        }

      }
    }

    guardarJSON($usuarios);

    //Update $_SESSION para que se muestren los nuevos datos
     
    foreach($usuarioEditado as $k => $v ){
       $SESSION[$k] = $v;
    }

  }

}


function subirAvatar($FILES,$avatarFileName){
  move_uploaded_file($FILES["avatar"]["tmp_name"], "usuarios/avatars/" . $avatarFileName);
}


function registrarUsuario($POST, $FILES, &$erroresFormulario, &$erroresValidacionDeRegistro){
  if ($POST) {
    //Guardamos posibles errores
    $erroresFormulario = validarFormularioRegistracion($POST,$FILES);
    $erroresValidacionDeRegistro = validarUsuarioEmailDuplicado($POST);

    //Si no hubo errores, se registra al usuario
    if (count($erroresFormulario) == 0 & !$erroresValidacionDeRegistro) {

        //Crear el objeto del usuario/Admin

        $usuario;

        if($POST["username"] == "_admin"){
          $usuario = new Admin($POST["username"], $POST["password"], $POST["email"]);
        }else{
          $usuario = new Cliente($POST["username"], $POST["password"], $POST["email"]);
        }

        // Registrando al usuario

        $usuario->registrarse();

        var_dump($usuario);

        //Redireccionar

        header("Location:login.php");

    }
  }
}


function loguearUsuario($POST, &$erroresLogin){
  if ($POST) {

    //Se ejecuta la funcion que valida el login
    $erroresLogin = validarLogin($POST);
   
    if ( count($erroresLogin) === 0 && count($erroresLogin) === 0 ) {

      // LOGUEO AL USUARIO E INICIO SESION

      session_start();

      $usuario = buscarUsuarioPorEmail($POST['email']);

      //Creo una posicion en session por cada posicion del usuario, para evitar tener que hardcodear y checkear si existe tal o cual dato

      foreach ($usuario as $key => $value) {

        if($key != 'password'){
          $_SESSION[$key] = $value;
        }
        
      }

      //SI EL CHECKBOX DE RECORDAME esta tickeado entonces crea cookies C:
      if(isset($POST['mantenerLogueado']) && $POST['mantenerLogueado'] == "yes") {
             
        setcookie("email", $usuario['email'], time() + 60 * 60 * 24 * 7);

      }
      //Redirigimos al Perfil
      header('Location: perfil.php');
    }
  }
}

function checkCookie(){

  if(session_status() == PHP_SESSION_NONE){

  session_start(); 

  }

  if(isset($_COOKIE['email']) && !isset($_SESSION['email'])){
      // LOGUEO AL USUARIO E INICIO SESION

      // session_start();

      $usuario = buscarUsuarioPorEmail($_COOKIE['email']);

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