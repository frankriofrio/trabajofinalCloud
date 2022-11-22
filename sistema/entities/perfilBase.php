<?php


  /**
     * Clase bse de perfiles
     *
     * Esta objetos es una instancia para perfil
     *
     */
class perfilBase{

    
    //atributos de la tabla perfil
    private $idPerfil;
    private $nombrePerfil;
      
    public function setNombrePerfil($nombrePerfil){
        $this->nombrePerfil=$nombrePerfil;
    }


    public function getNombrePerfil(){
        return $this->nombrePerfil;
    }


    public function setIdPerfil($idPerfil){
        $this->idPerfil=$idPerfil;
    }
    

    public function getIdPerfil(){
        return $this->idPerfil;
    }



}

?>