<?php

include_once "autoload.php";

if(session_status() == PHP_SESSION_NONE){
  session_start();
}
  
//Si no hay una sesion iniciada, se redirige al login
redirigir("login",false);


//Funcion para editar la informaciond el usuario
if($_POST){
  editarUsuario($_POST,$_SESSION);
}


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

      <!-- Formulario Datos Personales -->
      <form action="" method="Post"   class="fix-height">
        <h1 class="">Datos Personales</h1>
      <section>

        <div class="d-flex flex-column">
          <label for="nombre">Nombre</label>
          <input class="inputs-f" type="text" name="nombre" placeholder="Introduce tu nombre" 
          value= '<?= isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : "" ?>'>
        </div>

        <div class="d-flex flex-column">
          <label for="apellido">Apellido</label>
          <input class="inputs-f" type="text" name="apellido" placeholder="Introduce tu apellido" 
          value= "<?= isset($_SESSION["apellido"]) ? $_SESSION["apellido"] : "" ?>">
        </div>

        <div class="d-flex flex-column">
          <label for="direccion">Direccion</label>
          <input class="inputs-f" type="text" name="direccion" placeholder="Introduce tu direccion" 
          value='<?= isset($_SESSION["direccion"]) ? $_SESSION["direccion"] : "" ?>'>
        </div>

        <div class="d-flex flex-column">
          <label for="ciudad">Ciudad</label>
          <input class="inputs-f" type="text" name="ciudad" placeholder="Introduce tu ciudad" 
          value= '<?= isset($_SESSION["ciudad"]) ? $_SESSION["ciudad"] : "" ?>'>
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
