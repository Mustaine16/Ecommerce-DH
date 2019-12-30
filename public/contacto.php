<?php
/**
 * Luego de validar los campos redirige a una pagina
 * que le informa que el formulario fue enviado
 * y luego redirige a index.php.
 * 
 * Puede obviarse sin lugar a dudas, pero es divertido.
 */

$errores = [];

require_once "autoload.php";
 //aca podria ponerse los datos del usuario si es que hay session...
if($_POST){

  $errores = validarFormularioContacto( $_POST );

  if( count( $errores ) == 0){
     header("Location: form_contacto_enviado.php");    
  }

}


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include_once "partials/head.php" ;?>  
    <!-- Title -->
    <title>Home</title>
  </head>
  <body>

    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- Main -->
    <section class="container p-3 fix-height">
      <h1>Contactanos</h1>
      <!-- esto envuelve al formulario -->
      <article class="container container-fluid" id="form-container">
        <form action="contacto.php" method="post">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input
              type="text"
              id="nombre"
              class="form-control text-input"
              name="nombre"
              value="<?= persistirDato($errores, "nombre"); ?>"
            />
            <?php mostrarError("nombre",$errores)  ?>
          </div>
          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input
              type="text"
              class="form-control text-input"
              id="apellido"
              name="apellido"
              value="<?= persistirDato($errores, "apellido"); ?>"
            />
            <?php mostrarError("apellido",$errores)  ?>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              class="form-control email-input"
              name="email"
              value="<?= persistirDato($errores, "email"); ?>"
            />
            <?php mostrarError("email",$errores)  ?>
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input
              type="tel"
              id="telefono"
              class="form-control password-input"
              name="telefono"
              value="<?= persistirDato($errores, "telefono"); ?>"
            />
            <?php mostrarError("telefono",$errores)  ?>
          </div>
          <div class="form-group">
            <input
              type="submit"
              class="col col-md-auto col-lg-auto btn btn-lg btn-primary"
              value="Enviar"
              id="create-count"
            />
          </div>
          <div class="form-group">
            <!--      <p>aca puede ir un captcha o algo</p> -->
          </div>
        </form>
      </article>
    </section>

    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>

    <?php
    require_once "partials/javascript_scripts.php";
    ?>
  </body>
</html>