<section class="panel">
    <h1>MODULO CERTIFICADOS </h1>
    
    <fieldset class="scheduler-border">
    
    <p></p>


<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?controller=certificado&method=Crid">
 <span>
  <i class="fas fa-plus"></i>
</span>Nuevo certificado</a>
</div>



<table class="table table-striped" id="tabla_estilizada">
    <thead >
        <tr>
            <th >ID</th>
            <th>Nombre y Apellidos</th> 
            <th>Email</th> 
            <th>Codigo Certificado</th> 
            <th>Fecha</th> 
            <th>Nombre Curso</th> 
            <th colspan="2" >Acciones</th>         
        </tr>
    </thead>
    <tbody>
    <?php 
    
     
      foreach($this->certificadomodel->Listar() as $r): ?>
      <tr>
            <td><?php echo $r->getid(); ?></td>
            <td><?php echo $r->getname(); ?></td>
            <td><?php echo $r->getemail(); ?></td>
            <td><?php echo $r->getcod_certificado(); ?></td>
            <td><?php echo $r->getfecha(); ?></td>
            <td><?php echo $r->getcurse_name(); ?></td>           
            
           <td>
                <a href="?controller=certificado&method=Crid&id=<?=$r->getid(); ?>"><i class="fas fa-edit"></i>Editar</a>
            </td>
            <td>
                <a href="?controller=certificado&method=Eliminar&id=<?=$r->getid(); ?>"><i class="fas fa-trash"></i>Eliminar</a>
            </td>
        </tr>
        
    <?php 
    
  endforeach;
    
    ?>
    </tbody>
</table> 


     </fieldset>
 

</section>

