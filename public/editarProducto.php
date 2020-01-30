<!DOCTYPE html>
<html lang="en">
<?php
require_once "autoload.php";
require_once "partials/head.php";
$edicionOK=false; //para mostrar un alert
if(isset($_POST)&& $_POST!=null){
  //var_dump($_POST);
  $p = new Producto($_POST);
  $edicionOK = $p->editarProducto();
}

?>

<link rel="stylesheet" href="css/editarProducto.css">

<!-- Title -->
<title>Editar Producto</title>
</head>
  <body>

    <!-- Header -->
    <?php include_once "partials/headerAdmin.php" ;?>


    <!-- Cuerpo Principal -->
    <main class="py-4">
      <div class='alert alert-info' role='alert'><?= $edicionOK==true? "Producto modificado: $p->getNombre()":"El producto no existe"?></div>
        <section class="container">
        <form method="POST" action="">

          <!-- Imagen, Nombre del producto, marca y precio -->
          <div class="datos-importante">
            <h2>Informacion del producto</h2>
            <div class="form-group imagen__container">
              <label class="imagen__img_container" for="imagen">
                <img src="https://static.websguru.com.ar/gfx/freeTextImage/placeholder.png?v=7.3.44821" alt="imagen" class="imagen__img">
                <p>Elegí una imagen</p>
              </label>
              <input type="file" name="imagen" id="imagen" class="imagen__input">
            </div>
            <div class="form-group">
              <label for="id">Id producto</label>
              <input
                type="text"
                class="form-control"
                id="id"
                name="id"
                aria-describedby="IdProducto"
                value="<?=$_POST['id']?>"
                placeholder="Ingrese el id del producto a modificar"

              />
              <label for="nombre">Nombre del Producto</label>
              <input
                type="text"
                class="form-control"
                id="nombre"
                name="nombre"
                aria-describedby="NombreProducto"
                value="<?=$_POST['nombre']?>"
                placeholder="Ingrese un nombre de producto"

              />
            </div>
            <div class="form-group">
              <label for="marca">Marca</label>
              <input
                type="text"
                class="form-control"
                id="marca"
                name="marca"
                placeholder="Marca"
              />
            </div>
            <div class="form-group">
              <label for="Precio">Precio</label>
              <input
                type="number"
                class="form-control"
                id="Precio"
                name="precio"
                placeholder="Precio"
              />
            </div>
          </div>

          <!-- Detalles secundarios -->
          <div class="detalles-producto">
            <h2>Detalles</h2>
            <div class="form-group">
              <label for="sistemaOperativo">Sistema Operativo</label>
              <select  class="form-control" name="sistemaOperativo" id="sistemaOperativo">
                <option value="android">Android</option>
                <option value="ios">iOS</option>
              </select>
            </div>
            <div class="form-group">
              <label for="memoriaRam">Memoria RAM</label>
              <input
                type="number"
                class="form-control"
                id="memoriaRam"
                name="memoriaRam"
                placeholder="Memoria RAM"
              />
            </div>
            <div class="form-group">
              <label for="procesador">Procesador</label>
              <input
                type="number"
                class="form-control"
                id="procesador"
                name="procesador"
                placeholder="Exprese en numero de GHZ"
              />
            </div>
            <div class="form-group">
              <label for="camara">Camara</label>
              <input
                type="number"
                class="form-control"
                id="Camara"
                name="camara"
                placeholder="Exprese la cantidad en numero de pixeles"
              />
            </div>
            <div class="form-group">
              <label for="pantalla">Tamaño de Pantalla</label>
              <input
                type="number"
                class="form-control"
                id="pantalla"
                name="pantalla"
                placeholder="Exprese la cantidad en numero de pulgadas"
              />
            </div>
          </div>

          <button type="submit" class="btn btn-success">
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
