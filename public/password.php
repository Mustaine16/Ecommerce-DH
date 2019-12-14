<?php
require_once 'autoload.php';


if(session_status() == PHP_SESSION_NONE){
  session_start();

 
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
}
//Si no hay una sesion iniciada, se redirige al login
redirigir("login",false);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
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

      <form action="" method="Post"   class="fix-height">
        <h1 class="">Cambiar contraseña</h1>
      <!-- Datos de la cuenta -->
      <!-- <section>
        <h2 class="pl-3 font-weight-bold">Datos de Cuenta</h2>
        <div class="d-flex flex-column">
          <label for="usuario">Usuario</label>
          <input class="inputs-f" type="text" name="usuario" placeholder="Introduce tu nombre de usuario">
        </div>
        <div class="d-flex flex-column">
          <label for="nombre">Contraseña</label>
          <input class="inputs-f" type="password" name="password"  placeholder="Introduce tu contraseña">
        </div>
        <div class="d-flex flex-column">
          <label for="nombre">Email</label>
          <input class="inputs-f" type="email" name="email"  placeholder="Introduce un email">
        </div>
      </section>
      <br /> -->

      <!-- Datos Personales -->
      <section>

        <div class="d-flex flex-column">
          <label for="password">Nueva contraseña</label>
          <input class="inputs-f" type="password" name="password" placeholder="Introduce tu password">
        </div>

        <div class="d-flex flex-column">
          <label for="repassword">Repite la contraseña</label>
          <input class="inputs-f" type="password" name="repassword" placeholder="Repite la contraseña">
        </div>

        <input type="submit" name="guardar" class="btn btn-primary" value="Guardar Cambios"></input>
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
