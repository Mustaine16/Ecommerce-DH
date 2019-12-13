<?php

include_once "controladores/helpers.php";

if(session_status() == PHP_SESSION_NONE){
  session_start();
}

//Si no hay una sesion iniciada, se redirige al login
redirigir("login",false);

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
          <input class="inputs-f" type="text" name="usuario" placeholder="Introduce tu usuario">
        </div>

        <div class="d-flex flex-column">
          <label for="email">Email</label>
          <input class="inputs-f" type="email" name="email" placeholder="Introduce tu email">
        </div>

        <input type="submit" name="guardar" class="btn btn-primary" value="Guardar Cambios"></input>
      </form>

      </section>



    <br />
    </main>
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
