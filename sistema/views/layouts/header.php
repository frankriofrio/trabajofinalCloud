<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actividadlaboratoriog5</title>
    <!-- styles -->
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/bootstrap-4.0.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">    
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta3-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-beta3-web/css/all.css">
  
  
    
  
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-blue">   

    <a href="?controller=index" class="navbar-brand">Desarrollo de Software Cloud - Programación WEB - PHP-BOOTSTRAP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    <?php if(!empty($_SESSION['user'])){ ?>

      <li class="nav-item active">
        <a class="nav-link" href="?controller=index">Home <span class="sr-only">(current)</span></a>
      </li>

    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"
         href="?controller=perfil"
          id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Perfiles
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?controller=perfil">Consultar Perfil</a>
         <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?controller=perfil&method=crud">Nuevo Perfil</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?controller=usuario">Consultar Usuario</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?controller=usuario&method=crud">Nuevo usuario</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"
         href="?controller=perfil"
          id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Certificados
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?controller=certificado">Consultar Certficados</a>
         <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?controller=certificado&method=crid">Nuevo Certificado</a>
        </div>
      </li>



      <li class="nav-item active">
        <a class="nav-link" href="?controller=reporte">Reporte Certificado <span class="sr-only"></span></a>
      </li>

      <?php }?>
    
    </ul>
 
  </div>


    
    
    
    <ul class="navbar-nav ">
  
            <?php if(!empty($_SESSION['user'])): ?>
                <li><a class="nav-link" href="?controller=security&method=logout">Cerrar sesion</a></p></li>
            <?php else: ?>
                <li><a class="nav-link ocultar" href="?controller=index&method=login">Ingresar</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <main class="container">

