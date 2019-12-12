<?php
require_once 'autoload.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Alata|Quicksand:400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- Estilos -->
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <!-- Title -->
    <title>Home</title>
  </head>
  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- esto envuelve al formulario -->
    <div class="container container-fluid fix-height" id="form-container">
      <h1 class="important-text">Contraseña olvidada</h1>
      <form action="forgotpassword.php" method= "POST">
        <div class="form-group">
          <p>
            introduce el email con el que te registraste <br />
            te enviaremos un correo con instrucciones para restablecer tu
            contraseña
          </p>
          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            class="form-control email-input"
            name="email"
          />
        </div>
        <input
          type="submit"
          class="col col-md-auto col-lg-auto btn btn-lg btn-primary"
          value="Recuperar cuenta"
        />
        <div class="form-group">
          <!--       <p>aca puede ir un captcha o algo</p> -->
          <?= (recuperarPass($_POST)) ?>

        </div>
      </form>
    </div>

    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>
    
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script
      src="https://kit.fontawesome.com/2641c51c10.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
