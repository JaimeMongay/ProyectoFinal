<?php require_once('Connections/conexion.php'); 
$menuActivo=1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Web de Reservas</title>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/extra.css" rel="stylesheet">
    <?php include("includes/findehead.php"); ?>
  
</head>
  <body>
  
  <?php include("includes/postbody.php"); ?>
  <?php include("includes/slider.php"); ?>

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
         <h1><b>La mejor web de reservas Online</b></h1>
         
         <br>
      </div>
      <div class="col-xs-12 col-sm-3 ">
        <?php include("includes/menuizquierda.php"); ?>
      </div>


      <div class="col-xs-12 col-sm-9">
      <p><b>Creado en el año 2017, somos un club de pádel con unas instalaciones de primer nivel, disponemos de una gran varidad de ppistas que le permite disponer de una gran varidad de horarios sin preocuparse de que no esten disponibles. También disponemos de una zona de bar con terraza para poder relajarte después de tu actividad con tus amigos y familiares.</p>
      <br>

      <p align="center">
              <img align="center" src="images\Lataska.jpg"/>
      </p>
      <br>
      
      <p>De momento 6 pistas de última generación a disposición de nuestros socios y clientes para jugar al pádel en todos los niveles y categorías. Sea cual sea tu nivel, el Club de padel Montes De Oca te organiza partidos adecuados a tus necesidades. Cuenta con una mesa de ping-pong con la que podréisdisfrutar antes o después de jugar tu partido de padel. Tenemos los mejores profesionales que brindan el mejor servicio en todas las actividades que se desarrollan en el centro.
      </p>
      <br>
      <p align="center">
            <img align="center" src="images\m3.jpg"/>
      </p>
      <br>
      <p>
      Anímate a visitarnos, cada vez somos más y juntos podemos llegar a construir el entorno padelistico que a todos nos gusta, ven y disfruta del deporta más a la moda!!
      </p>


      </b> 
      
    
      </div>
    </div>
  </div>

  <?php include("includes/prepie.php"); ?>

  <script src="bootstrap/js/jquery-1.11.2.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <?php include("includes/pie.php"); ?>
  <?php include("includes/modales.php"); ?>


  
  </body>
</html>