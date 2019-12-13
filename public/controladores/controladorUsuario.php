<?php

require_once "helpers.php";

function crearUsuario($POST,$FILES){

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


function subirAvatar($FILES,$avatarFileName){
  move_uploaded_file($FILES["avatar"]["tmp_name"], "usuarios/avatars/" . $avatarFileName);
}


function registrarUsuario($POST, $FILES, &$erroresFormulario, &$erroresValidacionDeRegistro){
  if ($POST) {
    //Guardamos posibles errores
    $erroresFormulario = validarFormularioRegistracion($POST,$FILES);
    $erroresValidacionDeRegistro = validarRegistracion($POST);

    //Si no hubo errores, se registra al usuario
    if (count($erroresFormulario) == 0 & !$erroresValidacionDeRegistro) {
        //Todo salió bien!

        //Crear el aray del usuario

        $usuarioFinal = crearUsuario($POST,$FILES);
        subirAvatar($FILES,$usuarioFinal["avatar"]);

        // Registrando al usuario

        $jsonUsuarios = getJSONDecodeado();

        $jsonUsuarios[] = $usuarioFinal;

        guardarJSON($jsonUsuarios);

        //Redireccionar

        header("Location:login.php");

    }
  }
}


function login($POST, &$erroresLogin){
  if ($_POST) {

    //Se ejecuta la funcion que valida el login
    $erroresLogin = validarLogin($POST);
   
    if ( count($erroresLogin) === 0 && count($erroresLogin) === 0 ) {

      // LOGUEO AL USUARIO E INICIO SESION

      session_start();

      $usuario = buscarUsuarioPorEmail($_POST['email']);

      $_SESSION['email'] = $usuario['email'];
      $_SESSION['avatar'] =  $usuario['avatar'];

      //SI EL CHECKBOX DE RECORDAME esta tickeado entonces crea cookies C:
      if(isset($_POST['recordarme']) && $_POST['recordarme'] == "on") {
             
        setcookie('usEmail', $usuario['email'], time() + 60 * 60 * 24 * 7);
        setcookie('userPass', $usuario['password'], time() + 60 * 60 * 24 * 7);
        
      }
      //Redirigimos al Perfil
      header('Location: perfil.php');
    }
  }
}


function recuperarPass($arrayPOST){
  $jsonUsuarios = getJSONDecodeado();
 
  if($_POST){
    $email = $arrayPOST['email'];
    foreach ($jsonUsuarios as $posicion => $usuario) {
    if ($arrayPOST['email'] == $usuario['email']) {

      echo '
      <br>
      <div class="form-group">
        <label for="password">Nueva Contraseña</label>
        <input type="password" id="password" class="form-control  password-input" name="password">
      </div>
      <div class="form-group">
        <label for="repassword">Repetir Contraseña</label>
        <input type="password" id="repassword" class="form-control  password-input" name="repassword">
      </div>
      <div class="form-group">
        <input type="submit" class="col col-md-auto col-lg-auto btn btn-lg btn-primary" value="Cambiar contraseña" id="registracion" />
      </div>';

      break;

    }elseif (empty($_POST['email'])) {
      echo "El campo no puede estar vacio";
    break;
    }
    elseif (!(buscarUsuarioPorEmail($email))) {
      echo "Email no encontrado";
    break;
    }
    }
  } 
}

?>