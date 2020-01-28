<?php

Class Cliente extends Usuario{

  private $nombre;
  private $apellido;
  private $direccion;
  private $ciudad;
  private $carrito;

  public function editarPerfil($POST){

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

