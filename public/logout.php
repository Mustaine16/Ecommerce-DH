<?php

session_start();
session_destroy();
setcookie('userEmail', null, time() - 1);
setcookie('userPass', null, time() - 1);


var_dump(session_status() == PHP_SESSION_ACTIVE);
header('Location: login.php');
exit;
?>