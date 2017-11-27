<?php require_once('Connections/conexion.php');
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
  <!-- InstanceBeginEditable name="Contenido" -->
  <?php include("includes/postbody.php"); ?>
  

  <div class="container">
    <div class="row">
      
        

      <div class="col-xs-12 col-sm-3 "><?php include("includes/menuizquierda.php"); ?> </div>
      <div class="col-xs-12 col-sm-9 "> <h1>Alta de pista realizado correctamente</h1>
      <div class="alert alert-success" role="alert">Tu alta se realizo correctamente</div></div>
    </div>
  </div>

  <?php include("includes/prepie.php"); ?>

  <script src="bootstrap/js/jquery-1.11.2.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <?php include("includes/pie.php"); ?>
  <?php include("includes/modales.php"); ?>
 <!-- Modal -->

  
  </body>
</html>