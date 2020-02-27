<?php
/**
 * 
 * 
 * 
 */

require_once 'autoload.php';

//Si no hay una sesion iniciada, se redirige al login
// redirigir("login",false);

$errores = [];

if($_POST){

  $errores = validarPassword($_POST);

  $void = []; //Necesito pasar una variable como referencia, la cual deberia ser SESSION, pero en este caso solo me sirve cookie ya que no hay Sesion iniciada

  if ( count($errores) == 0 ){   
    
    editarUsuario($_POST,$void, $_COOKIE);

    setcookie("user-email-for-reset-password", time() -1000);
    
    header("Location:login.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
   require_once "partials/head.php";
 ?>
    <!-- Title -->
    <title>Reset password</title>
  </head>
  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- esto envuelve al formulario -->
    <div class="container container-fluid fix-height" id="form-container">
      <h1 class="important-text">Contraseña olvidada</h1>
      <form action="resetpassword.php" method= "POST">
      <br>
       <div class="form-group">
         <label for="password">Nueva Contraseña</label>
         <input type="password" id="password" class="form-control  password-input" name="password">
         <?= mostrarError("password",$errores)  ?>
       </div>
       <div class="form-group">
         <label for="repassword">Repetir Contraseña</label>
         <input type="password" id="repassword" class="form-control  password-input" name="repassword">
         <?= mostrarError( "repassword",$errores)  ?>
       </div>
       <div class="form-group">
         <input type="submit" class="col col-md-auto col-lg-auto btn btn-lg btn-primary" value="Cambiar contraseña" id="registracion" />
       </div>
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
