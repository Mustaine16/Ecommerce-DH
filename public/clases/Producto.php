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

/* el constructor recie un array del forumulario*/
  public function __construct($a){
       $this->setNombre($a['nombre']);
       $this->setId($a['id']);
       // $this->setMarca( $a['marca');
       /*
         Solo para pruebas, ya que se usa para setear id_marca
         (ver comentario en script ecommerce_dh_para_pruebas_ABM.sql)
       */
       $this->setMarca(1);

       $this->setPrecio($a['precio']) ;
       $this->setSistemaOperativo($a['sistemaOperativo']) ;
       $this->setMemoriaRam($a['memoriaRam']) ;
       $this->setCamara($a['camara']);
       $this->setPantalla($a['pantalla']) ;
       $this->setImagen($a['imagen']) ;
  }
  public function agregarProducto(){
    //Obtengo el objeto PDO para poder generar el SQL
    $db = BBDD::getConexion();

    $db->beginTransaction();

    try{

        $sql = $db->prepare("INSERT INTO productos(
           id,nombre,procesador,precio,imagen,sist_operativo,pantalla,camara,memoria_ram,id_marca)
             VALUES
        (default,:nombre,:procesador,:precio,:imagen,:sistemaOperativo,:pantalla,:camara,:memoriaRam,:id_marca)");

        // $sql->bindValue('id', $this->getId(), PDO::PARAM_INT);
        $sql->bindValue(":nombre",$this->getNombre(),PDO::PARAM_STR);
        // $sql->bindValue(":marca",$this->getMarca(),PDO::PARAM_STR);
        $sql->bindValue(":sistemaOperativo",$this->getSistemaOperativo(),PDO::PARAM_STR);
        $sql->bindValue(":memoriaRam",$this->getMemoriaRam(),PDO::PARAM_STR);
        $sql->bindValue(":precio",$this->getPrecio(),PDO::PARAM_STR);
        $sql->bindValue(":procesador",$this->getProcesador(),PDO::PARAM_STR);
        $sql->bindValue(":camara",$this->getCamara(),PDO::PARAM_STR);
        $sql->bindValue(":imagen",$this->getImagen(),PDO::PARAM_STR);
        $sql->bindValue(":pantalla",$this->getPantalla(),PDO::PARAM_STR);
        $sql->bindValue('id_marca', $this->getMarca(), PDO::PARAM_INT);

        // var_dump($_POST);die;
        $sql->execute();

        $db->commit();

        //ver si hubo filas afectadas
        if(  $sql->rowCount() ){
          return true;
        }

        else{
            //var_dump($sql);
           return false;
        }

    }catch(PDOException $e){
        $db->rollBack();
        echo "Error al intentar registrar el producto: " . $e->getMessage() . "<br>";
    }
  }

  public function editarProducto(){
    //Obtengo el objeto PDO para poder generar el SQL
    $db = BBDD::getConexion();

    $db->beginTransaction();

    try{
        $sql = $db->prepare("UPDATE productos SET nombre=:nombre,
                                              procesador=:procesador,
                                              precio=:precio,
                                              imagen=:imagen,
                                              sist_operativo=:sistemaOperativo,
                                              pantalla=:pantalla,
                                              camara=:camara,
                                              memoria_ram=:memoriaRam,
                                              id_marca=:id_marca
                                              WHERE
                                                  id =:id ");

        $sql->bindValue(":nombre",$this->getNombre(),PDO::PARAM_STR);
        $sql->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        $sql->bindValue(":id_marca",$this->getMarca(),PDO::PARAM_STR);
        $sql->bindValue(":sistemaOperativo",$this->getSistemaOperativo(),PDO::PARAM_STR);
        $sql->bindValue(":memoriaRam",$this->getMemoriaRam(),PDO::PARAM_STR);
        $sql->bindValue(":precio",$this->getPrecio(),PDO::PARAM_STR);
        $sql->bindValue(":procesador",$this->getProcesador(),PDO::PARAM_STR);
        $sql->bindValue(":camara",$this->getCamara(),PDO::PARAM_STR);
        $sql->bindValue(":imagen",$this->getImagen(),PDO::PARAM_STR);
        $sql->bindValue(":pantalla",$this->getPantalla(),PDO::PARAM_STR);

        // var_dump($_POST);die;
        $sql->execute();

        $db->commit();
        //ver si hubo filas afectadas
        if(  $sql->rowCount() ) return true;
        else return false;

    }catch(PDOException $e){
        $db->rollBack();
        echo "Error al intentar modficar el producto: " . $e->getMessage() . "<br>";

        // return false;
    }
  }

  public function eliminarProducto(){
    $db = BBDD::getConexion();
    $db->beginTransaction();
    try{
      $sql = "DELETE FROM productos WHERE id =  :id";
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':id', $this->getId(), PDO::PARAM_INT);
      $stmt->execute();

      $db->commit();
      if( ! $stmt->rowCount() ) return false;
      else return true;
      //echo "failed";
      // else return false;

    }catch(PDOException $e){
        $db->rollBack();
        echo "El producto no exite: " . $e->getMessage() . "<br>";
        return false;
    }
  }
  public function buscarProductos(){
    $db = BBDD::getConexion();
    $db->beginTransaction();
    try{
      // $sql = "SELECT * FROM productos_simple WHERE nombre = :nombre";
      $sql = "SELECT * FROM productos_simple WHERE nombre like :nombre";

      $stmt = $db->prepare($sql);
      $stmt->bindValue(':nombre', $this->getNombre().'%', PDO::PARAM_STR);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // var_dump($resultado);
      return $resultado;

    }catch(PDOException $e){
        $db->rollBack();
        echo "El producto no exite: " . $e->getMessage() . "<br>";
        // return false
    }
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
