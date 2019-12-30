<?php

require_once "autoload.php";

if(session_status() == PHP_SESSION_NONE){
  session_start();
}

$erroresLogin = [];

loguearUsuario($_POST,$erroresLogin);

//Si existe una sesion, redirige al perfil
redirigir("perfil");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
   require_once "partials/head.php";
 ?>
    <link rel="stylesheet" href="css/login.css" />
    <!-- Title -->
    <title>Login</title>
  </head>
  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- esto envuelve al formulario -->
    <section class="container formularios__container" id="form-container">

      <h1 class="important-text my-3">Inicia Sesión</h1>

      <form action="login.php" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="text"
            id="email"
            class="form-control email-input"
            name="email"
            value= '<?= persistirDato($erroresLogin,"email"); ?>'
          />
          <?php mostrarError("email",$erroresLogin)  ?> 
        </div>
        <div class="form-group">
          <label for="password">Clave</label>
          <input
            type="password"
            id="password"
            class="form-control password-input"
            name="password"
          />
          <?php mostrarError("password",$erroresLogin);  ?> 
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="yes" id="defaultCheck1" name="mantenerLogueado">
          <label class="form-check-label" for="defaultCheck1">Mantenerme Logueado</label>
        </div>
        <div class="form-group buttons">
          <input
            type="submit"
            class="col col-md-auto col-lg-auto mb-3 btn btn-lg btn-primary"
            value="Ingresar"
            id="login"
          />
          <a
            class="col col-md-auto col-lg-auto mb-3 text-center"
            href="forgotpassword.php"
            id="forgot"
            role="button"
            >Olvidé mi contraseña</a
          >
        </div>
      </form>
    </section>

    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>
    
    <?php
    require_once "partials/javascript_scripts.php";
    ?>
  </body>
</html>
