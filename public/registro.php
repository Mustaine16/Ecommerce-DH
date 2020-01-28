<?php

    require_once "autoload.php";

    if(session_status() == PHP_SESSION_NONE){
    session_start();
    }

    //En caso de no haber POST, las variables de errores estaran vacias

    $erroresFormulario = [];
    $errorValidacionDeRegistro = [];

    if($_POST){

        //Arrays con errores de Inputs o de base de datos
        $erroresFormulario = Autenticador::validarFormularioRegistracion($_POST,$_FILES);
        $errorValidacionDeRegistro =  Autenticador::validarRegistracionEnBBDD($_POST);

        registrarUsuario($_POST, $_FILES, $erroresFormulario, $errorValidacionDeRegistro);

        //Si hay una sesion iniciada, se redirige al perfil
        redirigir("perfil");

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
   require_once "partials/head.php";
 ?>
    <link rel="stylesheet" href="css/registro.css">
    <!-- Title -->
    <title>Home</title>
</head>

<body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- Formulario -->
    <section class="container formularios__container" id="form-container">
        
        <h1 class="important-text my-3">Creá tu cuenta</h1>
        
        <form action="registro.php" method="post" enctype="multipart/form-data">
            <div class="form-group avatar__container">
                    <label class="avatar__img_container" for="avatar">
                        <img src="https://i.imgur.com/3kEB1vp.png" alt="avatar" class="avatar__img">
                        <p>Elegí un avatar</p>
                    </label>
                    <input type="file" name="avatar" id="avatar" class="avatar__input">
                    <?php mostrarError("avatar",$erroresFormulario, $errorValidacionDeRegistro)  ?>
            </div>
            <div class="form-group">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" class="form-control text-input" id="username" name="username" value="<?= persistirDato($erroresFormulario, "username"); ?>">
                    <?php mostrarError("username",$erroresFormulario, $errorValidacionDeRegistro)  ?> 
            </div>
            <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control email-input" name="email" value="<?= persistirDato($erroresFormulario, "email");  ?>">
                    <?php mostrarError("email",$erroresFormulario, $errorValidacionDeRegistro)  ?> 
            </div>
            <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" class="form-control password-input" name="password">
                    <?php mostrarError("password",$erroresFormulario, $errorValidacionDeRegistro)  ?> 
            </div>
            <div class="form-group">
                    <label for="repassword">Repetir Contraseña</label>
                    <input type="password" id="repassword" class="form-control password-input" name="repassword">
                    <?php mostrarError("repassword",$erroresFormulario, $errorValidacionDeRegistro)  ?> 
            </div>
            <div class="form-group buttons">
                <input type="submit" class="col col-md-auto col-lg-auto mb-3 btn btn-lg btn-primary" value="Registrarse" id="registracion" />
                <a href="login.php" class="col col-md-auto col-lg-auto mb-3 text-center" id="already-count">Ya tengo una cuenta</a>
            </div>
        </form>
    </section>

    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>

    <?php
    require_once "partials/javascript_scripts.php";
    ?>
</body>

</html>