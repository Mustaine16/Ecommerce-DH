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
    <link rel="stylesheet" href="css/detalles.css" />
    <!-- Title -->
    <title>Producto - Detalle</title>
  </head>
  <body>

    <!-- Header -->
    <?php include_once "partials/header.php" ;?>
    
    <!-- Cuerpo Principal -->

    <!-- Container de la vista del detalle -->
    <section class="container pt-2 mb-2">
      <article class="producto__container p-2">
        <!-- Imagen del producto -->
        <figure class="producto__imagen text-center">
          <img src="img/1.png" class="img-fluid" alt="" />
        </figure>
        <!-- Nombre, precio y añadir la carrito -->
        <div class="producto__vender-container">
          <h2 class="producto__nombre">Samsung Galaxy A8</h2>
          <p class="producto__precio">$25.000</p>
          <button class="producto__carrito">
            + Añadir al carrito
          </button>
        </div>
        <div class="producto__detalles">
          <h3>Detalles</h3>
          <div class="producto__detalle">
            <p class="detalle_nombre">Sistema Operativo</p>
            <p class="detalle_data">Android</p>
          </div>
          <div class="producto__detalle">
            <p class="detalle_nombre">Pantalla</p>
            <p class="detalle_data">5.6"</p>
          </div>
          <div class="producto__detalle">
            <p class="detalle_nombre">Cámara</p>
            <p class="detalle_data">16.0 MP</p>
          </div>
          <div class="producto__detalle">
            <p class="detalle_nombre">Memoria Interna</p>
            <p class="detalle_data">32GB</p>
          </div>
          <div class="producto__detalle">
            <p class="detalle_nombre">Memoria RAM</p>
            <p class="detalle_data">4GB</p>
          </div>
        </div>
      </article>
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
