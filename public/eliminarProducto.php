<?php
require_once "autoload.php";
  // if($_POST){
  //   // var_dump($_POST);
  //   $p = new Producto($_POST);
  //   $baja="";
  //   if(  $p->eliminarProducto() ) {
  //     $baja = true;
  //
  //   }
  //   else {
  //     $baja = false;
  //   }
  //
  // }
  $eliminarOK ="";
    if(isset($_POST)&& count($_POST)!=0){

      //Crear el producto solamente si tiene nombre
      // if(!empty($_POST['nombre']) ){
        // $_POST['id']="";
        $p = new Producto($_POST);
        $transaccion0k = $p->eliminarProducto();
        if($transaccion0k){
          //echo "Transaccion ok";
          header("location:abm.php");
        }
          else {
            echo "Transaccion no OK :";
          }
        // $creacionOK = true;
      }
    // }
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
      <?php if(isset($transaccion0k)){
              if($eliminarOK!=true){
                echo "<div class='alert alert-danger' role='alert'>No se pudo eliminar el producto</div>";
              }
      }
      ?>
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
