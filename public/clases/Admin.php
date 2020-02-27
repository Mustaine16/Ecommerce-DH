<?php

class Admin extends Usuario{

  private $permisos = 1;

  /**
   * Get the value of permisos
   */ 
  public function getPermisos()
  {
    return $this->permisos;
  }

  /**
   * Set the value of permisos
   *
   * @return  self
   */ 
  public function setPermisos($permisos)
  {
    $this->permisos = $permisos;

    return $this;
  }
}