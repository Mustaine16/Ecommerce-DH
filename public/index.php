<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
   require_once "partials/head.php";
 ?>
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
    
    <?php
    require_once "partials/javascript_scripts.php";
    ?>
  </body>
</html>
