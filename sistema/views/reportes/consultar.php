<section class="panel">
    <h1>MODULO REPORTES </h1>
    
    <fieldset class="scheduler-border">
    
    <p></p>

<form action="?controller=reporte&method=consultar" method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Ingrese el codigo a verificar</label>
    <input type="text" class="form-control" id="id" name="id" placeholder="Codigo" >
  </div>

<div class="well well-sm text-center">
    <input class="btn btn-primary" icon='' type="submit" name="test" id="test" value="Consultar"> 
    <a class="btn btn-primary" href="?controller=reporte">
    <span> <i class="fas fa-plus"></i> </span>Limpiar</a>
</div>
</form>



<table class="table table-striped" id="tabla_estilizada">
    <thead >
        <tr>
            <th >ID</th>
            <th>Nombre Usuario</th> 
            <th>Email</th> 
            <th>Codigo</th> 
            <th>Fecha</th> 
            <th>Nombre Curso</th>             
        </tr>
    </thead>
    <tbody>
    <?php 
    

      foreach($this->certificados as $key ): 
      ?>
        <tr>
            <td><?php echo $key['0']; ?></td>
            <td><?php echo $key['1']; ?></td>
            <td><?php echo $key['2']; ?></td>
            <td><?php echo $key['3']; ?></td>
            <td><?php echo $key['4']; ?></td>
            <td><?php echo $key['5']; ?></td>           
        </tr>
    <?php 
    
  endforeach;
    
    ?>
    </tbody>
</table> 


     </fieldset>
 

</section>

