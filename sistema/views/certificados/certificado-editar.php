
<section class="panel">

    <h1>MODULO CERTIFICADO -><?php 
    
    echo $certificado->getid()!="0"?  "Editar Certificado": "Crear Certificado" ;
 
     ?></h1>
    
    <form class="form" method="POST" action="?controller=certificado&method=RegistarCertificado">


    <fieldset class="scheduler-border">
    <legend class="scheduler-border">
    <?php 

    
    
   echo $certificado->getid()!="0"?  "Editar Certificado": "Crear Certificado" ;

    ?></legend>

     <input type="hidden" id="idHidden" name="idHidden" 
     value="<?php echo $certificado->getid()=="0" ? "" :$certificado->getid() ; ?>"
     class="form-control">    
     
    
    <div class="form-group row">
        <label for="id" class="col-sm-2 col-form-label">Identificacion</label>
    <div class="col-sm-3">
        <input type="text" id="id" name="id" class="form-control"
         <?php
          
          if($certificado->getid()!="0"){     
         ?>          
           readonly
         <?php }?>
         value="<?php echo $certificado->getid()=="0" ? "" :$certificado->getid() ; ?>"
        required>
    </div>
    </div>
    
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nombres Certificados</label>
    <div class="col-sm-5">
        <input type="text" id="name" name="name" class="form-control" 
        pattern="([^\s][A-z0-9À-ž\s]+)"
        title="Solo alpha númericos" 
        required
        placeholder="Ingrese nombres sin caracteres especiales"
        value="<?php echo $certificado->getname(); ?>"
        
        >
    </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-3">
        <select class="form-control"  name="email" id="email"
        required
        >
            <option value="">Seleccione</option>
             <?php 
            foreach($emaillista as $key => $value) { 
                ?>
                <option

                  <?php 

                    if($certificado->getemail()==$value->getEmailUsuario()){
                                        
                 ?>

                   selected

                <?php 

                    }
                                    
                ?>


                 value="<?php echo $value->getEmailUsuario() ?>"><?php echo $value->getEmailUsuario()?></option>
       
            <?php
            }
             ?>
         
            
         </select>

       
    </div>
    </div>


    <div class="form-group row">
        <label for="fecha" class="col-sm-2 col-form-label">Fecha Certificado</label>
    <div class="col-sm-3">
    <input type="date" name="fecha" id="fecha" class="form-control"    
        required
        value="<?php echo $certificado->getfecha(); ?>"
        >
    </div>
    </div>

    <div class="form-group row">
        <label for="curse_name" class="col-sm-2 col-form-label">Curso Certificado</label>
    <div class="col-sm-3">
    <input type="text" name="curse_name" id="curse_name" class="form-control"    
        required
        value="<?php echo $certificado->getcurse_name(); ?>"
        >
    </div>
    </div>

       
    </div>
    </div>

        <button type="button" class="btn btn-info mb-2" onclick="window.location.href='?controller=certificado'">Cancelar</button>  
        <button type="submit" class="btn btn-primary mb-2">Guardar</button>   
        <input type="reset" class="btn btn-secondary mb-2" value="Limpiar">
        </div>
    </div>



     </fieldset>
     </form>


</section>


