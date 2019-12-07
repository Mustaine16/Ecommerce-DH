<?php

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


?>