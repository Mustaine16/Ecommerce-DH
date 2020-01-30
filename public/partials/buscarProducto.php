<?php
require_once "autoload.php";
  if(isset($_POST)){
    // var_dump($_POST);
    $p = new Producto($_POST);
    $result = $p->buscarProductos();
// var_dump($result);
    if($result){
      echo "hay resultados";
      $hayResultados=true;

    }
    else{
          echo "no los hay";
          $_POST['nombre']= null;
    }



  }
?>
      <!-- Header -->
      <?php include_once "partials/headerAdmin.php" ;?>
      <div>


      </div>
      <br>
        <section class="container">
          <form class="form-inline" method="post" action="">
            <div class="form-group mb-2">
              <label for="staticEmail2" class="sr-only">PRODUCTO A BUSACAR</label>
              <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Ingrese producto a buscar">
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <label for="inputPassword2" class="sr-only"></label>
              <input type="text" class="form-control" name="nombre"id="inputPassword2" placeholder='aqui'>
            </div>
            <button type="submit" class="btn btn-primary mb-2">BUSCAR</button>
          </form>

          <form class="" action="" method="post">

          <?php
          if(isset($hayResultados)&&$hayResultados){

           foreach ($result as $key=>$value){
             foreach ($value as $k2 => $v2){
      //        echo "<button type='submit' class='btn btn-link'> $v2</button>";
    //         echo "<input type='text' name='nombre' value='$v2' style='display:normal'>";
             }
           }
          }
          ?>
          </form>
        </section>
