<?php

function getJSONDecodeado(){
  $json = file_get_contents("usuarios/usuarios.json");
  $jsonDecodeado = json_decode($json,true);

  return $jsonDecodeado;
}

function guardarJSON($usuarios){
  file_put_contents("usuarios/usuarios.json" ,json_encode($usuarios));
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

/**
 * Devuelve la posicion en el array de usuarios del usuario cuyo email coincida con
 * el pasado por parametro. 
 */
function getPositionByEMail($email)
{  $pos = NULL;
    $arrayUsuarios = getJSONDecodeado();
    foreach($arrayUsuarios as $usuario) {
     $pos++;
      if($usuario['email'] == $email) {
        return $pos;
      }
    }
}

?>