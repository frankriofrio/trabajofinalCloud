<?php


  /**
     * Controlador de perfiles
     *
     * Esta clase maneja la lógica de negocio para usuarios 
     *
     */
class usuarioController{

    // Declarar los modelos 
    private $usuariomodel;
    private $perfilmodel;


    
    /**
     * Función que se ejecuta siempre que se crea un objeto.
     * Se puede usar para la seguridad de un controlador.
     */
    
    public function __construct()
    {

       //Valida que exista sesion usuario
        if(!empty($_SESSION['user'])){
          
            $this->usuariomodel =new usuarioModel();
            $this->perfilmodel = new PerfilModel();
        }
        else{
            return header('location:?method=login');
        } 
  
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
        require_once 'views/usuarios/usuario.php';
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
        $usuario = new usuarioBase(0,'','',0, '', '', '', '','','');  
        
        //obtener perfiles del módelo
        $perfilista=$this->perfilmodel->Listar();


        // si existe lo consulto al usuario
        if(isset($_REQUEST['id'])){
            $usuario = $this->usuariomodel->Obtener($_REQUEST['id']);
        }

           //La función require_once() incluye y evalua el fichero especificado durante la ejecución del script. 
        //si el código ha sido ya incluido, no se volverá a incluir.
        require_once 'views/layouts/header.php';
        require_once 'views/usuarios/usuario-editar.php';
        require_once 'views/layouts/footer.php';
    }




     /**
     * Interactua con el módelo para realizar un CRUD
     *
     * Esta función es usado para llamar al modelo cuando se inserta o actualiza el usuario
     *
     */
     public function RegistarUsuario(){

        //valido los campos que existan  
        if (isset(
        $_POST['idUsuario'],
        $_POST['nombreUsuario'], 
        $_POST['edadUsuario'],
        $_POST['telefonoUsuario'],
        $_POST['estadoUsuario'],
        $_POST['perfilUsuario'],
        $_POST['emailUsuario'],
        $_POST['loginUsuario'],    
        $_POST['fechaNacimientoUsuario']     
        )) 
        {

            //asignamos a variables

            $idUsuario= $_POST['idUsuario'];
       
            $nombreUsuario= $_POST['nombreUsuario'];
       
            $edadUsuario= $_POST['edadUsuario'];
      
            $telefonoUsuario= $_POST['telefonoUsuario'];

            $estadoUsuario= $_POST['estadoUsuario'];

            $perfilUsuario= $_POST['perfilUsuario'];
            
            $emailUsuario= $_POST['emailUsuario'];

            $loginUsuario= $_POST['loginUsuario'];

           $fechaNacimientoUsuario= $_POST['fechaNacimientoUsuario']; 


           //Si la clave es diferente a vacio se asigna me toma la que tengo por defecto        
            if($_POST['claveUsuarioHidden']!=""){

                $claveUsuario=$_POST['claveUsuarioHidden'];
            }


            //si la cambio por una nueva
            if($_POST['claveUsuario']!=""){
                $claveUsuario = password_hash($_POST['claveUsuario'],PASSWORD_DEFAULT);
            }
            

            //instanciar clase
            $usuarioBase= new  usuarioBase($edadUsuario,$nombreUsuario,$estadoUsuario,$idUsuario, $telefonoUsuario, $emailUsuario, $loginUsuario,   $claveUsuario,$perfilUsuario,$fechaNacimientoUsuario);

            
            // Si el registro es nuevo se crea
            if($_POST['idUsuarioHidden']==""){
                
                $this->usuariomodel->Insertar($usuarioBase);

            }
            else{

                // actualizao
                $this->usuariomodel->Actualizar($usuarioBase);
            }
        
              
            //redireccionar
             header('location: ?controller=usuario');

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
        $this->usuariomodel->Eliminar($_REQUEST['id']);
        //redirecciona
        header('Location: ?controller=usuario');
       }
    


}

?>