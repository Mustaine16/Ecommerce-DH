<?php
session_start();
session_destroy();
setcookie('userEmail', null, time() - 1);
setcookie('userPass', null, time() - 1);


echo "Cerrando sesion y redirigiendo en 3 segundos";

header('Refresh: 3; URL=catalogo.php');

exit;
?>