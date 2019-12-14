<?php

include_once "autoload.php";

if(session_status() == PHP_SESSION_NONE){
  session_start();

 }


//Si no hay una sesion iniciada, se redirige al login
// redirigir("login",false);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
   require_once "partials/head.php";
 ?>
    <!-- Title -->
    <title>Home</title>
  </head>
  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- esto envuelve al formulario -->
    <div class="container container-fluid fix-height" id="form-container">
      <h1 class="important-text">Contraseña olvidada</h1>
      <form action="forgotpassword.php" method= "POST">
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            class="form-control email-input"
            name="email"
          />
        </div>
        <input
          type="submit"
          class="col col-md-auto col-lg-auto btn btn-lg btn-primary"
          value="Recuperar cuenta"
        />

        <div class="form-group">
          <?= (recuperarPass($_POST)) ?>
        </div>
      </form>
    </div>

    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>
    
    <?php
    require_once "partials/javascript_scripts.php";
    ?>
  </body>
</html>
