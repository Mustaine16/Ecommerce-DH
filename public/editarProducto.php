<!DOCTYPE html>
<html lang="en">
<?php
require_once "partials/head.php";
?>

<!-- Title -->
<title>Edtiar Producto</title>
</head>
  <body>

    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- Cuerpo Principal -->
    <main class="py-4">
      <section class="container">
        <form method="POST" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre del Producto</label>
            <input
              type="text"
              class="form-control"
              id="nombre"
              aria-describedby="NombreProducto"
              placeholder="Ingrese un nombre de producto"
              value=""
            />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Marca</label>
            <input
              type="text"
              class="form-control"
              id="marca"
              placeholder="Marca"
            />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Sistema Operativo</label>
            <input
              type="text"
              class="form-control"
              id="sistemaOperativo"
              placeholder="Sistema Operativo"
            />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Memoria RAM</label>
            <input
              type="number"
              class="form-control"
              id="memoriaRam"
              placeholder="Memoria RAM"
            />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Procesador</label>
            <input
              type="text"
              class="form-control"
              id="procesador"
              placeholder="Procesador"
            />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Camara</label>
            <input
              type="number"
              class="form-control"
              id="Camara"
              placeholder="Exprese la cantidad en numero"
            />
          </div>
          <button type="submit" class="btn btn-success ml-auto d-block">
            Guardar Cambios
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
</html>


