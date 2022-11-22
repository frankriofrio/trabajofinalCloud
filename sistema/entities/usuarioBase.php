<?php


  /**
     * Clase bse de usuario
     *
     * Esta objetos es una instancia para usuario
     *
     */
class usuarioBase{

 
    //atributos de la clase usuario
     private $idUsuario;
     private $estadoUsuario;
     private $edadUsuario;
     private $nombreUsuario;    
     private $telefonoUsuario;
     private $emailUsuario;
     private $loginUsuario;
     private $claveUsuario;
     private $perfilUsuario;
     private $fechaNacimientoUsuario;
     private perfilBase $perfilBase;

 
    /**
     * Constructor de usuario
     *
     * Iniciamos los atributos
     *
     */
    public function __construct($edadUsuario,$nombreUsuario,$estadoUsuario,$idUsuario, $telefonoUsuario, $emailUsuario,
    $loginUsuario,$claveUsuario,
    $perfilUsuario,$fechaNacimientoUsuario ){

        $this->edadUsuario=$edadUsuario;
        $this->estadoUsuario=$estadoUsuario;
        $this->nombreUsuario=$nombreUsuario;
         $this->idUsuario=$idUsuario;
        $this->telefonoUsuario=$telefonoUsuario;
        $this->perfilUsuario=$perfilUsuario;
        $this->emailUsuario=$emailUsuario;
        $this->loginUsuario=$loginUsuario;
        $this->claveUsuario=$claveUsuario;
        $this->fechaNacimientoUsuario=$fechaNacimientoUsuario;
        $this->perfilBase= new perfilBase();

    }

    public function setPerfilBase($perfilBase){
        $this->perfilBase=$perfilBase;
    }

    public function getPerfilBase(){
        return $this->perfilBase;
    }

    public function setFechaNacimientoUsuario($fechaNacimientoUsuario){
        $this->$fechaNacimientoUsuario=$fechaNacimientoUsuario;
    }


    public function getFechaNacimientoUsuario(){
        return $this->fechaNacimientoUsuario;
    }



    public function setClaveUsuario($claveUsuario){
        $this->$claveUsuario=$claveUsuario;
    }


    public function getClaveUsuario(){
        return $this->claveUsuario;
    }


    public function setloginUsuario($loginUsuario){
        $this->$loginUsuario=$loginUsuario;
    }


    public function getLoginUsuario(){
        return $this->loginUsuario;
    }


    public function setEmailUsuario($emailUsuario){
        $this->$emailUsuario=$emailUsuario;
    }


    public function getEmailUsuario(){
        return $this->emailUsuario;
    }



    public function setEdadusuario($edadUsuario){
          $this->$edadUsuario=$edadUsuario;
    }


    public function getEdadUsuario(){
        return $this->edadUsuario;
    }


   public function setEstadoUsuario($estadoUsuario){
        $this->$estadoUsuario=$estadoUsuario;
    }
    

    public function getEstadoUsuario(){
        return $this->estadoUsuario;
    }

    public function setNombreUsuario($nombreUsuario){
        $this->$nombreUsuario=$nombreUsuario;
    }
    

    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->$idUsuario=$idUsuario;
    }
    

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setTelefonoUsuario($telefonoUsuario){
        $this->$telefonoUsuario=$telefonoUsuario;
    }
    

    public function getTelefonoUsuario(){
        return $this->telefonoUsuario;
    }

    public function setPerfilUsuario($perfilUsuario){
        $this->$perfilUsuario=$perfilUsuario;
    }
    

    public function getPerfilUsuario(){
        return $this->perfilUsuario;
    }




}
?>

