<?php

Class Producto{
  private $id;
  private $nombre;
  private $marca;
  private $sistemaOperativo;
  private $memoriaRam;
  private $procesador;
  private $camara;
  private $pantalla;
  private $imagen;
  private $precio;

  public function agregarProducto(){

  }

  public function editarProducto(){

  }

  public function eliminarProducto(){

  }

  public function mostrarProducto(){

  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
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
   * Get the value of marca
   */ 
  public function getMarca()
  {
    return $this->marca;
  }

  /**
   * Set the value of marca
   *
   * @return  self
   */ 
  public function setMarca($marca)
  {
    $this->marca = $marca;

    return $this;
  }

  /**
   * Get the value of sistemaOperativo
   */ 
  public function getSistemaOperativo()
  {
    return $this->sistemaOperativo;
  }

  /**
   * Set the value of sistemaOperativo
   *
   * @return  self
   */ 
  public function setSistemaOperativo($sistemaOperativo)
  {
    $this->sistemaOperativo = $sistemaOperativo;

    return $this;
  }

  /**
   * Get the value of memoriaRam
   */ 
  public function getMemoriaRam()
  {
    return $this->memoriaRam;
  }

  /**
   * Set the value of memoriaRam
   *
   * @return  self
   */ 
  public function setMemoriaRam($memoriaRam)
  {
    $this->memoriaRam = $memoriaRam;

    return $this;
  }

  /**
   * Get the value of procesador
   */ 
  public function getProcesador()
  {
    return $this->procesador;
  }

  /**
   * Set the value of procesador
   *
   * @return  self
   */ 
  public function setProcesador($procesador)
  {
    $this->procesador = $procesador;

    return $this;
  }

  /**
   * Get the value of camara
   */ 
  public function getCamara()
  {
    return $this->camara;
  }

  /**
   * Set the value of camara
   *
   * @return  self
   */ 
  public function setCamara($camara)
  {
    $this->camara = $camara;

    return $this;
  }

  /**
   * Get the value of pantalla
   */ 
  public function getPantalla()
  {
    return $this->pantalla;
  }

  /**
   * Set the value of pantalla
   *
   * @return  self
   */ 
  public function setPantalla($pantalla)
  {
    $this->pantalla = $pantalla;

    return $this;
  }

  /**
   * Get the value of imagen
   */ 
  public function getImagen()
  {
    return $this->imagen;
  }

  /**
   * Set the value of imagen
   *
   * @return  self
   */ 
  public function setImagen($imagen)
  {
    $this->imagen = $imagen;

    return $this;
  }

  /**
   * Get the value of precio
   */ 
  public function getPrecio()
  {
    return $this->precio;
  }

  /**
   * Set the value of precio
   *
   * @return  self
   */ 
  public function setPrecio($precio)
  {
    $this->precio = $precio;

    return $this;
  }
}