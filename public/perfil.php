<?php

include_once "autoload.php";

if(session_status() == PHP_SESSION_NONE){
  session_start();
  $userPosition = getPositionByEmail($_SESSION["email"]);
  //poner datos en la sesion para 
  if( $userPosition != NULL ){
    $users = getJSONDecodeado();
    --$userPosition;
    $_SESSION['nombre'] = $users[$userPosition]['nombre'];
    $_SESSION['apellido'] = $users[$userPosition]['apellido'];
    $_SESSION['direccion'] = $users[$userPosition]['direccion'];
    $_SESSION['ciudad'] = $users[$userPosition]['ciudad'];
  }
//  var_dump($_SESSION);
  if($_POST){
    $users = getJSONDecodeado();
 
    $userPersonalDataIndex = getPositionByEmail($_SESSION["email"]);
    $userPersonalDataIndex--;
 
    $users[$userPersonalDataIndex]['nombre']=$_POST['nombre'];
    $users[$userPersonalDataIndex]['apellido']=$_POST['apellido'];
    $users[$userPersonalDataIndex]['direccion']=$_POST['direccion'];
    $users[$userPersonalDataIndex]['ciudad']=$_POST['ciudad'];
 
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
    <title>Perfil</title>
  </head>

  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <main class="container mt-4" id="form-container">
      <!-- LISTA -->
      <ul>
        <li><a href="perfil.php" class="active">Perfil</a></li>
        <li><a href="cuenta.php">Cuenta</a></li>
        <li><a href="password.php">Seguridad</a></li>
      </ul>

      <form action="" method="Post"   class="fix-height">
        <h1 class="">Datos Personales</h1>
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
          <label for="nombre">Nombre</label>
          <input class="inputs-f" type="text" name="nombre" placeholder="Introduce tu nombre" value= '<?= $_SESSION["nombre"]; ?>'>
        </div>

        <div class="d-flex flex-column">
          <label for="apellido">Apellido</label>
          <input class="inputs-f" type="text" name="apellido" placeholder="Introduce tu apellido" value= '<?= $_SESSION["apellido"]; ?>'>
        </div>

        <div class="d-flex flex-column">
          <label for="direccion">Direccion</label>
          <input class="inputs-f" type="text" name="direccion" placeholder="Introduce tu direccion" value= '<?= $_SESSION["direccion"]; ?>'>
        </div>

        <div class="d-flex flex-column">
          <label for="ciudad">Ciudad</label>
          <input class="inputs-f" type="text" name="ciudad" placeholder="Introduce tu ciudad" value= '<?= $_SESSION["ciudad"]; ?>'>
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
