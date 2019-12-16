<?php
include_once "autoload.php";

if(session_status() == PHP_SESSION_NONE){
  session_start();
}
  
//Si no hay una sesion iniciada, se redirige al login
redirigir("login",false);


//Funcion para editar la informacion del usuario
$errores = [];

if($_POST){

  $errores = validarPassword($_POST);

  if(count($errores) == 0){

    editarUsuario($_POST,$_SESSION);

  }

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
/**
 * ver comentario en perfil.php
 * 
 */

   require_once "partials/head.php";
 ?>
    <link rel="stylesheet" href="css/perfil.css">
    <!-- Title -->
    <title>Cambiar Contraseña</title>
  </head>

  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <main class="container mt-4" id="form-container">
      <!-- LISTA -->
      <ul>
         <li><a href="perfil.php">Perfil</a></li>
         <li><a href="cuenta.php">Cuenta</a></li>
         <li><a href="password.php" class="active">Seguridad</a></li>
      </ul>

      <!-- CARTEL PARA CONFIRMAR QUE LOS CAMBIOS FUERON GUARDADOS -->

      <?php

      if($_POST && count($errores) == 0):?>
        <div class="confirmar-cambios">
        <p>Cambios guardados</p>
        </div>
      <?php endif; ?>

      <!-- FORMULARIO -->
      <form action="" method="Post"   class="fix-height">
        <h1 class="">Cambiar contraseña</h1>

        <section>

          <div class="d-flex flex-column">
            <label for="password">Nueva contraseña</label>
            <input class="inputs-f" type="password" name="password" placeholder="Introduce tu password">
            <?= mostrarError($errores,"password")?>
          </div>

          <div class="d-flex flex-column">
            <label for="repassword">Repite la contraseña</label>
            <input class="inputs-f" type="password" name="repassword" placeholder="Repite la contraseña">
            <?= mostrarError($errores,"repassword")?>
          </div>

          <input type="submit" name="guardar" class="btn btn-primary" value="Guardar Cambios">
        </form>

      </section>



    <br />
    </main>
    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>
    
    <?php
    require_once "partials/javascript_scripts.php";
    ?>
  </body>
</html>
