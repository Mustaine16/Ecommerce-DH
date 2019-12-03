<?php

function subirAvatar($FILES,$POST,$id)
{
  $ext = pathinfo($FILES["avatar"]["name"],PATHINFO_EXTENSION);
  $username = $POST["username"];


  $avatarFileName = $username . "_" . $id . "." . $ext;

  move_uploaded_file($FILES["avatar"]["tmp_name"], "usuarios/avatars/" . $avatarFileName);
}

function getID(){}

?>