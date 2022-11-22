<?php

  /**
     * Clase Modelo Usuario que obtiene los datos de la base de datos
     *
     *
   */
class usuarioModel {

    //variable base de datos
    private $db;

    //variable a entidad usuarioBase
    private $usuarios;
 
    /*
     Constructor de las clase inicializa conexiòn base de datos
    */
    public function __construct()
    {      
      
        // Instanciamos la conexión de forma estatica 
        $this->db =  DatabaseMysqli::conexion();
       // Iniciamos el arra
        $this->usuarios= array();
 
    }

      /**
     * Devuelve la información si hay usuarios asociados al perfil
     *
     * Este  método es usado para devolver el conteo de usuarios por un perfil
     *
     * @access public
     * @param string $idPerfil llave de perfil 
     * @return conteo
     */
    public function ObtenerPorPerfil($idPerfil){
   
        // Prepara una sentencia SQL para su ejecución
        $result = $this->db
       ->prepare("SELECT COUNT(p.idPerfil) FROM usuario u inner join perfil p on u.idPerfil=p.idPerfil and p.idPerfil=?");


        // Agrega variables a una sentencia preparada como parámetros: s=string i=entero
        mysqli_stmt_bind_param($result, "i",$idPerfil);


        
        //Ejecuta la consulta que ha sido previamente preparada usando prepare()
        mysqli_stmt_execute($result);


        //Obtenemos un conjunto de resultados de una sentencia preparada
        $resultado = mysqli_stmt_get_result($result);

        //MYSQLI_NUM  se puede usar para especificar el formato de retorno de los datos.
        //especifica que la matriz de retorno debe usar claves numéricas para la matriz, 
        //en lugar de crear una matriz asociativa

        //mysqli_fetch_array — Obtiene una fila de resultados como un array asociativo, numérico, o ambos
        //Además de guardar la información en los índices numéricos del array resultante, la función mysqli_fetch_array() 
        //también puede guardar la información en índices asociativos, utilizando los nombres de los campos del resultado como claves.
        while ($fila = mysqli_fetch_array($resultado, MYSQLI_NUM))
        {
            //recorremos
            foreach ($fila as $f)
            {
                //asignamos
                $conteo= $f;
            }
     
        }
           
           //Cerar la sentencia y conexión
          mysqli_stmt_close($result);

          //cerramos conexion base de datos
          mysqli_close($this->db);

          return $conteo;
       }


     /**
     * Devuelve la información de un usuario de acuerdo al ID
     *
     * Este  método es usado para devolver un objeto con los datos del usuario
     *
     * @access public
     * @param string $id llave de usuario 
     * @return usuario
     */
    public function Obtener($id)
    {
        try 
        {
            // Prepara una sentencia SQL para su ejecución
            $stmt = $this->db
                      ->prepare("SELECT * FROM usuario WHERE idUsuario=?");

			/* bind parameters for markers */
			$stmt->bind_param("i", $id);

             //ejecuta sentencias preparadas */
			$stmt->execute();

			 // Obtiene un conjunto de resultados de una sentencia preparada
		     $result = $stmt->get_result();

		
			 
         // Obtener una fila de resultado como un array asociativo
			while ($filas = $result->fetch_assoc()) {
				$usuario = new usuarioBase(
                    $filas['edadUsuario'],
                    $filas['nombreUsuario'],
                    $filas['estadoUsuario'],
                    $filas['idUsuario'],
                    $filas['telefonoUsuario'],
                    $filas['emailUsuario'],
                    $filas['loginUsuario'],
                    $filas['claveUsuario'],
                    $filas['idPerfil'],
                    $filas['fechaNacimientoUsuario']
                );
		
			
			}

            	//* cierra sentencia y conexión */
			$stmt->close();		

			//* cierra la conexión */
			$this->db->close();

            //retornamos objeto
            return $usuario;

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    /**
     * Devuelve la información todos los usuarios
     *
     * Este  método es usado para devolver un arry de usuarios
     *
     * @access public
     * @return 	 $this->usuarios;
     */
	public function Listar()
	{
		try
		{
			
            $query="SELECT u.*, p.* FROM usuario u inner join perfil p on u.idPerfil=p.idPerfil";
       
            //envía una única consulta 
			$stmt = $this->db->query($query);

            //Obtiene el número de filas de un resultado si es mayor a cero
			if($stmt->num_rows>0){


                // Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                while($row = $stmt->fetch_array()){
                  
                    $usuario_pojo= new usuarioBase($row['edadUsuario'],
                    $row[1],
                    $row['estadoUsuario'],
                    $row['idUsuario'],
                    $row['telefonoUsuario'],
                    $row['emailUsuario'],
                    $row['loginUsuario'],
                    $row['claveUsuario'],
                    $row['idPerfil'],
                    $row['fechaNacimientoUsuario']
                );
                    $perfil= new perfilBase();
                    $perfil->setIdPerfil($row['idPerfil']);
                    $perfil->setNombrePerfil($row['nombrePerfil']);
                    $usuario_pojo->setPerfilBase($perfil);

                    $this->usuarios[]=$usuario_pojo;
                }

               
			}			

			//* cierra sentencia y conexión */
            $stmt->close();		

             //* cierra la conexión */
             $this->db->close();

            // retornamos usuarios
			return $this->usuarios;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

     /**
     * Actualiza usuario
     *
     * Este  método es usado para actualizar todos los campos de un usuarios menos el ID
     *
     * @access public
     * @param object $data objeto de usuario    
     */
    public function Actualizar(usuarioBase $data){

        $sql= "UPDATE usuario SET 
        nombreUsuario=?,
        edadUsuario=?,
        telefonoUsuario=?,
        estadoUsuario=?,
        idPerfil=?,
        emailUsuario=?,
        loginUsuario=?,
        claveUsuario=? ,
        fechaNacimientoUsuario=?
        WHERE  idUsuario=?";

        // Prepara una sentencia SQL para su ejecución
        $stmt = $this->db->prepare($sql);

        // Agrega variables a una sentencia preparada como parámetros: s=string i=entero
         $stmt->bind_param('sississsss',    
         $data->getNombreUsuario() ,
         $data->getEdadUsuario(),
         $data->getTelefonoUsuario(),
         $data->getEstadoUsuario() ,
         $data->getPerfilUsuario(),
         $data->getEmailUsuario() ,
         $data->getLoginUsuario() ,
         $data->getClaveUsuario(),    
         $data->getfechaNacimientoUsuario(),
         $data->getIdUsuario()
        );

        /* ejecuta sentencias preparadas */
        $stmt->execute();       

        
		//* cierra sentencia y conexión */
		$stmt->close();		

		//* cierra la conexión */
		$this->db->close();
			

    }

    /**
     * Inserta usuario
     *
     * Este método es usado para registar un usuario
     *
     * @access public
     * @param object $data objeto de usuario    
     */
    public function Insertar(usuarioBase $data){

        try{

            $sql="INSERT
            INTO usuario (idUsuario , nombreUsuario, edadUsuario, telefonoUsuario,estadoUsuario,idPerfil,emailUsuario,loginUsuario,claveUsuario,fechaNacimientoUsuario)
             VALUES (?,?,?,?,?,?,?,?,?,?)";

            // Prepara una sentencia SQL para su ejecución
            $result = $this->db->prepare($sql);

             // Agrega variables a una sentencia preparada como parámetros: s=string i=entero
             mysqli_stmt_bind_param($result, "ssississss",
             $data->getIdUsuario() , 
             $data->getNombreUsuario() ,
             $data->getEdadUsuario(),
             $data->getTelefonoUsuario(),
             $data->getEstadoUsuario() ,
             $data->getPerfilUsuario(),
             $data->getEmailUsuario() ,
             $data->getLoginUsuario() ,
             $data->getClaveUsuario(),
             $data->getfechaNacimientoUsuario()
            );
   
        
            //Ejecuta la consulta que ha sido previamente preparada usando prepare()
             mysqli_stmt_execute($result);
           
     
             //Cerar la sentencia y conexión
             mysqli_stmt_close($result);


        }catch (Exception $e){
           die("Error User->register() " . $e->getMessage());
        }


    }

     /**
     * Elimina usuario
     *
     * Este método es usado para eliminar un usuario
     *
     * @access public
     * @param int $id  de usuario    
     */
    public function Eliminar($id)
	{
		try 
		{
            // Prepara una sentencia SQL para su ejecución
			$stmt = $this->db->prepare("DELETE FROM usuario WHERE idUsuario = ?");		
            
             // Agrega variables a una sentencia preparada como parámetros: s=string i=entero
			$stmt->bind_param('i', $id);


			/* ejecuta sentencias prepradas */
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


}

?>