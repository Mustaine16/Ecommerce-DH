<?php

function getJSONDecodeado(){
  $json = file_get_contents("usuarios/usuarios.json");
  $jsonDecodeado = json_decode($json,true);

  return $jsonDecodeado;
}

function guardarJSON($usuarios){
  file_put_contents("usuarios/usuarios.json" ,json_encode($usuarios));
}
?>