<?php



  /**
     * Controlador de perfiles
     *
     * Esta clase maneja lal lógica de negocio para perfiles 
     *
     */
class perfilController{

     // Declarar los modelos 
    private $perfilmodel;
    private $usuariomodel;
 

    /**
     * Función que se ejecuta siempre que se crea un objeto.
     * Se puede usar para la seguridad de un controlador.
     */
    
    public function __construct()
    {
        //Valida que exista sesion usuario
         SecurityModel::verifyUser();
   
         //instanciamos los módelos
        $this->perfilmodel = new PerfilModel();
        $this->usuariomodel =new usuarioModel();

        
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
        require_once 'views/perfiles/perfil.php';
        require_once 'views/layouts/footer.php';
    }

    /**
     * Devuelve la vista de edición o creación perfil
     *
     * Esta función es usado para devolver la vista funcional para editar o crear perfil
     *
     */
    public function crud(){

        //Instanciamos la clase base perfil
        $perfil = new perfilBase();
    
        //valida si existe el parametro
        //REQUEST nos permite capturar variables enviadas desde formularios con los métodos GET o POST.
        if(isset($_REQUEST['id'])){
            $perfil = $this->perfilmodel->Obtener($_REQUEST['id']);
        }

        //La función require_once() incluye y evalua el fichero especificado durante la ejecución del script. 
        //si el código ha sido ya incluido, no se volverá a incluir.
        require_once 'views/layouts/header.php';
        require_once 'views/perfiles/perfil-editar.php';
        require_once 'views/layouts/footer.php';
    }

    /**
     * Interactua con el módelo para realizar un CRUD
     *
     * Esta función es usado para llamar al modelo cuando se inserta o actualiza el perfil
     *
     */
   public function GuardarPerfil(){


    // Instanciar clase base y asignar valores del perfil
    $perfil= new perfilBase();
    $perfil->setIdPerfil($_POST['idPerfil']);
    $perfil->setNombrePerfil($_POST['nombrePerfil']);


    // Comparamos si es nuveo o actualziar
    $perfil->getIdPerfil() > 0 
    ? $this->perfilmodel->Actualizar($perfil)
    : $this->perfilmodel->Registrar($perfil);


    //redireccionar
     header('Location: ?controller=perfil');
   }


     /**
     * Devuelve la vista index despues de eliminar
     *
     * Esta función es usado para llamar al modelo cuando se elimina el perfil
     *
     */
    public function Eliminar(){
    $resultadoEliminacion = $this->usuariomodel->ObtenerPorPerfil($_REQUEST['id']);
        
    //validamos si no hay dependencias , entonces lo eliminamos
        if($resultadoEliminacion <1){

            //Eliminar
             $this->perfilmodel->Eliminar($_REQUEST['id']);
              //Redirrecionar
             header('Location: ?controller=perfil');
        }
        else{
            //Redirrecionar
            header('Location: ?controller=perfil&msg=1');

        }   
   }
}

?>