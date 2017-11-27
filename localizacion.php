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
         <h1><b>Club de Padel Montes de Oca Localización: </b></h1>
         
         <br>
      </div>
      <div class="col-xs-12 col-sm-3 ">
        <?php include("includes/menuizquierda.php"); ?>
      </div>


      <div class="col-xs-12 col-sm-9">
     
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3178.1016676760323!2d-5.797045808496678!3d37.19781456092144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd127edf8a58c045%3A0xb5759f0b06501016!2sCalle+Ronda+de+los+Torneros%2C+41710+Utrera%2C+Sevilla!5e0!3m2!1ses!2ses!4v1496940973447" width="800" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

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