<?php require_once('Connections/conexion.php'); 
RestringirAcceso("1, 10");

$resultado=ComprobarFechasLibresPista($_GET["id"], $_GET["FDesde"], $_GET["FHasta"]);


//EVITAMOS QUE EL USUARIO INTENTE CONTRATAR ALGO QUE YA ESTÁ RESERVADO
if ($resultado!="1") header("Location: error-acceso.php");


$insertSQL = sprintf("INSERT INTO reserva (idPista, idUsuario, fchInicio, fchFin, Motivo, Estado, fchReserva) VALUES (%s,%s,%s, %s,'Reserva de Usuario', 0, NOW())",
    GetSQLValueString($_GET["id"], "int"),
    GetSQLValueString($_SESSION['webReservas_UserId'], "int"),
    GetSQLValueString(DateToQuotedMySQLDate($_GET["FDesde"]).":00", "date"),
    GetSQLValueString(DateToQuotedMySQLDate($_GET["FHasta"]).":00", "date"));

 
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));
$id_reserva = mysqli_insert_id($con);
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
      
        

      <div class="col-xs-12 col-sm-3 "><?php include("includes/menuizquierda.php"); ?></div>
      <div class="col-xs-12 col-sm-9 "> <h1>Gracias por reservar con nosotros </h1>
      <div class="alert alert-success" role="alert">Reserva realizada con exito</div></div>
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