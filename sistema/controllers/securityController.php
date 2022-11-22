<?php


  /**
     * Controlador de seguridad
     *
     * Esta clase maneja lal lógica de gestión de sesiones
     *
     */
class securityController extends SecurityModel {

     /**
     * Función que se ejecuta lal iniciar sesion
     * Se usa para validar un usuario por email o login
     */    
    public function login(){
        $user = parent::validateLogin($_POST['email']);

        //Comprueba si una variable es un objeto
        if(!is_object($user)) {
            $_SESSION['flash']['message'] = 'Correo incorrecto.';
            return header('location:?method=login');
        }

        //ejemplo 123456
        $clave_basedatos=$user->claveUsuario;

       if(password_verify( $_POST['password'],$clave_basedatos)){
          $this->init();
          $this->addKey('user',$user);  
        
          return header('location:?controller=index');
       }

       $_SESSION['flash']['message'] = 'Contraseña incorrecta.';

        return header('location:?method=login');
    }

     /**
     * Función que se inicia la sesion del usuario
     * Se usa para iniciar un usuario sesion
     */   
    public function init(){
        session_start();
    }

    /**
     * Función que se adiciona la variable a la sesion del usuario
     * Se usa para iniciar un usuario sesion
     */ 
    public function addKey($key, $value){
        $_SESSION[$key] = $value;
    }

      /**
     * Función que se usa para cerrar la sesión de usuario
     * Se usa para cerrar  sesión
     */ 
    public function logout(){
        unset($_SESSION['user']);
        session_destroy();
        header('location:?controller=index');
    }

}

?>