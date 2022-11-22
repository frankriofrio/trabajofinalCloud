
<section class="panel">
    <h1>MODULO PERFILES </h1>
    
    <fieldset class="scheduler-border">
    
    <p></p>


<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?controller=Perfil&method=Crud">
 <span>
  <i class="fas fa-plus"></i>
</span>Nuevo Perfil</a>
</div>



<table class="table table-striped" id="tabla_estilizada">
    <thead >
        <tr>
            <th >ID</th>
            <th>Nombre</th> 
            <th colspan="2" >Acciones</th>
         
        </tr>
    </thead>
    <tbody>
    <?php 
    
      foreach($this->perfilmodel->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->getIdPerfil(); ?></td>
            <td><?php echo $r->getNombrePerfil(); ?></td>
            <td>
            <a href="?controller=perfil&method=crud&id=<?=$r->getIdPerfil(); ?>"><i class="fas fa-edit"></i>Editar</a>
            </td>
            <td>
                <a href="?controller=perfil&method=Eliminar&id=<?=$r->getIdPerfil(); ?>"><i class="fas fa-trash"></i>Eliminar</a>
            </td>
        </tr>
    <?php 
    
  endforeach;
    
    ?>
    </tbody>
</table> 


  <p style="color:red">         
    <?php
       $resultado="";
            if (isset($_GET['msg'])) 
                {                                
                    $resultado= "No se puede eliminar este registro, esta asociado a uno o mas usuarios...";
                    echo $resultado;
                }
                else
                        
                {
                    echo $resultado;             
                }               
            
        ?> 
  </p>
 

     </fieldset>
 

</section>

