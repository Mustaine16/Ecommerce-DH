<?php

require_once 'controladores/helpers.php';
require_once 'controladores/controladorBBDD.php';
require_once 'controladores/controladorValidaciones.php';
require_once 'controladores/controladorUsuario.php';

function miAutocarga($nClase)
{
    require_once 'clases/'.$nClase.'.php';
}
spl_autoload_register('miAutocarga');

?>