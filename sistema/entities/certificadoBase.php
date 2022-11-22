<?php


  /**
     * Clase bse de certificado
     *
     * Esta objetos es una instancia para certificado
     *
     */
class certificadoBase{

 
    //atributos de la clase certificado
     private $id;
     private $name;
     private $email;
     private $cod_certificado;    
     private $fecha;
     private $curse_name;
    

 
    /**
     * Constructor de certificado
     *
     * Iniciamos los atributos
     *
     */
    public function __construct($id,$name,$email,$cod_certificado,
    $fecha,$curse_name){

        $this->id=$id;
        $this->name=$name;
        $this->email=$email;
        $this->cod_certificado=$cod_certificado;
        $this->fecha=$fecha;
        $this->curse_name=$curse_name;
        

    }

    public function setid($id){
        $this->$id=$id;
    }

    public function getid(){
        return $this->id;
    }

    public function setname($name){
        $this->$name=$name;
    }


    public function getname(){
        return $this->name;
    }


    public function setemail($email){
        $this->$email=$email;
    }


    public function getemail(){
        return $this->email;
    }


    public function setcod_certificado($cod_certificado){
        $this->$cod_certificado=$cod_certificado;
    }


    public function getcod_certificado(){
        return $this->cod_certificado;
    }

    public function setfecha($fecha){
          $this->$fecha=$fecha;
    }


    public function getfecha(){
        return $this->fecha;
    }


   public function setcurse_name($curse_name){
        $this->$curse_name=$curse_name;
    }
    

    public function getcurse_name(){
        return $this->curse_name;
    }

   
}
?>

