<?php

/**
 * Luego de registrarse el usuario puede llenar los datos personales.
 * Si hay errores en los campos recibe la alerta correspondiente, y si no se guardan los datos
 * y aparecen visibles siempre que exista la session.
 * En los casos de persistencia, se verifica que el usuario no pueda
 * dejar algun campo vacio una vez que ha llenado el mismo y quiera modificar sus datos;
 * es decir que si su email es abc@mail.com y quiere modificarlo y deja el campo vacio
 * y guarda cambios simplemente se volvera a llenar el campo con el dato de la session.
 * 
 */


include_once "autoload.php";

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

//Si no hay una sesion iniciada, se redirige al login
redirigir("login", false);


$errores = [];

if ($_POST) {

  $errores = validarDatosPersonales($_POST);

  if (count($errores) == 0) {

    editarUsuario($_POST, $_SESSION);
  }
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
  <?php include_once "partials/header.php"; ?>

  <main class="container mt-4" id="form-container">

    <!-- LISTA -->
    <ul>
      <li><a href="perfil.php" class="active">Perfil</a></li>
      <li><a href="cuenta.php">Cuenta</a></li>
      <li><a href="password.php">Seguridad</a></li>
    </ul>

    <!-- CARTEL PARA CONFIRMAR QUE LOS CAMBIOS FUERON GUARDADOS -->

    <?php

    if ($_POST && count($errores) == 0) : ?>
      <div class="confirmar-cambios">
        <p>Cambios guardados</p>
      </div>
    <?php endif; ?>

    <!-- Formulario Datos Personales -->
    <form action="" method="Post" class="fix-height">
      <h1 class="">Datos Personales</h1>
      <section>

        <div class="d-flex flex-column">
          <label for="nombre">Nombre</label>
          <input class="inputs-f" type="text" name="nombre" placeholder="Introduce tu nombre" 
          <?php if($_POST) : ?>
            value='<?= persistirDato($errores,"nombre") ?>'>
          <?php else : ?>
            value='<?= isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "" ?>'>
          <?php endif; ?>
          <span class="text-danger"><?= isset($errores["nombre"]) ? $errores["nombre"] : ""; ?></span>
        </div>

        <div class="d-flex flex-column">
          <label for="apellido">Apellido</label>
          <input class="inputs-f" type="text" name="apellido" placeholder="Introduce tu apellido"
          <?php if($_POST) : ?>
            value='<?= persistirDato($errores,"apellido") ?>'>
          <?php else : ?>
            value='<?= isset($_SESSION['apellido']) ? $_SESSION['apellido'] : "" ?>'>
          <?php endif; ?>
          <span class="text-danger"><?= isset($errores["apellido"]) ? $errores["apellido"] : ""; ?></span>
        </div>

        <div class="d-flex flex-column">
          <label for="direccion">Direccion</label>
          <input class="inputs-f" type="text" name="direccion" placeholder="Introduce tu direccion" 
          <?php if($_POST) : ?>
            value='<?= persistirDato($errores,"direccion") ?>'>
          <?php else : ?>
            value='<?= isset($_SESSION['direccion']) ? $_SESSION['direccion'] : "" ?>'>
          <?php endif; ?>
          <span class="text-danger"><?= isset($errores["direccion"]) ? $errores["direccion"] : ""; ?></span>
        </div>

        <div class="d-flex flex-column">
          <label for="ciudad">Ciudad</label>
          <input class="inputs-f" type="text" name="ciudad" placeholder="Introduce tu ciudad" 
          <?php if($_POST) : ?>
            value='<?= persistirDato($errores,"ciudad") ?>'>
          <?php else : ?>
            value='<?= isset($_SESSION['ciudad']) ? $_SESSION['ciudad'] : "" ?>'>
          <?php endif; ?>
          <span class="text-danger"><?= isset($errores["ciudad"]) ? $errores["ciudad"] : ""; ?></span>
        </div>

        <input type="submit" name="guardar" class="btn btn-primary" value="Guardar Cambios">
    </form>

    </section>



    <br />
  </main>
  <!-- Footer -->
  <?php include_once "partials/footer.php"; ?>

  <?php
    require_once "partials/javascript_scripts.php";
  ?>
</body>

</html>