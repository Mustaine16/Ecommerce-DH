<?php

include_once("autoload.php");

if($_POST){

  if(isset($_POST["borrar"])){
    header("Location:eliminarProducto.php");
  }

  if(isset($_POST["editar"])){
    header("Location:editarProducto.php");
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<?php
require_once "partials/head.php";
$productos = Producto::mostrarProducto();
?>

<!-- Title -->
<title>Alta-Baja-Modificacion</title>
</head>
  <body>

    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- Cuerpo Principal -->
    <main class="py-4 px-2 px-md-5">
      <a class="btn btn-success mb-3 d-block ml-auto p-3" href="agregarProducto.php">Agregar nuevo producto</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th>Imagen</th>
              <th scope="col">Nombre del Producto</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <?php
          
          foreach ($productos as $key => $value) {
            
          echo '<tbody>
            <tr>
              <!-- Id -->
              <th scope="row" id="id">'.$value["id"].'</th>
              <!-- Imagen -->
              <td>
                <img src='.$value["imagen"].' alt="Responsive image" width="40px" class="img-fluid">
              </td>
              <!-- Nombre -->
              <td>'.$value["nombre"].'</td>
              <!-- Botones -->
              <td>
                <form method="post" action="abm.php" class="d-flex justify-content-around">
                  <!-- ID DEL PRODUCTO, OCULTO, PARA PODER FILTRARLO EN LAS PAGINAS SIGUIENTES -->
                  <!-- EL VALUE TIENE QUE VENIR DE LA BBDD -->
                  <input type="text" name="id" value='.$value["id"].' style="display:none">
                  <button class="btn btn-danger mb-2" name="borrar">Borrar</button>
                  <button class="btn btn-success mb-2" name="editar">Editar</button>
                </form>
              </td>
            </tr>
          </tbody>';
          }
          ?>
        </table>
    </main>

    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>

    <!-- Scripts -->
    <?php
      require_once "partials/javascript_scripts.php";
    ?>
  </body>
</html>
