<?php

include_once "autoload.php";

if(session_status() == PHP_SESSION_NONE){
  session_start();
  if($_POST){
    $users = getJSONDecodeado();
  
    $userPersonalDataIndex = getPositionByEmail($_SESSION["email"]);
    $userPersonalDataIndex--;
  
    $users[$userPersonalDataIndex]['username']=$_POST['usuario'];
    $users[$userPersonalDataIndex]['email']=$_POST['email'];
    guardarJSON($users);

    }
}

//Si no hay una sesion iniciada, se redirige al login
redirigir("login",false);

?>


<!DOCTYPE html>
<html lang="en">
<?php
   require_once "partials/head.php";
 ?>
    <link rel="stylesheet" href="css/perfil.css">
    <!-- Title -->
    <title>Cuenta</title>
  </head>

  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <main class="container mt-4" id="form-container">
      <!-- LISTA -->
      <ul>
        <li><a href="perfil.php">Perfil</a></li>
        <li><a href="cuenta.php" class="active">Cuenta</a></li>
        <li><a href="password.php">Seguridad</a></li>
      </ul>

      <form action="" method="Post"   class="fix-height">
        <h1 class="">Cambiar datos de la cuenta</h1>
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
          <label for="usuario">Usuario</label>
          <input class="inputs-f" type="text" name="usuario" placeholder="Introduce tu usuario" value= '<?= $_SESSION["username"]; ?>'>
        </div>

        <div class="d-flex flex-column">
          <label for="email">Email</label>
          <input class="inputs-f" type="email" name="email" placeholder="Introduce tu email" value= '<?= $_SESSION["email"]; ?>'>
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
