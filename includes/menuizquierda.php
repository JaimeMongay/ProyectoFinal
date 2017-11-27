
<!-- solo quiero que me muestre este panel de la izquierda, cuando el usuario halla accedido al sistema. -->
<?php
if ((isset($_SESSION['webReservas_UserId'])) && ($_SESSION['webReservas_Nivel']=="10")){?>
<ul class="nav nav-pills nav-stacked" id="stacked-menu">
        <li>
          <a class="nav-container" data-toggle="collapse" data-parent="#stacked-menu" href="#p1">Administrador: <?php echo ObtenerNombre($_SESSION['webReservas_UserId']);?><div class="caret-container"><span class="caret arrow"></span></div></a>    
          
          <ul class="nav nav-pills nav-stacked collapse in" id="p1">
            <li data-toggle="collapse" data-parent="#p1" href="#pv1">
              <a class="nav-sub-container">Gestión Pistas<div class="caret-container"><span class="caret arrow"></span></div></a></li>
              <ul class="nav nav-pills nav-stacked collapse" id="pv1">
                <li><a href="pista-alta.php">Añadir pista</a></li>
                <li><a href="pista-listaAdmin.php">Bloquear horario/pista</a></li>
                
        
              </ul>
                        
            <li data-toggle="collapse" data-parent="#p1" href="#pv2">
              <a class="nav-sub-container">Gestion Usuarios<div class="caret-container"><span class="caret arrow"></span></div></a></li>
              <ul class="nav nav-pills nav-stacked collapse" id="pv2">
                 <li><a href="usuario-alta.php">Añadir usuario</a></li>
                <li><a href="usuario-lista.php">Configurar usuario</a></li>
                
              </ul>

            
            
          </ul>
          
        </li>
       
      </ul>
<?php }?>
<br>
<blockquote class="twitter-tweet"><p lang="es" dir="ltr"><a href="https://twitter.com/hashtag/V%C3%8DDEO?src=hash">#VÍDEO</a> Piedras preciosas. Disfruta de los tres mejores puntos del cuadro femenino en el <a href="https://twitter.com/hashtag/WPTBarcelonaMaster?src=hash">#WPTBarcelonaMaster</a> <a href="https://t.co/z3dOyqZ0ad">https://t.co/z3dOyqZ0ad</a></p>&mdash; World Padel Tour (@WorldPadelTour) <a href="https://twitter.com/WorldPadelTour/status/872104553864364032">June 6, 2017</a></blockquote> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>