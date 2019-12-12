<?php

require_once "autoload.php";

$erroresLogin = [];

login($_POST,$erroresLogin);


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
    <link rel="stylesheet" href="css/login.css" />
    <!-- Title -->
    <title>Login</title>
  </head>
  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- esto envuelve al formulario -->
    <section class="container formularios__container" id="form-container">

      <h1 class="important-text my-3">Inicia Sesión</h1>

      <form action="login.php" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="text"
            id="email"
            class="form-control email-input"
            name="email"
            value= '<?php persistirDato($erroresLogin,"email"); ?>'
          />
          <?php mostrarErrorLogin($erroresLogin,"email")  ?> 
        </div>
        <div class="form-group">
          <label for="password">Clave</label>
          <input
            type="password"
            id="password"
            class="form-control password-input"
            name="password"
          />
          <?php mostrarErrorLogin($erroresLogin,"password");  ?> 
        </div>
        <div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
    <label class="form-check-label" for="defaultCheck1">
    Recordarme
   </label>
  </div>
        <div class="form-group">
          <input
            type="submit"
            class="col col-md-auto col-lg-auto mb-3 btn btn-lg btn-primary"
            value="Ingresar"
            id="login"
          />
          <a
            class="col col-md-auto col-lg-auto mb-3 btn btn-lg btn-info "
            href="forgotpassword.php"
            id="forgot"
            role="button"
            >Olvidé mi contraseña</a
          >
        </div>
      </form>
    </section>

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
