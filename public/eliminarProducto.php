<?php
require_once "autoload.php";
  if($_POST){
    // var_dump($_POST);
    $p = new Producto($_POST);
    $baja="";
    if(  $p->eliminarProducto() ) {
      $baja = true;
      //echo "eliminado";
    }
    else {
      $baja = false;
      //echo "no eliminado";
    }
    //echo "eliminado";
    // else echo "no pasa nada";

  }
?>
<!DOCTYPE html>
<html lang="en">
<title>Producto Eliminado</title>
<?php
require_once "partials/head.php";
?>
</head>

<body>
      <!-- Header -->
      <?php include_once "partials/headerAdmin.php" ;?>
      <div>
        <div class='p-3 m-3  text-white'><?= isset($baja)&&$baja==true? "<p class='p-3 m-3 bg-success text-white'>producto eliminado</p>":"<p class='p-3 m-3 bg-warning '>product No existe</p>" ?></div>

      </div>
      <br>

      <!-- Cuerpo Principal -->
      <main class="py-4">
        <section class="container">
          <form method="POST" action="">
            <label for="productoAEliminar">Ingrese id producto a elimiar</label>
            <input type="text" name="id" value="">
            <button type="submit" class="btn btn-success">
              Eliminar
            </button>
          </form>
        </section>
      </main>

      <!-- Footer -->
      <?php include_once "partials/footer.php" ;?>

      <!-- Scripts -->
      <?php
        require_once "partials/javascript_scripts.php";
      ?>

</body>
