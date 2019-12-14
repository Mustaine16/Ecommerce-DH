<?php
require_once 'autoload.php';

if($_POST){
  $errores = validarPassword($_POST);
  if ( count($errores) == 0 ){   
    $users = getJSONDecodeado();
    
    $userToModify = getPositionByEMail($_COOKIE["user-email-for-reset-password"]);
    var_dump($userToModify);
    
    $userToModify--;
    
    $users[$userToModify]['password']=password_hash($_POST['password'],PASSWORD_DEFAULT);
    
    guardarJSON($users);

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
         <?= $errores['password']  ?>
       </div>
       <div class="form-group">
         <label for="repassword">Repetir Contraseña</label>
         <input type="password" id="repassword" class="form-control  password-input" name="repassword">
         <?= $errores['repassword']  ?>
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
