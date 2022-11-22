<?php


  /**
     * Controlador de perfiles
     *
     * Esta clase maneja lal lógica de negocio para certificados 
     *
     */
class certificadoController{

    // Declarar los modelos 
    private $certificadomodel;
    private $usuariomodel;
    


    
    /**
     * Función que se ejecuta siempre que se crea un objeto.
     * Se puede usar para la seguridad de un controlador.
     */
    
    public function __construct()
    {
       $this->certificadomodel =new certificadoModel();
       $this->usuarioModel = new usuarioModel();
       
    }


    /**
     * Devuelve la vista index
     *
     * Esta función es usado para devolver  la vista default qu contiene los 4 CRUD
     */
    public function index(){
        //La función require_once() incluye y evalua el fichero especificado durante la ejecución del script. 
        //si el código ha sido ya incluido, no se volverá a incluir.
        require_once 'views/layouts/header.php';
        require_once 'views/certificados/certificado.php';
        require_once 'views/layouts/footer.php';
    }

    /**
     * Devuelve la vista de edición o creación certificado
     *
     * Esta función es usado para devolver la vista funcional para editar o crear certificados
     *
     */
    public function Crid(){

        // instanciar la clase
        $certificado = new certificadoBase(0,'','',0, '', '', '', '','','');  
        
        //obtener perfiles del módelo
        $emaillista=$this->usuarioModel->Listar();

        // si existe lo consulto al certificado
       if(isset($_REQUEST['id'])){
            $certificado = $this->certificadomodel->Obtener($_REQUEST['id']);
        } 

           //La función require_once() incluye y evalua el fichero especificado durante la ejecución del script. 
        //si el código ha sido ya incluido, no se volverá a incluir.
        require_once 'views/layouts/header.php';
        require_once 'views/certificados/certificado-editar.php';
        require_once 'views/layouts/footer.php';
    }




     /**
     * Interactua con el módelo para realizar un CRUD
     *
     * Esta función es usado para llamar al modelo cuando se inserta o actualiza el certificado
     *
     */
     public function RegistarCertificado(){

        //valido los campos que existan  
        
        if (isset(
        $_POST['id'],
        $_POST['name'], 
        $_POST['email'],
        
        $_POST['fecha'],
        $_POST['curse_name'],
        )) 
        {

            //asignamos a variables
            
            $id= $_POST['id'];
       
            $name= $_POST['name'];
                
            $email= $_POST['email'];

            

           $fecha= $_POST['fecha'];

           $curse_name= $_POST['curse_name']; 


            //instanciar clase
           
            $input=$email . $curse_name;

            $hash = mhash(MHASH_CRC32, $input);
            $cod_certificado=bin2hex($hash);
            $certificadoBase= new  certificadoBase($id,$name,$email,
            $cod_certificado,$fecha,$curse_name);

            
            // Si el registro es nuevo se crea
           
            if($_POST['idHidden']==""){
                
                $this->certificadomodel->Insertar($certificadoBase);

            }
            else{

                // actualizado
                
                $this->certificadomodel->Actualizar($certificadoBase);
            }
        
              
            //redireccionar
           
             header('location:?controller=certificado');

        }


       
    }

      /**
     * Devuelve la vista index despues de eliminar
     *
     * Esta función es usado para llamar al modelo cuando se elimina el certificado
     *
     */
    
    public function Eliminar(){
        //Elimino
        
        $this->certificadomodel->Eliminar($_REQUEST['id']);
        //redirecciona
        header('Location:?controller=certificado');
       }
    


}

?>