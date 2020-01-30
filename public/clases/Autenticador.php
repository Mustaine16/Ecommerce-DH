<?php

class Autenticador{

  private $erroresRegistracionFormulario = [];
  private $erroresRegistracionBBDD = [];
  private $erroresLogin = [];

  /*
  ***********
  VALIDACIONES
      DE
  REGISTRO
  ***********
  */

//Valida que los inputs del formulario sean validos, es decir que mail sea mail, que no vengan vacios, etc
  public function validarFormularioRegistracion($POST,$FILES){

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

    $this->setErroresRegistracionFormulario($errores);
  }

//La idea es que no haya 2 usuarios con un mismo mail o nombre de ususario
  public function validarRegistracionEnBBDD($POST){
  
    $errores = []; //Array donde se almacenan los errores

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

    $this->setErroresRegistracionBBDD($errores);

    /*
    if($usuarios){

        foreach ($usuarios as $usuario) {

            if($usuario["email"] == strtolower($POST["email"])){
                $errores["email"] = "Ya se existe un usuario registrado con este email";
            }

            if($usuario["username"] == strtolower($POST["username"])){
                $errores["username"] = "Ya se existe un usuario con este nombre";
            }
        }

        //ESTO ES EN CASO DE QUE SE IMPLEMENTE LA FUNCION EN EDITAR CUENTA
        /*
        * Puede ocurrir que el usuario solo quiera cambiar el usuario pero no el email, y viceversa 
        */
        /*
        if($_SESSION){

            if($_SESSION["email"] && $_SESSION["email"] == $POST["email"]){
                unset($errores["email"]);
            }
          
            if($_SESSION["username"] && $_SESSION["username"] == $POST["username"]){
                unset($errores["username"]);
            }
            
            
          }
        }*/
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

    $this->setErroresLogin($errores);
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

  private function buscarUsuarioPorUsername($db){

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




  /**
   * Get the value of erroresRegistracionFormulario
   */ 
  public function getErroresRegistracionFormulario()
  {
    return $this->erroresRegistracionFormulario;
  }

  /**
   * Set the value of erroresRegistracionFormulario
   *
   * @return  self
   */ 
  public function setErroresRegistracionFormulario($erroresRegistracionFormulario)
  {
    $this->erroresRegistracionFormulario = $erroresRegistracionFormulario;

    return $this;
  }

  /**
   * Get the value of erroresRegistracionBBDD
   */ 
  public function getErroresRegistracionBBDD()
  {
    return $this->erroresRegistracionBBDD;
  }

  /**
   * Set the value of erroresRegistracionBBDD
   *
   * @return  self
   */ 
  public function setErroresRegistracionBBDD($erroresRegistracionBBDD)
  {
    $this->erroresRegistracionBBDD = $erroresRegistracionBBDD;

    return $this;
  }

  /**
   * Get the value of erroresLogin
   */ 
  public function getErroresLogin()
  {
    return $this->erroresLogin;
  }

  /**
   * Set the value of erroresLogin
   *
   * @return  self
   */ 
  public function setErroresLogin($erroresLogin)
  {
    $this->erroresLogin = $erroresLogin;

    return $this;
  }
}


?>