
<div class="container">
<div class="row">
  <div class="col-xs-12 col-sm-6"><p  href="index.php"><img src="images/logo16.png"></p></div>
  <div class="col-xs-12 col-sm-6"><p align="center"><img src="images/DUCK2.jpg"></p></div>
</div>

<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles tamaño (xs) (hamburguesa-->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li <?php if((isset($menuActivo)) && ($menuActivo==1)){?>class="active"<?php }?>><a href="index.php">Inicio</a></li>
      <li <?php if((isset($menuActivo)) && ($menuActivo==2)){?>class="active"<?php }?>><a href="pista-lista.php">Reservar</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Conócenos <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="servicios.php">Servicios</a></li>
          <li><a href="localizacion.php">Localización</a></li>
          <li class="divider"></li>
          <li><a href="campus.php">Campus Verano</a></li>
          
        </ul>
      </li>
    </ul>
      
    <ul class="nav navbar-nav navbar-right">
      <?php if ((isset($_SESSION['webReservas_UserId'])) && ($_SESSION['webReservas_UserId']!=="")){?>
            <li><a><b><?php echo obtenerNombre($_SESSION['webReservas_UserId']);?></b></a></li>
            <li><a href="usuario-logout.php">Salir</a></li>
      <?php } 
        else {
      ?>
    </ul>
     <ul class="nav navbar-nav">
       <li><a href="#"  data-toggle="modal" data-target="#myModal">Acceder</a></li>
      <li><a href="usuario-alta.php">Registrarme</a></li>
      <?php } ?>
    </ul>
 
    
 
    
  </div>
</nav>
</div>
