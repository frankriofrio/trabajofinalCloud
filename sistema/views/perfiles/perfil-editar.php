
<h1 class="page-header">
    <?php echo $perfil->getIdPerfil() != null ? $perfil->getNombrePerfil() : 'Nuevo Registro'; ?>
</h1>




<section class="panel">
<form  classs="form-inline" action="?controller=Perfil&method=GuardarPerfil" method="post" enctype="multipart/form-data">
    <input type="hidden" id="idPerfil" name="idPerfil" value="<?php echo $perfil->getIdPerfil(); ?>" />

  

    <div class="form-group col-md-6">
    <label for="nombrePerfil" class="form-label">Nombre Perfil</label>
    </div>
    <div class="form-group mx-sm-3 mb-2">
    <input type="text" id="nombrePerfil" 
         required
         minlength="3"
         pattern="([^\s][A-z0-9À-ž\s]+)"
         title="Solo alpha númericos" 
         name="nombrePerfil" value="<?php echo $perfil->getNombrePerfil(); ?>"
         class="form-control" placeholder="Ingrese Perfil" /> 
     </p>
    </div> 


    <hr />

     <div class="text-right">
    <button type="button" class="btn btn-info" onclick="window.location.href='?controller=perfil'">Cancelar</button>  
        <button class="btn btn-success">Guardar</button>
    </div>
</form>
</section>



<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>