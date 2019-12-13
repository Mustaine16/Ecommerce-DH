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
    <!-- Title -->
    <title>Home</title>
  </head>

  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <br />
    <br />

    <section class="container fix-height">
      <h1 class="pl-3">Mi Perfil</h1>
      <br />
      <section>
        <h2 class="pl-3 font-weight-bold">Datos de Cuenta</h2>
        <div class="row border-top">
          <div class="col-4 col-sm-4 text-center font-weight-bold bg-info">
            Usuario
          </div>
          <div class="col-6 col-sm-6 text-center bg-light">marceroro90</div>
          <div class="col-2 col-sm-2 text-center bg-secondary">
            <a href=""
              ><i class="far fa-edit text-dark font-weight-bold"></i
            ></a>
          </div>
        </div>
        <div class="row border-top">
          <div class="col-4 col-sm-4 text-center font-weight-bold bg-info">
            Contraseña
          </div>
          <div class="col-6 col-sm-6 text-center bg-light">******</div>
          <div class="col-2 col-sm-2 text-center bg-secondary">
            <a href=""
              ><i class="far fa-edit text-dark font-weight-bold"></i
            ></a>
          </div>
        </div>
        <div class="row border-top border-bottom">
          <div class="col-4 col-sm-4 text-center font-weight-bold bg-info">
            E-Mail
          </div>
          <div class="col-6 col-sm-6 text-center bg-light">
            mrzs90@gmail.com
          </div>
          <div class="col-2 col-sm-2 text-center bg-secondary">
            <a href=""
              ><i class="far fa-edit text-dark font-weight-bold"></i
            ></a>
          </div>
        </div>
      </section>
      <br />
      <section>
        <h2 class="pl-3 font-weight-bold">Datos Personales</h2>
        <div class="row border-top">
          <div class="col-4 col-sm-4 text-center font-weight-bold bg-info">
            Nombre
          </div>
          <div class="col-6 col-sm-6 text-center bg-light">Marcelo</div>
          <div class="col-2 col-sm-2 text-center bg-secondary">
            <a href=""
              ><i class="far fa-edit text-dark font-weight-bold"></i
            ></a>
          </div>
        </div>
        <div class="row border-top">
          <div class="col-4 col-sm-4 text-center font-weight-bold bg-info">
            Apellido
          </div>
          <div class="col-6 col-sm-6 text-center bg-light">Rodriguez</div>
          <div class="col-2 col-sm-2 text-center bg-secondary">
            <a href=""
              ><i class="far fa-edit text-dark font-weight-bold"></i
            ></a>
          </div>
        </div>
        <div class="row border-top">
          <div class="col-4 col-sm-4 text-center font-weight-bold bg-info">
            Documento
          </div>
          <div class="col-6 col-sm-6 text-center bg-light">25.432.618</div>
          <div class="col-2 col-sm-2 text-center bg-secondary">
            <a href=""
              ><i class="far fa-edit text-dark font-weight-bold"></i
            ></a>
          </div>
        </div>
        <div class="row border-top">
          <div class="col-4 col-sm-4 text-center font-weight-bold bg-info">
            Teléfono
          </div>
          <div class="col-6 col-sm-6 text-center bg-light">11-6532-4879</div>
          <div class="col-2 col-sm-2 text-center bg-secondary">
            <a href=""
              ><i class="far fa-edit text-dark font-weight-bold"></i
            ></a>
          </div>
        </div>
        <div class="row border-top">
          <div class="col-4 col-sm-4 text-center font-weight-bold bg-info">
            Dirección
          </div>
          <div class="col-6 col-sm-6 text-center bg-light">Tucumán 1342</div>
          <div class="col-2 col-sm-2 text-center bg-secondary">
            <a href=""
              ><i class="far fa-edit text-dark font-weight-bold"></i
            ></a>
          </div>
        </div>
        <div class="row border-top border-bottom">
          <div class="col-4 col-sm-4 text-center font-weight-bold bg-info">
            Localidad
          </div>
          <div class="col-6 col-sm-6 text-center bg-light">CABA</div>
          <div class="col-2 col-sm-2 text-center bg-secondary">
            <a href=""
              ><i class="far fa-edit text-dark font-weight-bold"></i
            ></a>
          </div>
        </div>
        <div class="row border-top border-bottom">
          <div class="col-4 col-sm-4 text-center font-weight-bold bg-info">
            C.P
          </div>
          <div class="col-6 col-sm-6 text-center bg-light">1050</div>
          <div class="col-2 col-sm-2 text-center bg-secondary">
            <a href=""
              ><i class="far fa-edit text-dark font-weight-bold"></i
            ></a>
          </div>
        </div>
      </section>
    </section>

    <br />

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
