
<?php
/**
 * Luego de registrarse el usuario puede llenar los datos personales.
 * Si hay errores en los campos recibe la alerta correspondiente, y si no se guardan los datos
 * y aparecen visibles siempre que exista la session.
 * En los casos de persistencia, se verifica que el usuario no pueda
 * dejar alg'un campo vac'io una vez que ha llenado el mismo y quiera modificar sus datos;
 * es decir que si su email es abc@mail.com y quiere modificarlo y deja el campo vacio
 * y guarda cambios simplemente se volver'a a llenar el campo con el dato de la session.
 * 
 */


include_once "autoload.php";

if(session_status() == PHP_SESSION_NONE){
  session_start();
  
}
  
//Si no hay una sesion iniciada, se redirige al login
redirigir("login",false);


$errores = [];

if($_POST){

  $errores = validarDatosPersonales($_POST);

  if(count($errores) == 0){

    editarUsuario($_POST,$_SESSION);

  }
  // echo "<hr>";
  // var_dump($_SESSION);

}

?>


<!DOCTYPE html>
<html lang="en">
 <?php
   require_once "partials/head.php";
 ?>

     <link rel="stylesheet" href="css/perfil.css">
    <!-- Title -->
    <title>Perfil</title>
  </head>

  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <main class="container mt-4" id="form-container">
    
     <?php
       require_once "partials/navegador_datos_usuario.php";
     ?>

      <!-- Formulario Datos Personales -->
      <form action="" method="Post"   class="fix-height">
        <h1 class="">Datos Personales</h1>
      <section>

        <div class="d-flex flex-column">
          <label for="nombre">Nombre</label>
          <input class="inputs-f" type="text" name="nombre" 
          placeholder="Introduce tu nombre"
          
          value= '<?= isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : "" ?>'>
          <?= isset($_SESSION["nombre"]) ? "": mostrarError($errores,"nombre")?>
        </div>

        <div class="d-flex flex-column">
          <label for="apellido">Apellido</label>
          <input class="inputs-f" type="text" name="apellido" placeholder="Introduce tu apellido" 
          value= '<?= isset($_SESSION["apellido"]) ? $_SESSION["apellido"] : "" ?>'>
          <?=isset($_SESSION["apellido"]) ? "": mostrarError($errores,"apellido")?>
        </div>

        <div class="d-flex flex-column">
          <label for="direccion">Direccion</label>
          <input class="inputs-f" type="text" name="direccion" placeholder="Introduce tu direccion" 
          value='<?= isset($_SESSION["direccion"]) ? $_SESSION["direccion"] : "" ?>'>
          <?= isset($_SESSION["direccion"]) ? "" :mostrarError($errores,"direccion")?>
        </div>

        <div class="d-flex flex-column">
          <label for="ciudad">Ciudad</label>
          <input class="inputs-f" type="text" name="ciudad" placeholder="Introduce tu ciudad" 
          value= '<?= isset($_SESSION["ciudad"]) ? $_SESSION["ciudad"] : "" ?>'>
          <?=isset($_SESSION["ciudad"]) ? "": mostrarError($errores,"ciudad")?>
        </div>

        <input type="submit" name="guardar" class="btn btn-primary" value="Guardar Cambios">
      </form>

      </section>



    <br />
    </main>
    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>
    
    <?php
    require_once "partials/javascript_scripts.php";
    ?>
  </body>
</html>
