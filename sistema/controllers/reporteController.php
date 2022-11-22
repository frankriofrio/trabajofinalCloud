<?php


  /**
     * Controlador de perfiles
     *
     * Esta clase maneja lal lógica de negocio para usuarios 
     *
     */
class reporteController{

    // Declarar los modelos 
    private $certificadomodel;
    private $perfilmodel;
    private $certificado;
    private $certificados;

    
    /**
     * Función que se ejecuta siempre que se crea un objeto.
     * Se puede usar para la seguridad de un controlador.
     */
    
    public function __construct()
    {
       $this->certificadomodel =new certificadoModel();
       $this->certificados= array();

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
        require_once 'views/reportes/consultar.php';
        require_once 'views/layouts/footer.php';
    }

    /**
     * Devuelve la vista de edición o creación usuario
     *
     * Esta función es usado para devolver la vista funcional para editar o crear usuario
     *
     */
    public function crud(){

        // instanciar la clase
        $certificado = new certificadoBase(0,'','','', '', '', '');  
        
        

        // si existe lo consulto al usuario
        if(isset($_REQUEST['id'])){
            $certificado = $this->certificadomodel->Obtener($_REQUEST['id']);
        }

           //La función require_once() incluye y evalua el fichero especificado durante la ejecución del script. 
        //si el código ha sido ya incluido, no se volverá a incluir.
        require_once 'views/layouts/header.php';
        require_once 'views/reportes/consultar.php';
        require_once 'views/layouts/footer.php';
    }

    public function consultar(){

       

        // si existe lo consulto al usuario
        if(isset($_REQUEST['id'])){
            $this->certificados[]= $this->certificadomodel->Obtenercert($_REQUEST['id']);
        }

           //La función require_once() incluye y evalua el fichero especificado durante la ejecución del script. 
        //si el código ha sido ya incluido, no se volverá a incluir.
        require_once 'views/layouts/header.php';
        require_once 'views/reportes/consultar.php';
        require_once 'views/layouts/footer.php';
    }




     /**
     * Interactua con el módelo para realizar un CRUD
     *
     * Esta función es usado para llamar al modelo cuando se inserta o actualiza el usuario
     *
     */
     public function RegistarCertificado(){

        //valido los campos que existan  
        if (isset(
        $_POST['idCertificado'],
        $_POST['nameCertificado'], 
        $_POST['emailCertificado'],
        $_POST['cod_certificadoCertificado'],
        $_POST['fechaCertificado'],
        $_POST['curse_nameCertificado'],
        )) 
        {

            //asignamos a variables

            $idCertificado= $_POST['idCertificado'];
       
            $nameCertificado= $_POST['nameCertificado'];
                
            $emailCertificado= $_POST['emailCertificado'];

            $cod_certificadoCertificado= $_POST['cod_certificadoCertificado'];

           $fechaCertificado= $_POST['fechaCertificado'];

           $curse_nameCertificado= $_POST['curse_nameCertificado']; 


            //instanciar clase
            $certificadoBase= new  certificadoBase($idCertificado,$nameCertificado,$emailCertificado,
            $cod_certificadoCertificado,$fechaCertificado,$curse_nameCertificado);

            
            // Si el registro es nuevo se crea
            if($_POST['idCertificadoHidden']==""){
                
                $this->certificadomodel->Insertar($certificadoBase);

            }
            else{

                // actualizado
                $this->certificadomodel->Actualizar($certificadoBase);
            }
        
              
            //redireccionar
             header('location: ?controller=certificado');

        }


       
    }

      /**
     * Devuelve la vista index despues de eliminar
     *
     * Esta función es usado para llamar al modelo cuando se elimina el usuario
     *
     */
    public function Eliminar(){
        //Elimino
        $this->certificadoModel->Eliminar($_REQUEST['id']);
        //redirecciona
        header('Location: ?controller=certificado');
       }
    


}

?>