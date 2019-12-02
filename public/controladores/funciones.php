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

function validarRegistracion($unArray)
{

    $errores = [];

    // Validamos campo "nombre"
    if (isset($unArray["nombre"])) {
        if (empty($unArray["nombre"])) {
            $errores["nombre"] = "Este campo debe completarse.";
        } elseif (strlen($unArray["nombre"]) < 2) {
            $errores["nombre"] = "Tu nombre debe tener al menos 2 caracteres.";
        }
    }

    // Validamos campo "apellido"
    if (isset($unArray["apellido"])) {
        if (empty($unArray["apellido"])) {
            $errores["apellido"] = "Este campo debe completarse.";
        } elseif (strlen($unArray["apellido"]) < 2) {
            $errores["apellido"] = "Tu apellido debe tener al menos 2 caracteres.";
        }
    }

    // Validamos campo "dni"
    if (isset($unArray["dni"])) {
        if (empty($unArray["dni"])) {
            $errores["dni"] = "Este campo debe completarse.";
        } elseif (!is_numeric($unArray["dni"]) || strlen($unArray["dni"]) != 8) {
            $errores["dni"] = "Tu dni debe tener 8 caracteres numéricos sin espacios.";
        }
    }

    // Validamos campo "email"
    if (isset($unArray["email"])) {
        if (empty($unArray["email"])) {
            $errores["email"] = "Este campo debe completarse.";
        } elseif (!filter_var($unArray["email"], FILTER_VALIDATE_EMAIL)) {
            $errores["email"] = "Debés ingresar un email válido.";
        }
    }

    // Validamos campo "teléfono"
    if (isset($unArray["telefono"])) {
        if (empty($unArray["telefono"])) {
            $errores["telefono"] = "Este campo debe completarse.";
        } elseif (!is_numeric($unArray["telefono"]) || strlen($unArray["telefono"]) < 8) {
            $errores["telefono"] = "Tu telefono debe tener al menos 8 caracteres numéricos";
        }
    }

    // Validamos campo "direccion"
    if (isset($unArray["direccion"])) {
        if (empty($unArray["direccion"])) {
            $errores["direccion"] = "Este campo debe completarse.";
        }
    }

    // Validamos campo "localidad"
    if (isset($unArray["localidad"])) {
        if (empty($unArray["localidad"])) {
            $errores["localidad"] = "Este campo debe completarse.";
        }
    }

    // Validamos campo "cp"
    if (isset($unArray["cp"])) {
        if (empty($unArray["cp"])) {
            $errores["cp"] = "Este campo debe completarse.";
        } elseif (!is_numeric($unArray["cp"])) {
            $errores["cp"] = "El cp debe ser numérico sin espacios";
        }
    }

    // Validamos campo "Nombre de usuario"
    if (isset($unArray["username"])) {
        if (empty($unArray["username"])) {
            $errores["username"] = "Este campo debe completarse.";
        } elseif (strlen($unArray["username"]) < 6) {
            $errores["username"] = "Tu nombre debe tener al menos 6 caracteres.";
        }
    }

    // Validamos campo "password"
    if (isset($unArray["password"])) {
        if (empty($unArray["password"])) {
            $errores["password"] = "Este campo debe completarse.";
        } elseif (strlen($unArray["password"]) < 6) {
            $errores["password"] = "Tu contraseña debe tener al menos 6 caracteres.";
        }
    }

    // Validamos campo "repassword"
    if (isset($unArray["repassword"])) {
        if (empty($unArray["repassword"])) {
            $errores["repassword"] = "Este campo debe completarse.";
        } elseif ($unArray["password"] != $unArray["repassword"]) {
            $errores["repassword"] = "Tenés que ingresar la misma contraseña.";
        }
    }

    return $errores;
}

function persistirDato($arrayE, $campo)
{
    if (isset($arrayE[$campo])) {
        return "";
    } else {
        if (isset($_POST[$campo])) {
            return $_POST[$campo];
        }
    }
}

?>