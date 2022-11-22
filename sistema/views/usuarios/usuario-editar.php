<script src="views/js/usuarios/usuario.js"></script>

<section class="panel">

    <h1>MODULO USUARIO -><?php 
    
    echo $usuario->getIdUsuario()!="0"?  "Editar Usuario": "Crear Usuario" ;
 
     ?></h1>
    
    <form class="form" method="POST" action="?controller=usuario&method=RegistarUsuario">


    <fieldset class="scheduler-border">
    <legend class="scheduler-border">
    <?php 

    
    
   echo $usuario->getIdUsuario()!="0"?  "Editar Usuario": "Crear Usuario" ;

    ?></legend>

     <input type="hidden" id="idUsuarioHidden" name="idUsuarioHidden" 
     value="<?php echo $usuario->getIdUsuario()=="0" ? "" :$usuario->getIdUsuario() ; ?>"
     class="form-control">    
     
     <input type="hidden" id="claveUsuarioHidden" name="claveUsuarioHidden" 
     value="<?php echo $usuario->getClaveUsuario() ?>"
     class="form-control">    




    <div class="form-group row">
        <label for="idUsuario" class="col-sm-2 col-form-label">Identificacion</label>
    <div class="col-sm-3">
        <input type="text" id="idUsuario" name="idUsuario" class="form-control"
         <?php
          
          if($usuario->getIdUsuario()!="0"){     
         ?>          
           readonly
         <?php }?>
         onkeypress="return onlyNumberKey(event)"
        value="<?php echo $usuario->getIdUsuario()=="0" ? "" :$usuario->getIdUsuario() ; ?>"
        required>
    </div>
    </div>
    
    <div class="form-group row">
        <label for="nombreUsuario" class="col-sm-2 col-form-label">Nombres Usuario</label>
    <div class="col-sm-4">
        <input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control" 
        pattern="([^\s][A-z0-9À-ž\s]+)"
        title="Solo alpha númericos" 
        required
        placeholder="Ingrese nombres sin caracteres especiales"
        value="<?php echo $usuario->getNombreUsuario(); ?>"
        
        >
    </div>
    </div>
    
    <div class="form-group row">
        <label for="edadUsuario" class="col-sm-2 col-form-label">Edad Usuario</label>
    <div class="col-sm-3">
        <input type="number" id="edadUsuario" name="edadUsuario" class="form-control"
        min="18" max="99"
        required
        value="<?php echo $usuario->getEdadUsuario(); ?>"
        >
    </div>
    </div>


    <div class="form-group row">
        <label for="edadUsuario" class="col-sm-2 col-form-label">Fecha Nacimiento</label>
    <div class="col-sm-3">
    <input type="date" name="fechaNacimientoUsuario" id="fechaNacimientoUsuario" class="form-control"    
        required
        value="<?php echo $usuario->getfechaNacimientoUsuario(); ?>"
        >
    </div>
    </div>
    

    <div class="form-group row">
        <label for="telefonoUsuario" class="col-sm-2 col-form-label">Teléfono Usuario</label>
    <div class="col-sm-3">
        <input id="telefonoUsuario" name="telefonoUsuario" class="form-control"     
        type="text" 
        placeholder='Número Télefono'
        onkeypress="return onlyNumberKey(event)"
        required
        value="<?php echo $usuario->getTelefonoUsuario(); ?>"
        >


    </div>
    </div>

    <div class="form-group row">
        <label for="perfilUsuario" class="col-sm-2 col-form-label">Perfil Usuario</label>
    <div class="col-sm-3">
        <select class="form-control"  name="perfilUsuario" id="perfilUsuario"
        required
        >
            <option value="">Seleccione</option>
             <?php 
            foreach($perfilista as $key => $value) { 
                ?>
                <option

                  <?php 

                    if($usuario->getPerfilUsuario()==$value->getIdPerfil()){
                                        
                 ?>

                   selected

                <?php 

                    }
                                    
                ?>


                 value="<?php echo $value->getIdPerfil() ?>"><?php echo $value->getNombrePerfil()?></option>
       
            <?php
            }
             ?>
         
            
         </select>

       
    </div>
    </div>

    <div class="form-group row">
        <label for="emailUsuario" class="col-sm-2 col-form-label">Email Usuario</label>
    <div class="col-sm-3">
        <input type="email" id="emailUsuario" name="emailUsuario" class="form-control" 
        required 
        placeholder="Ingrese email"
        value="<?php echo $usuario->getEmailUsuario(); ?>"
        >
    </div>
    </div>

    
    <div class="form-group row">
        <label for="loginUsuario" class="col-sm-2 col-form-label">Login Usuario</label>
    <div class="col-sm-3">
        <input type="text" id="loginUsuario" name="loginUsuario" class="form-control"          
        placeholder="Ingrese login"
        required
        value="<?php echo $usuario->getLoginUsuario(); ?>"
        >
    </div>
    </div>


    <div class="form-group row">
        <label for="claveUsuario" class="col-sm-2 col-form-label">Password Usuario</label>
    <div class="col-sm-3">
        <input type="password" id="claveUsuario" name="claveUsuario" class="form-control"      
        maxlength="20"    
        placeholder="Ingrese clave"
        <?php          
          if($usuario->getIdUsuario()=="0"){ 
         ?>           
           required
         <?php }?>
         onblur="validar();"
        value="">
    </div>
    </div>

    <div class="form-group row">
        <label for="claveUsuario2" class="col-sm-2 col-form-label">Repetir Password</label>
    <div class="col-sm-3">
        <input type="password" id="claveUsuario2" name="claveUsuario2" class="form-control" 
        maxlength="20"    
        placeholder="Confirme clave"

        <?php          
          if($usuario->getIdUsuario()=="0"){ 
         ?>           
           required
         <?php }?>



        onblur="validar();"
        value="">
      

    </div>
    </div>
   

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Estado Usuario</label>
        <div class="col-sm-5">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" 
         
            
            name="estadoUsuario" id="estadoUsuarioA" value="A"
            
   
                checked

              
            
            >
            <label class="form-check-label" for="inlineRadio1">Activo</label>
            </div>
            <div class="form-check form-check-inline">



            <input class="form-check-input" type="radio"
         
            
            name="estadoUsuario" id="estadoUsuarioI" value="I"
            
            <?php
                
                if($usuario->getEstadoUsuario()=="I"){
                
                
                ?>
                
                checked

                <?php }?>
            
            >
            <label class="form-check-label" for="inlineRadio2">Inactivo</label>
            </div>

        </div>
    </div>

     

    <div class="form-group row">
        <label for="telefonoUsuario" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-6">

        <button type="button" class="btn btn-info mb-2" onclick="window.location.href='?controller=usuario'">Cancelar</button>  
        <button type="submit" class="btn btn-primary mb-2">Guardar</button>   
        <input type="reset" class="btn btn-secondary mb-2" value="Limpiar">
        </div>
    </div>



     </fieldset>
     </form>


</section>


