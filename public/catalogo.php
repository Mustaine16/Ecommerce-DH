<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
   require_once "autoload.php";
   require_once "partials/head.php";

    $productos = Producto::mostrarProducto();
 ?>
    <link rel="stylesheet" href="css/catalogo.css" type="text/css" />
    <title>Catálogo de Productos</title>
  </head>

  <body class="container-fluid p-0">

    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- Catalogo -->
    <section class="products__container">
    <h1>Catalogo</h1>
     <?php
 
     foreach ($productos as $key => $value) {
      echo '<article class="product__card">
      <figure>
        <img src='.$value["imagen"].' width="100" alt="" class="product__img" />
      </figure>
      <div class="product__info">
        <h3 class="product__name">'.$value["nombre"].'</h3>
        <p class="product__price">$'.$value['precio'].'</p>
        <a href="producto-detalle.php" class="product__link-details"
          >Ver más</a
        >
      </div>
    </article>';
    }

     ?>
    </section>

    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>
    
    <?php
    require_once "partials/javascript_scripts.php";
    ?>
  </body>
</html>
