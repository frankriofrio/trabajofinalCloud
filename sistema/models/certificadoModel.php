<?php

  /**
     * Clase Modelo Certificado que obtine los datos de la base de datos
     *
     *
   */
class certificadoModel {

    //variable base de datos
    private $db;

    //variable a entidad certificadoBase
    private $certificados;
 
    /*
     Constructor de las clase inicializa conexiòn base de datos
    */
    public function __construct()
    {      
      
        // Instanciamos la conexión de forma estatica 
        $this->db =  DatabaseMysqli::conexion();
       // Iniciamos el arra
        $this->certificados= array();
 
    }

      /**
     * Devuelve la información si hay certificados asociados al perfil
     *
     * Este  método es usado para devolver el conteo de usuarios por un perfil
     *
     * @access public
     * @param string $idPerfil llave de perfil 
     * @return conteo
     */
    public function ObtenerPorCertificado($id){
   
        // Prepara una sentencia SQL para su ejecución
        $result = $this->db
       ->prepare("SELECT COUNT(u.id) FROM wpf5_addressbook u WHERE u.id=?");


        // Agrega variables a una sentencia preparada como parámetros: s=string i=entero
        mysqli_stmt_bind_param($result, "i",$id);


        
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
     * Este  método es usado para devolver un objeto con los datos del certificado
     *
     * @access public
     * @param string $id llave de certificado 
     * @return certificados
     */
    public function Obtener($id)
    {
        try 
        {
            // Prepara una sentencia SQL para su ejecución
            $stmt = $this->db
                      ->prepare("SELECT * FROM wpf5_addressbook WHERE id=?");

			/* bind parameters for markers */
			$stmt->bind_param("i", $id);

             //ejecuta sentencias preparadas */
			$stmt->execute();

			 // Obtiene un conjunto de resultados de una sentencia preparada
		     $result = $stmt->get_result();

		
			 
         // Obtener una fila de resultado como un array asociativo
			while ($filas = $result->fetch_assoc()) {
				$certificado = new certificadoBase(
                    $filas['id'],
                    $filas['name'],
                    $filas['email'],
                    $filas['cod_certificado'],
                    $filas['fecha'],
                    $filas['curse_name'],
                );
		
			
			}

            	//* cierra sentencia y conexión */
			$stmt->close();		

			//* cierra la conexión */
			$this->db->close();

            //retornamos objeto
            return $certificado;

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    /**
     * Devuelve la información todos los certificados
     *
     * Este  método es usado para devolver un arry de certificados
     *
     * @access public
     * @return 	 $this->certificados;
     */
	public function Listar()
	{
		try
		{
			
            $query="SELECT * FROM wpf5_addressbook";
       
            //envía una única consulta
			$stmt = $this->db->query($query);

            //Obtiene el número de filas de un resultado si es mayor a cero
			if($stmt->num_rows>0){


                // Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                while($row = $stmt->fetch_array()){
                  
                   $certificado_pojo= new certificadoBase($row['id'],
                    $row['name'],
                    $row['email'],
                    $row['cod_certificado'],
                    $row['fecha'],
                    $row['curse_name'],
                  );
                   
                    $this->certificados[]=$certificado_pojo;
                
                }

               
			}			

			//* cierra sentencia y conexión */
            $stmt->close();		

             //* cierra la conexión */
             $this->db->close();

            // retornamos certificados
			return $this->certificados;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

     /**
     * Actualiza certificado
     *
     * Este  método es usado para actualizar todos los campos de un certificado menos el ID
     *
     * @access public
     * @param object $data objeto de certificado    
     */
    public function Obtenercert($id)
    {
       
        try 
        {
            // Prepara una sentencia SQL para su ejecución
            $stmt = $this->db
                      ->prepare("SELECT * FROM wpf5_addressbook WHERE cod_certificado=?");

			/* bind parameters for markers */
			$stmt->bind_param("s", $id);

             //ejecuta sentencias preparadas */
			$stmt->execute();

			 // Obtiene un conjunto de resultados de una sentencia preparada
		     $result = $stmt->get_result();

         // Obtener una fila de resultado como un array asociativo
			while ($filas = $result->fetch_assoc()) {
				$certificado = new certificadoBase(
                    $filas['id'],
                    $filas['name'],
                    $filas['email'],
                    $filas['cod_certificado'],
                    $filas['fecha'],
                    $filas['curse_name'],
                );
		
              //$this->certificados=  $certificado;
             // Obtengo la informacion dentro de las variables para armar un nuevo array
                    $filasId = $filas['id'];
                    $filasName = $filas['name'];
                    $filasEmail = $filas['email'];
                    $filasCod_certificado = $filas['cod_certificado'];
                    $filasFecha = $filas['fecha'];
                    $filasCurse_name= $filas['curse_name'];
             
			}
        
            	//* cierra sentencia y conexión */
			$stmt->close();		

			//* cierra la conexión */
			$this->db->close();

            //retornamos objeto
           
           //return $this->certificados;
           //Si los datos de las variables no son nulos envio el array
           if(isset($filasId)){
                 return array($filasId, $filasName,$filasEmail,$filasCod_certificado,$filasFecha,$filasCurse_name);
            }else {
                 return array('','','','','','');
            }
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
	 

    public function Actualizar(certificadoBase $data){

        $sql= "UPDATE wpf5_addressbook SET 
        name=?,
        email=?,        
        fecha=?,
        curse_name=?
        WHERE  id=?";

        // Prepara una sentencia SQL para su ejecución
        $stmt = $this->db->prepare($sql);

        // Agrega variables a una sentencia preparada como parámetros: s=string i=entero
         $stmt->bind_param('ssssi',    
         $data->getname(),
         $data->getemail(),        
         $data->getfecha(),
         $data->getcurse_name(),
         $data->getid() 
         
        );

        /* ejecuta sentencias prepradas */
        $stmt->execute();       

        
		//* cierra sentencia y conexión */
		$stmt->close();		

		//* cierra la conexión */
		$this->db->close();
			

    }

    /**
     * Inserta certificado
     *
     * Este método es usado para registar un certificado
     *
     * @access public
     * @param object $data objeto de certificado    
     */
    public function Insertar(certificadoBase $data){

        try{

            $sql="INSERT
            INTO wpf5_addressbook (id,name,email,cod_certificado,fecha,curse_name)
             VALUES (?,?,?,?,?,?)";

            // Prepara una sentencia SQL para su ejecución
            echo "hola mundo";
            $result = $this->db->prepare($sql);
            $zero=0;
            echo "hola mundo";
             // Agrega variables a una sentencia preparada como parámetros: s=string i=entero
             mysqli_stmt_bind_param($result, "isssss",
             $zero,
             $data->getname(),
             $data->getemail(),
             $data->getcod_certificado(),
             $data->getfecha(),
             $data->getcurse_name() ,
            );
   
        
            //Ejecuta la consulta que ha sido previamente preparada usando prepare()
             mysqli_stmt_execute($result);
           
     
             //Cerar la sentencia y conexión
             mysqli_stmt_close($result);


        }catch (Exception $e){
            echo $e->getMessage ();
           die("Error User->register() " . $e->getMessage());
        }


    }

     /**
     * Elimina certificado
     *
     * Este método es usado para eliminar un certificado
     *
     * @access public
     * @param int $id  de certificado    
     */
    public function Eliminar($id)
	{
		try 
		{
            // Prepara una sentencia SQL para su ejecución
			$stmt = $this->db->prepare("DELETE FROM wpf5_addressbook WHERE id = ?");		
            
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