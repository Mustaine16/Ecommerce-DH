<?php

  abstract class BBDD{

    public static function getConexion(){

      try{

        $conexion = new PDO(
          "mysql:host=localhost;dbname=ecommerce_dh",
          "root",
          "",
          $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
        );

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        return $conexion;

      }catch(PDOException $e){
        echo "Error al establecer conexion con la Base de datos: " . $e->getMessage() . "<br>";
      }


    }

  }
