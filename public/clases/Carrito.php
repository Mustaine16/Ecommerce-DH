<?php

Class Carrito{

  private $productos;

  //Deberia llamarse mostrarProductos pero bueno, ya quedo asi en el UML asi que no quiero confundir
  public function mostrarDetalleProductos(){

  }


  //Guarda que $productos es un array asi que hay que pushear
  public function agregarProducto(){

  }

  public function eliminarProducto(){

  }

  public function calcularTotal(){
    
  }
  


  /**
   * Get the value of productos
   */ 
  public function getProductos()
  {
    return $this->productos;
  }

  /**
   * Set the value of productos
   *
   * @return  self
   */ 
  public function setProductos($productos)
  {
    $this->productos = $productos;

    return $this;
  }

  /**
   * Get the value of productos
   */ 
  public function getProductos()
  {
    return $this->productos;
  }

  /**
   * Set the value of productos
   *
   * @return  self
   */ 
  public function setProductos($productos)
  {
    $this->productos = $productos;

    return $this;
  }
}