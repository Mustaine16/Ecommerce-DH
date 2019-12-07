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
    <link href="https://fonts.googleapis.com/css?family=Alata|Quicksand:400,500,700&display=swap" rel="stylesheet">
    <!-- Estilos -->
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <link rel="stylesheet" href="css/home.css" type="text/css" />

    <title>Home</title>
  </head>
  <body>

    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- Cuerpo Principal -->
    <main>
      <section class="company-info">
        <h3>¿Quienes Somos?</h3>
        <article class="company-info-item">
          <div class="bubble-item">
            <i class="fas fa-mobile-alt bubble-icon"></i>
          </div>
          <h5 class="m-0 bubble-text">
              Buy it! es una empresa Argentina la cual fundada en el año 2019, con la meta de ser líder en el rubro de accesorios para telefonía celular y dispositivos móviles.
          </h2>
        </article>
        <article class="company-info-item">
          <div class="bubble-item">
            <i class="fas fa-flag-checkered bubble-icon"></i>
          </div>
          <h5 class="m-0 bubble-text">
              Nuestro principal objetivo es ofrecer productos con la mejor calidad, siempre innovando para ser los primeros en traer los últimos modelos al mercado.
          </h2>
        </article>
        <article class="company-info-item">
          <div class="bubble-item">
            <i class="fas fa-shield-alt bubble-icon"></i>
          </div>
          <h5 class="m-0 bubble-text">
            Brindamos una garantía extendida por robo, extravío o posibles desperfectos. Nuestra prioridad es que el cliente tenga su producto asegurado.
          </h5>
        </article>
      </section>
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
