<?php

  abstract Class Usuario{
    
    protected $username;
    protected $email;
    protected $pass;
    protected $avatar;

    public function __construct($username, $pass, $email){
      
      $this->setUsername($username);
      $this->setpass($pass);
      $this->setEmail($email);
      
    }
    
    public function loguearse(){
        
    }
    
    public function registrarse(){

        //Primero seteamos el avatar y tambien se sube al disco local
        $this->setAvatar();

        //Obtengo el objeto PDO para poder generar el SQL
        $db = BBDD::getConexion();

        $db->beginTransaction();

        try{
            
            $sql = $db->prepare("
                INSERT INTO usuarios (id,username,email,pass,avatar) 
                VALUES(default,:username,:email,:pass,:avatar)"
            );

            
            $sql->bindValue(":pass", $this->getPass(),PDO::PARAM_STR);
            $sql->bindValue(":username", $this->getUsername(),PDO::PARAM_STR);
            $sql->bindValue(":email", $this->getEmail(),PDO::PARAM_STR);
            $sql->bindValue(":avatar", $this->getAvatar(),PDO::PARAM_STR);
            
            // var_dump($_POST);die;
            $sql->execute();

            $db->commit();

        }catch(PDOException $e){
            $db->rollBack();
            echo "Error al intentar registrarse: " . $e->getMessage() . "<br>"; 
        }




    }

    public function subirAvatar($avatarFileName){
        move_uploaded_file($_FILES["avatar"]["tmp_name"], "usuarios/avatars/" . $avatarFileName);
    }



    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username =  strtolower(trim($username));

    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = strtolower($email);

    }

    /**
     * Get the value of pass
     */ 
    public function getpass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setpass($pass)
    {
        $this->pass = password_hash($pass, PASSWORD_DEFAULT);

    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar()
    {
        //ID unico con el cual vamos a crear el nombre del archivo del avatar
        $idAvatar = uniqid("img_"); 

        $ext = strtolower(pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION));
      
        $avatarFileName = $idAvatar . "." . $ext;

        $this->avatar = $avatarFileName;

        $this->subirAvatar($avatarFileName);
      
    }
}

?>