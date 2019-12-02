<?php

require_once 'controladores/funciones.php';

$arrayDeErrores = "";

if ($_POST) {
    $arrayDeErrores = validarRegistracion($_POST);

    if (count($arrayDeErrores) === 0) {
        // REGISTRO AL USUARIO
        $usuarioFinal = [
            "nombre" => trim($_POST["nombre"]),
            "apellido" => trim($_POST["apellido"]),
            "dni" => trim($_POST["dni"]),
            "email" => $_POST["email"],
            "telefono" => trim($_POST["telefono"]),
            "direccion" => trim($_POST["direccion"]),
            "localidad" => trim($_POST["localidad"]),
            "cp" => trim($_POST["cp"]),
            "username" => trim($_POST["username"]),
            "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];

        // ENVIAR A LA BASE DE DATOS $usuarioFinal

        echo "<br><br><br><br> Esta todo ok. Los datos se pueden enviar a la db con un headerLocation. <br><br>";
        pre($usuarioFinal);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alata|Quicksand:400,500,700&display=swap" rel="stylesheet">
    <!-- Estilos -->
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <!-- Title -->
    <title>Home</title>
</head>

<body>
    <!-- Header -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark">
            <a class="navbar-brand" href="index.html"><img src="img/logo-2.png" alt="Logo" class="logo__brand" style="width:100px;" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogo.html">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.html">F.A.Q</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.html">Contacto</a>
                    </li>
                </ul>
                <div class="nav-item dropdown perfil__icon">
                    <a class="nav-link dropdown-toggle text-center" id="navbardrop" data-toggle="dropdown" href="#"><img src="img/perfil.png" alt="Perfil" style="width:32px;" /></a>
                    <div class="dropdown-menu perfil__menu-desplegable">
                        <a class="dropdown-item" href="perfil.html">Perfil</a>
                        <a class="dropdown-item" href="login.html">Login</a>
                        <a class="dropdown-item" href="registro.html">Registro</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- esto envuelve al formulario -->
    <div class="container container-fluid" id="form-container">
        <br>
        <h1 class="important-text">Registrate en buyit</h1>
        <br>
        <form action="registro.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" class="form-control text-input" name="nombre" value="<?= persistirDato($arrayDeErrores, "nombre"); ?>">
                <small class="text-danger"><?= isset($arrayDeErrores["nombre"]) ? $arrayDeErrores["nombre"] : "" ?></small>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control text-input" id="apellido" name="apellido" value="<?= persistirDato($arrayDeErrores, "apellido"); ?>">
                <small class="text-danger"><?= isset($arrayDeErrores["apellido"]) ? $arrayDeErrores["apellido"] : "" ?></small>
            </div>
            <div class="form-group">
                <label for="dni">DNI<span class="small"> (Sólo numeros sin espacios)</span></label>
                <input type="text" id="dni" class="form-control text-input" name="dni" value="<?= persistirDato($arrayDeErrores, "dni"); ?>">
                <small class="text-danger"><?= isset($arrayDeErrores["dni"]) ? $arrayDeErrores["dni"] : "" ?></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control email-input" name="email" value="<?= persistirDato($arrayDeErrores, "email"); ?>">
                <small class="text-danger"><?= isset($arrayDeErrores["email"]) ? $arrayDeErrores["email"] : "" ?></small>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono<span class="small"> (Sólo numeros sin espacios)</span></label>
                <input type="tel" id="telefono" class="form-control password-input" name="telefono" value="<?= persistirDato($arrayDeErrores, "telefono"); ?>">
                <small class="text-danger"><?= isset($arrayDeErrores["telefono"]) ? $arrayDeErrores["telefono"] : "" ?></small>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control text-input" id="direccion" name="direccion" value="<?= persistirDato($arrayDeErrores, "direccion"); ?>">
                <small class="text-danger"><?= isset($arrayDeErrores["direccion"]) ? $arrayDeErrores["direccion"] : "" ?></small>
            </div>
            <div class="form-group">
                <label for="localidad">Localidad</label>
                <input type="text" class="form-control text-input" id="localidad" name="localidad" value="<?= persistirDato($arrayDeErrores, "localidad"); ?>">
                <small class="text-danger"><?= isset($arrayDeErrores["localidad"]) ? $arrayDeErrores["localidad"] : "" ?></small>
            </div>
            <div class="form-group">
                <label for="cp">Código postal<span class="small"> (Sólo numeros sin espacios)</span></label>
                <input type="text" class="form-control text-input" id="cp" name="cp" value="<?= persistirDato($arrayDeErrores, "cp"); ?>">
                <small class="text-danger"><?= isset($arrayDeErrores["cp"]) ? $arrayDeErrores["cp"] : "" ?></small>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" class="form-control text-input" id="username" name="username" value="<?= persistirDato($arrayDeErrores, "username"); ?>">
                    <small class="text-danger"><?= isset($arrayDeErrores["username"]) ? $arrayDeErrores["username"] : "" ?></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control password-input" name="password">
                    <small class="text-danger"><?= isset($arrayDeErrores["password"]) ? $arrayDeErrores["password"] : "" ?></small>
                </div>
                <div class="form-group">
                    <label for="repassword">Re-Password</label>
                    <input type="password" id="repassword" class="form-control password-input" name="repassword">
                    <small class="text-danger"><?= isset($arrayDeErrores["repassword"]) ? $arrayDeErrores["repassword"] : "" ?></small>
                </div>
                <div class="form-group">
                    <input type="submit" class="col col-md-auto col-lg-auto btn btn-lg btn-primary" value="Registro" id="registracion" />
                    <a href="login.html" class="col col-md-auto col-lg-auto btn btn-lg btn-info" id="already-count">Ya tengo una cuenta</a>
                </div>
            </div>
        </form>
    </div>
    <!-- Footer -->
    <footer class="bg-dark">
        <div class="col-lg-10 pt-4 pb-4 text-center m-auto row flex-column flex-lg-row justify-content-between align-items-center">
            <div class="mx-auto p-2 text-white d-flex flex-column justify-content-center">
                <span class="font-weight-bold p-1">UBICACION</span>
                <span class=" p-1">Talcahuano 1382</span>
                <span class="p-1">Ciudad de Buenos Aires</span>
            </div>
            <div class="col-md-4 p-2 text-white social-media__container">
                <p class="font-weight-bold">REDES SOCIALES</p>
                <div class="social-media__icons">
                    <a class="text-white" href="#"><i class="fab fa-facebook-f col-lg-2 col-md-2 col-3"></i></a>&nbsp;&nbsp;
                    <a class="text-white" href="#"><i class="fab fa-google-plus-g col-lg-2 col-md-2 col-3"></i></a>&nbsp;&nbsp;<a class="text-white" href="#"><i class="fab fa-twitter col-lg-2 col-md-2 col-3"></i></a>
                </div>
            </div>

            <div class="col-md-4 text-white horarios__container">
                <p class="font-weight-bold m-0 p-1">HORARIOS</p>
                <p class="m-0 p-1">Lu a Vie - 10 a 19hs.</p>
                <p class="m-0 p-1">Feriados: Cerrado.</p>
            </div>
        </div>
        <p class="bg-secondary pt-3 pb-3 m-0 text-white text-center">
            Copyright © Empresa 2019
        </p>
    </footer>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/2641c51c10.js" crossorigin="anonymous"></script>
</body>

</html>