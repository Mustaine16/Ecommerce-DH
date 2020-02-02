<?php

class Autenticador{

  private $erroresRegistracionFormulario = [];
  private $erroresRegistracionBBDD = [];
  private $erroresLogin = [];
  private $erroresPerfil = [];
  private $erroresCuenta = [];
  private $errores = [];

  /*
  ***********
  VALIDACIONES
      DE
  REGISTRO
  ***********
  */

//Valida que los inputs del formulario sean validos, es decir que mail sea mail, que no vengan vacios, etc
  public function validarRegistracion($POST,$FILES){

    $errores = [];


    // Validamos campo "email"
    if (isset($POST["email"])) {
        if (empty($POST["email"])) {
            $errores["email"] = "Este campo debe completarse.";
        } elseif (!filter_var($POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errores["email"] = "Debés ingresar un email válido.";
        }
    }

    // Validamos campo "Nombre de usuario"
    if (isset($POST["username"])) {
        if (empty($POST["username"])) {
            $errores["username"] = "Este campo debe completarse.";
        } elseif (strlen($POST["username"]) < 6) {
            $errores["username"] = "Tu nombre debe tener al menos 6 caracteres.";
        }
    }

    // Validamos campo "password"
    if (isset($POST["password"])) {
        if (empty($POST["password"])) {
            $errores["password"] = "Este campo debe completarse.";
        } elseif (strlen($POST["password"]) < 6) {
            $errores["password"] = "Tu contraseña debe tener al menos 6 caracteres.";
        }
    }

    // Validamos campo "repassword"
    if (isset($POST["repassword"])) {
        if (empty($POST["repassword"])) {
            $errores["repassword"] = "Este campo debe completarse.";
        } elseif ($POST["password"] != $POST["repassword"]) {
            $errores["repassword"] = "Las contraseñas no coinciden.";
        }
    }

    //Validamos el Avatar
    if(isset($FILES["avatar"])){

        //Extension del archivo
        $ext = strtolower(pathinfo($FILES["avatar"]["name"],PATHINFO_EXTENSION));

        //Si el Avatar viene vacio
        if($FILES["avatar"]["error"] == 4){
            $errores["avatar"] = "El avatar es obligatorio";
        }
        //Algun error de carga
        else if ($FILES["avatar"]["error"] != 0){
            $errores["avatar"] = "Hubo un error al cargar el avatar";
        }
        //Tipo de archivo invalido
        else if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
            $errores["avatar"] = "Solo se admiten imagenes .png , .jpg o .jpeg ";
        }
    }

    /*
      Validaciones de la Base De Datos
      La idea es validar que no haya usuarios
      Registrados con el mismo mail o username
    */

    $db = BBDD::getConexion();

    //Resultado de la consulta para verificar si hay, o no, un usuario con este email
    $resultadoPorEmail = $this->buscarUsuarioPorEmail($db); 

    //Resultado de la consulta para verificar si hay, o no, un usuario con este username
    $resultadoPorNombreDeUsuario = $this->buscarUsuarioPorUsername($db);

    if($resultadoPorEmail){
      $errores["email"] = "Ya existe un usuario registrado con ese email";
    }

    if($resultadoPorNombreDeUsuario){
      $errores["username"] = "Ya existe un usuario registrado con ese nombre de usuario";
    }

    $this->setErrores($errores);
  }


  /*
  ***********
  VALIDACIONES
      DE
    LOGIN
  ***********
  */

  public function validarLogin($POST){

    $errores = [];
    $email = trim($POST['email']);
    $pass = trim($POST['password']);

    //Errores de campos invalidos
    
    if(empty($email)) {
      $errores['email'] = 'El campo email es obligatorio';

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores['email'] = 'El formato introducido no es válido';

    } else if(empty($pass)) {

      $errores['password'] = 'El campo password es obligatorio';

    } else {

      //Errores de validacion en Base de Datos

      //Resultado de la consulta para verificar si hay, o no, un usuario con este email
      $usuario = $this->buscarUsuarioPorEmail(); 

      if($usuario){
        if( !password_verify($pass, $usuario['pass']) ) {
            $errores['password'] = 'Contraseña Incorrecta';
        }

      } else {

        $errores['email'] = "No existe un usuario registrado con ese email";
        
      }


    }

    $this->setErrores($errores);
}

  public function buscarUsuarioPorEmail(){

    $db = BBDD::getConexion();
    $db->beginTransaction();

    try {
      
      $sql = $db->prepare("SELECT * FROM usuarios where email = :email");

      $sql->bindValue(":email", $_POST["email"]);

      $sql->execute();

      $resultado =  $sql->fetch(PDO::FETCH_ASSOC);

      $db->commit();
      
      return $resultado;

    } catch (PDOException $e) {
      echo "Error en la consulta SQL: " . $e->getMessage();
      $db->rollBack();
      die();
    }

  }

  private function buscarUsuarioPorUsername(){

    $db = BBDD::getConexion();
    $db->beginTransaction();

    try {
      
      $sql = $db->prepare("SELECT username FROM usuarios where username = :username");
      $sql->bindValue(":username", $_POST["username"]);

      $sql->execute();

      $resultado =  $sql->fetch(PDO::FETCH_ASSOC);

      $db->commit();
      
      return $resultado;

      $db-commit();

    } catch (PDOException $e) {
      echo "Error en la consulta SQL: " . $e->getMessage();
      $db->rollBack();
      die();
    }

  }

  /*
  ***********
  VALIDACIONES
      DE
    EDITAR 
  PERFIL/ CUENTA/ SEGURIDAD
  ***********
  */

  public function validarPerfil($POST){

    $errores = [];

    // Validamos campo "Nombre "
    if (isset($POST["nombre"])) {
        if (empty($POST["nombre"])) {
            $errores["nombre"] = "Este campo debe completarse.";
        } elseif (strlen($POST["nombre"]) < 2) {
            $errores["nombre"] = "Tu nombre debe tener al menos 2 caracteres.";
        }elseif(!ctype_alpha($POST["nombre"])){
            $errores["nombre"] = "Tu nombre contiene número(s).";
        }
    }

    // Validamos campo "Apellido"
    if (isset($POST["apellido"])) {
        if (empty($POST["apellido"])) {
            $errores["apellido"] = "Este campo debe completarse.";
        } elseif (strlen($POST["apellido"]) < 2) {
            $errores["apellido"] = "Tu apellido debe tener al menos 2 caracteres.";
        }elseif(!ctype_alpha($POST["apellido"])){
            $errores["apellido"] = "Tu apellido contiene número(s).";
        }
    }

    // Validamos campo "Direccion"
    if (isset($POST["direccion"])) {
        if (empty($POST["direccion"])) {
            $errores["direccion"] = "Este campo debe completarse.";
        } elseif (strlen($POST["direccion"]) < 5) {
            $errores["direccion"] = "Tu direccion  debe tener al menos 5 caracteres.";
        }
    }

    // Validamos campo "Ciudad"
    if (isset($POST["ciudad"])) {
        if (empty($POST["ciudad"])) {
            $errores["ciudad"] = "Este campo debe completarse.";
        } elseif (strlen($POST["ciudad"]) < 2) {
            $errores["ciudad"] = "Tu ciudad  debe tener al menos 2 caracteres.";
        }
    }

    //Si hubo errores van a quedar seteados en el atributo erroresPerfil
    //De lo contrarion queda como un array vacio
    $this->setErrores($errores);
  }

  public function validarCuenta($POST){

    $errores = [];
    $username = $POST["username"];
    $email = $POST["email"];

    //Errores campos invalidos

    if(empty($username)){
      $errores["username"] = "El campo es obligatorio";
    }else if (strlen($username) < 6){
      $errores["username"] = "El nombre de usuario debe ser de al menos 6 caracteres";
    }

    if (empty($POST["email"])) {
      $errores["email"] = "Este campo debe completarse.";
    } elseif (!filter_var($POST["email"], FILTER_VALIDATE_EMAIL)) {
      $errores["email"] = "Debés ingresar un email válido.";
    }

    //Errores de BBDD
    //Username o email ya registrado

    $usuarioPorEmail = $this->buscarUsuarioPorEmail();

    $usuarioPorUsername = $this->buscarUsuarioPorUsername();

    if($usuarioPorEmail && $email !== $_SESSION["email"]){
      $errores["email"] = "Ya existe un usuario registrado con este email";
    }

    if($usuarioPorUsername && $username !== $_SESSION["username"]){
      $errores["username"] = "Ya existe un usuario registrado con este nombre de usuario";
    }

    $this->setErrores($errores);

  }

  public function validarPassword($POST){

    $errores = [];
    
    // Validamos campo "password"
    if (isset($POST["password"])) {

      if (empty($POST["password"])) {

        $errores["password"] = "Este campo debe completarse.";

      } elseif (strlen($POST["password"]) < 6) {

        $errores["password"] = "Tu contraseña debe tener al menos 6 caracteres.";

      }
    }
  
    // Validamos campo "repassword"
    if (isset($POST["repassword"])) {

      if (empty($POST["repassword"])) {

        $errores["repassword"] = "Este campo debe completarse.";

      } elseif ($POST["password"] != $POST["repassword"]) {

        $errores["repassword"] = "Las contraseñas no coinciden.";

      }
    }

    $this->setErrores($errores);

  }


  /**
   * Get the value of errores
   */ 
  public function getErrores()
  {
    return $this->errores;
  }

  /**
   * Set the value of errores
   *
   * @return  self
   */ 
  public function setErrores($errores)
  {
    $this->errores = $errores;

    return $this;
  }
}


?>