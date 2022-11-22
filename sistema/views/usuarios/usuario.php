<section class="panel">
    <h1>MODULO USUARIOS </h1>
    
    <fieldset class="scheduler-border">
    
    <p></p>


<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?controller=usuario&method=Crud">
 <span>
  <i class="fas fa-plus"></i>
</span>Nuevo usuario</a>
</div>



<table class="table table-striped" id="tabla_estilizada">
    <thead >
        <tr>
            <th >ID</th>
            <th>Nombre</th> 
            <th>Fecha Nacimiento</th> 
            <th>Perfil</th> 
            <th>Email</th> 
            <th>Login</th> 
            <th>Estado Usuario</th>          
            <th colspan="2" >Acciones</th>         
        </tr>
    </thead>
    <tbody>
    <?php 
    
      foreach($this->usuariomodel->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->getIdUsuario(); ?></td>
            <td><?php echo $r->getNombreUsuario(); ?></td>
            <td><?php echo $r->getFechaNacimientoUsuario(); ?></td>
            <td><?php echo $r->getPerfilBase()->getNombrePerfil(); ?></td>
            <td><?php echo $r->getEmailUsuario(); ?></td>
            <td><?php echo $r->getLoginUsuario(); ?></td>           
            <td><?php echo $r->getEstadoUsuario()=='A'?'ACTIVO':'INACTIVO'; ?></td>
            <td>
            <a href="?controller=usuario&method=crud&id=<?=$r->getIdUsuario(); ?>"><i class="fas fa-edit"></i>Editar</a>
            </td>
            <td>
                <a href="?controller=usuario&method=Eliminar&id=<?=$r->getIdUsuario(); ?>"><i class="fas fa-trash"></i>Eliminar</a>
            </td>
        </tr>
    <?php 
    
  endforeach;
    
    ?>
    </tbody>
</table> 


     </fieldset>
 

</section>

