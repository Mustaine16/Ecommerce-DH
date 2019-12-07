<!DOCTYPE html>
<html lang="es">
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
    <link rel="stylesheet" href="css/catalogo.css" type="text/css" />
    <title>Catálogo de Productos</title>
  </head>

  <body class="container-fluid p-0">

    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- Catalogo -->
    <section class="products__container">
      <h1>Catalogo</h1>
      <article class="product__card">
        <figure>
          <img src="img/1.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Samsung Galaxy A8</h3>
          <p class="product__price">$20.999</p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
      <article class="product__card">
        <figure>
          <img src="img/2.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Xiamoi Note 3</h3>
          <p class="product__price">$18.999</p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/3.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Google Pixel 2</h3>
          <p class="product__price">
            $25.999
          </p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/4.webp" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Moto E6 Plus</h3>
          <p class="product__price">
            $15.999
          </p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/4.webp" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Moto E6 Plus</h3>
          <p class="product__price">
            $15.999
          </p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/4.webp" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Moto E6 Plus</h3>
          <p class="product__price">
            $15.999
          </p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/4.webp" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Moto E6 Plus</h3>
          <p class="product__price">
            $15.999
          </p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/4.webp" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Moto E6 Plus</h3>
          <p class="product__price">
            $15.999
          </p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
      <article class="product__card">
        <figure>
          <img src="img/1.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Samsung Galaxy A8</h3>
          <p class="product__price">$20.999</p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
      <article class="product__card">
        <figure>
          <img src="img/1.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Samsung Galaxy A8</h3>
          <p class="product__price">$20.999</p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
      <article class="product__card">
        <figure>
          <img src="img/1.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Samsung Galaxy A8</h3>
          <p class="product__price">$20.999</p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
      <article class="product__card">
        <figure>
          <img src="img/1.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Samsung Galaxy A8</h3>
          <p class="product__price">$20.999</p>
          <a href="producto-detalle.php" class="product__link-details"
            >Ver más</a
          >
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
