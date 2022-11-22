<?php

/**
     * Clase Modelo Security que gestion la session de usuarios
     *
     *
   */
class SecurityModel{

        //variable base de datos
        private $db;


        /*
        Constructor de las clase inicializa conexiòn base de datos
        */
        public function __construct()
        {      
        
            // Instanciamos la conexión de forma estatica 
            $this->db =  DatabaseMysqli::conexion();
                 

        }

   /**
     * Devuelve la información si el usuario esta en la base de datos de usuarios
     *
     * Este  método es usado validar, si ya esta registrado el usuario en la base de datos
     *
     * @access public
     * @param string $email llave de usuario 
     * @return objeto
     */
    public function validateLogin($email){
        try{

            // Prepara una sentencia SQL para su ejecución
            $result = $this->db->prepare("SELECT * FROM  usuario WHERE (emailUsuario = ? or loginUsuario=?)");

            //Agrega variables a una sentencia preparada como parámetros
            $result->bind_param('ss', $email,$email);

             /* ejecuta sentencias preparadas */
            $result->execute();     
            
            //mysqli_fetch_object->Devuelve la fila actual de un conjunto de resultados como un objeto
            //get_result-> Obtiene un conjunto de resultados de una sentencia preparada
            $objeto= mysqli_fetch_object($result->get_result());
        
         
           /* liberar el conjunto de resultados */
			$result->close();		

            /* cerrar la conexión */
           mysqli_close($this->db);

            //devolver objeto
            return $objeto;

        }catch (Exception $e){
            die($e->getMessage());
        }
    }

     /**
     * Verifica si la sesion de usuario existe
     *
     * Este  método es usado para validar si la sesion existe
     *
     * @access public
      */
    public static function verifyUser(){
        if(! isset($_SESSION['user'])) 
           header('location:?method=login');
    }

     /**
     * Verifica si el rol de usuario existe
     *
     * Este  método es usado para validar si el rol existe
     *
     * @access public
      */

    public function verifyRole($role){
        if(! $role == $_SESSION['user']['idPerfil']) header('location:?method=login');
    }

}