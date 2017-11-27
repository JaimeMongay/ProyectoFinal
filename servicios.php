<?php require_once('Connections/conexion.php'); ?>
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
         <h1><b>El Club de Padel Montes de Oca ofrece a sus clientes: </b></h1>
         
         <br>
      </div>
      <div class="col-xs-12 col-sm-3 ">
        <?php include("includes/menuizquierda.php"); ?>
      </div>


      <div class="col-xs-12 col-sm-9">
      <p><b>
        Alquiler de pistas: por horas o por jornadas completas para organizar partidos o torneos organizados.
      </p>
      <br>

      
      <p>Mix-in: juega durante 2 horas todos contra todos. Sets organizados por el club por niveles.
      </p>
      <br>
    
      <p>
      Torneos: participa en los torneos que se disputan en el club. Patrocinados por las mejores empresas de la cuidad y con grandes premios para los participantes.
      </p>

      <p>
      </p>Bar/Cafetería: para tus momentos de relax, toma una pizza, un café, o cualquier refresco antes y después de tus partidos. 
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