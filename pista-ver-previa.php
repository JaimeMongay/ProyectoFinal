<?php require_once('Connections/conexion.php'); ?>
<?php
$query_DatosPistas = "SELECT * FROM pista WHERE Estado=1 AND idPista=".GetSQLValueString($_GET["id"], "int");
$DatosPistas = mysqli_query($con,  $query_DatosPistas) or die(mysqli_error($con));
$row_DatosPistas = mysqli_fetch_assoc($DatosPistas);
$totalRows_DatosPistas = mysqli_num_rows($DatosPistas);

$resultado = ComprobarFechasLibresPista($_GET["id"], $_POST["apptStartTime"], $_POST["apptEndTime"]);

//$resultado2 = ComprobarFechasLibresPista2($_GET["id"], $_POST["apptStartTime"], $_POST["apptEndTime"]);

$horastotales=CalcularHorasDiferencia(DateToQuotedMySQLDate( $_POST["apptStartTime"]), DateToQuotedMySQLDate($_POST["apptEndTime"]));
$horasdereserva = $horastotales/60/60;
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
  <div class="container">
    
  <div class="row">
  
  <div class="col-xs-12 col-sm-3"><?php include("includes/menuizquierda.php"); ?></div>
  <div class="col-xs-12 col-sm-9">
  <h1><?php echo $row_DatosPistas["Nombre"];?></h1>
  <div class="row">
  <div class="col-xs-12">


  HORA INICIO: <?php echo $_POST["apptStartTime"]?><br>
  HORA FIN: <?php echo $_POST["apptEndTime"]?>
  

</div>
  </div>
  <div class="row">
  <div class="col-xs-12">
  <?php if ($resultado==1  && $horasdereserva==1.5) { ?>
  <div class="alert alert-success" role="alert" id="individual2"><span class="glyphicon glyphicon-asterisk" ></span> La Fecha seleccionada esta disponible, confirme para finalizar su reserva.</div>
    
<a href="pista-reserva.php?id=<?php echo GetSQLValueString($_GET["id"], "int")?>&FDesde=<?php echo $_POST["apptStartTime"]?>&FHasta=<?php echo $_POST["apptEndTime"]?>" class="btn btn-success pull-right btn-lg" role="button">Reservar Ahora</a>
  <?php } else {
    ?>
    <div class="alert alert-danger" role="alert" id="individual1"><span class="glyphicon glyphicon-asterisk" ></span> Fechas no disponibles, o rango de horarios distinto a 1h:30min.</div>
     <a href="javascript:window.history.back();" class="btn btn-warning" role="button">Volver Atrás</a>
  <?php } ?>


  </div>
  
  </div>
</div>
  
  
  </div>
  
  
  <?php include("includes/prepie.php"); ?>
  <script src="bootstrap/js/jquery-1.11.2.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <?php include("includes/pie.php"); ?>
  <?php include("includes/modales.php"); ?>
  
  <!-- InstanceEndEditable -->
  </body>
<!-- InstanceEnd --></html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosPistas);

?>