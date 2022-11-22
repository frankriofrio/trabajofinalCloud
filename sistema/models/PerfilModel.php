<?php

  /**
     * Clase Modelo Perfil que obtine los datos de la base de datos
     *
     *
   */
class PerfilModel{

	//variable base de datos
    private $db;
	//variable a entidad perfilBase
    private $perfiles;


	/*
     Constructor de las clase inicializa conexiòn base de datos
    */
    public function __construct()
    {      
         // Instanciamos la conexión de forma estatica 
       $this->db =  DatabaseMysqli::conexion();
	   // Iniciamos el array
	   $this->perfiles=array();   
    }


	
   /**
     * Registra un perfil 
     *
     * Este método es usado para registar un objeto perfil con los datos del perfil
     *
     * @access public
     * @param object $data objeto de perfil 
    */
   public function Registrar(perfilBase $data)
	{
		try 
		{
		$sql = "INSERT INTO perfil (idPerfil, nombrePerfil) VALUES (?,?)";
 
		// Prepara una sentencia SQL para su ejecución
		$stmt=$this->db->prepare($sql);
		$zero = 0;

		 // Agrega variables a una sentencia preparada como parámetros: s=string i=entero
		$stmt->bind_param('ss',$zero, $data->getNombrePerfil());

		//ejecuta sentencias preparadas */
		$stmt->execute();
		
		//* cierra sentencia y conexión */
		$stmt->close();		

		//* cierra la conexión */
		$this->db->close();

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


   /**
     * Elimina pefil
     *
     * Este método es usado para eliminar un pefil
     *
     * @access public
     * @param int $id  de pefil    
     */
	public function Eliminar($id)
	{
		try 
		{
			// Prepara una sentencia SQL para su ejecución
			$stmt = $this->db->prepare("DELETE FROM perfil WHERE idPerfil = ?");			          
			$stmt->bind_param('i', $id);

            //ejecuta sentencias preparadas */
			$stmt->execute();
			
			//* cierra sentencia y conexión */
			$stmt->close();		

			//* cierra la conexión */
			$this->db->close();

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	 /**
     * Actualiza perfil
     *
     * Este  método es usado para actualizar un perfil menos el ID
     *
     * @access public
     * @param object $data objeto de perfil    
     */
	public function Actualizar(perfilBase $data)
	{
		try 
		{
			$sql = "UPDATE perfil SET nombrePerfil = ? WHERE idPerfil = ?";
			// Prepara una sentencia SQL para su ejecución
			$stmt=$this->db->prepare($sql);

		   // Agrega variables a una sentencia preparada como parámetros: s=string i=entero
			$stmt->bind_param("ss", $data->getNombrePerfil(), $data->getIdPerfil());

			 //ejecuta sentencias preparadas */
			$stmt->execute();
	
			//* cierra sentencia y conexión */
			$stmt->close();		

			//* cierra la conexión */
			$this->db->close();
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	/**
     * Devuelve la información todos los perfiles
     *
     * Este  método es usado para devolver un arry de perfiles
     *
     * @access public
     * @return 	 $this->perfiles;
     */
	public function Listar()
	{
		try
		{
			$result = array();
 
			//envía una única consulta 
			$stmt = $this->db->query("SELECT * FROM perfil");

			//Obtiene el número de filas de un resultado si es mayor a cero
			if($stmt->num_rows>0){

				// Obtener una fila de resultados como un array enumerado
				// donde cada columna es almacenada en un índice del array comenzando por 0 (cero)
				while($filas=$stmt->fetch_row()){				
					$perfil = new perfilBase();
					$perfil->setIdPerfil($filas[0]);
					$perfil->setNombrePerfil($filas[1]);				
					$this->perfiles[]=$perfil;
				}


			}			

			//* cierra sentencia y conexión */
			$stmt->close();		

			//* cierra la conexión */
			$this->db->close();

			//devolvemos el array
			return $this->perfiles;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	 /**
     * Devuelve la información de un perfil de acuerdo al ID
     *
     * Este  método es usado para devolver un objeto con los datos del perfil
     *
     * @access public
     * @param string $id llave de perfil 
     * @return usuario
     */
	public function Obtener($id)
    {
        try 
        {
			// Prepara una sentencia SQL para su ejecución
            $stmt = $this->db
                      ->prepare("SELECT * FROM perfil WHERE idPerfil=?");

			// Agrega variables a una sentencia preparada como parámetros: s=string i=entero
			$stmt->bind_param("i", $id);

			 //ejecuta sentencias preparadas */
			$stmt->execute();

		
			 // Obtiene un conjunto de resultados de una sentencia preparada
		     $result = $stmt->get_result();
			 

            // Obtener una fila de resultado como un array asociativo
			while ($filas = $result->fetch_assoc()) {
				$perfila = new perfilBase();
				$perfila->setIdPerfil($filas['idPerfil']);
				$perfila->setNombrePerfil($filas['nombrePerfil']);
			}

			
				//* cierra sentencia y conexión */
				$stmt->close();		

				//* cierra la conexión */
				$this->db->close();
		
			//retornamos objeto
            return $perfila;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }



    
}


?>