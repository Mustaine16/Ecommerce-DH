<?php

Class Cliente extends Usuario{

  private $nombre;
  private $apellido;
  private $direccion;
  private $ciudad;
  private $carrito;

  public function editarPerfil($POST, &$SESSION){

    // Setear atributos
    $this->setNombre($POST["nombre"]);
    $this->setApellido($POST["apellido"]);
    $this->setDireccion($POST["direccion"]);
    $this->setCiudad($POST["ciudad"]);
    $this->setId($SESSION["id"]);
    
    //Abrir la base de datos y guardar los cambios
    $db = BBDD::getConexion();
    $db->beginTransaction();

    try{

      $sql = $db->prepare("
        UPDATE usuarios
        SET
          nombre    = :nombre,
          apellido  = :apellido,
          direccion = :direccion,
          ciudad     = :ciudad
        WHERE
          id = :id
      ");

      $sql->bindValue(":nombre", $this->getNombre());
      $sql->bindValue(":apellido", $this->getApellido());
      $sql->bindValue(":direccion", $this->getDireccion());
      $sql->bindValue(":ciudad", $this->getCiudad());
      $sql->bindValue("id", $this->getId());
      $sql->execute();
      $db->commit();

    } catch (PDOException $e) {

      echo "Error al tratar de guardar los cambios: " . $e->getMessage();
      $db->rollBack();
      die();

    }

    //Update $_SESSION para que se muestren los nuevos datos
    
    foreach($POST as $key => $value ){
      $SESSION[$key] = $value;
    } 
  }

  public function editarCuenta($POST, &$SESSION){

    //Setear atributos
    $this->setUsername($POST["username"]);
    $this->setEmail($POST["email"]);

    //Abir BBDD

    $db = BBDD::getConexion();
    $db->beginTransaction();

    try {
      
      $sql = $db->prepare("
        UPDATE usuarios
        SET
          username = :username,
          email = :email
        WHERE
          id = :id
      ");

      $sql->bindValue(":username", $POST["username"]);
      $sql->bindValue(":email", $POST["email"]);
      $sql->bindValue(":id", $SESSION["id"]);

      $sql->execute();
      $db->commit();

    } catch (PDOException $e) {
      echo "Error al actualizar datos: " . $e->getMessage();
      $db->rollBack();
      die();
    }
    
    //Update $_SESSION para que se muestren los nuevos datos
    
    foreach($POST as $key => $value ){
      $SESSION[$key] = $value;
    } 
  }

  public function cambiarPassword($POST){

    //Setear atributos
    $this->setPass($POST["password"]);

    //Abrir la base de datos y guardar los cambios
    $db = BBDD::getConexion();
    $db->beginTransaction();

    try {

      $sql = $db->prepare("
        UPDATE usuarios
        SET
          pass = :pass
        WHERE
          email = :email
      ");

      $sql->bindValue(":pass", $this->getPass());

      /*Si hay session ID, significa que el usuario esta logueado
      de lo contratio, está intentando cambiar la contraseeña
      desde forgotPassword.php
      */

      if(isset($_SESSION["id"])){
        $sql->bindValue(":email", $_SESSION["email"]);
      }else{
        $sql->bindValue(":email", $_COOKIE["user-email-for-reset-password"]);
      }

      $sql->execute();
      $db->commit();

    } catch (PDOException $e) {
      echo "Error al actualizar datos: " . $e->getMessage();
      $db->rollBack();
      die();
    }

    
  }

  public function comprar($carrito){

  }


  /**
   * Get the value of nombre
   */ 
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   *
   * @return  self
   */ 
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;

    return $this;
  }

  /**
   * Get the value of apellido
   */ 
  public function getApellido()
  {
    return $this->apellido;
  }

  /**
   * Set the value of apellido
   *
   * @return  self
   */ 
  public function setApellido($apellido)
  {
    $this->apellido = $apellido;

    return $this;
  }

  /**
   * Get the value of direccion
   */ 
  public function getDireccion()
  {
    return $this->direccion;
  }

  /**
   * Set the value of direccion
   *
   * @return  self
   */ 
  public function setDireccion($direccion)
  {
    $this->direccion = $direccion;

    return $this;
  }

  /**
   * Get the value of ciudad
   */ 
  public function getCiudad()
  {
    return $this->ciudad;
  }

  /**
   * Set the value of ciudad
   *
   * @return  self
   */ 
  public function setCiudad($ciudad)
  {
    $this->ciudad = $ciudad;

    return $this;
  }

  /**
   * Get the value of carrito
   */ 
  public function getCarrito()
  {
    return $this->carrito;
  }

  /**
   * Set the value of carrito
   *
   * @return  self
   */ 
  public function setCarrito($carrito)
  {
    $this->carrito = $carrito;

    return $this;
  }
}

