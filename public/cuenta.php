<?php

/**
 * ver comentario en perfil.php
 * 
 */
include_once "autoload.php";

if(session_status() == PHP_SESSION_NONE){
  session_start();
}
  
//Si no hay una sesion iniciada, se redirige al login
redirigir("login",false);

$errores = [];

editarCuenta($_POST, $_SESSION, $errores);

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

      <!-- CARTEL PARA CONFIRMAR QUE LOS CAMBIOS FUERON GUARDADOS -->

      <?php

      if($_POST && count($errores) == 0):?>
        <div class="confirmar-cambios">
        <p>Cambios guardados</p>
        </div>
      <?php endif; ?>

      <!-- FORMULARIO -->

      <form action="" method="Post"   class="fix-height">

        <h1 class="">Cambiar datos de la cuenta</h1>

        <section>

          <div class="d-flex flex-column">
            <label for="usuario">Usuario</label>
            <input class="inputs-f" type="text" name="username" placeholder="Introduce tu usuario" value= '<?= $_SESSION["username"]; ?>'>
            <?=mostrarError("username",$errores)?>
          </div>

          <div class="d-flex flex-column">
            <label for="email">Email</label>
            <input class="inputs-f" type="email" name="email" placeholder="Introduce tu email" value= '<?= $_SESSION["email"]; ?>'>
            <?=mostrarError("email",$errores)?>
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
