<?php
function pre($algo)
{
    echo '<pre>';
    var_dump($algo);
    echo '</pre>';
}

function dd($algo)
{
    pre($algo);
    exit;
}

function redirigir($location, $logueado = true){
    
    //Si hay una sesion iniciada, se redirige al perfil
    if($logueado){
        if (isset($_SESSION['email'])) {
            header("Location: $location.php");
        }
    }else{
        if (!isset($_SESSION['email'])) {
            header("Location: $location.php");
        }
    }
}

?>