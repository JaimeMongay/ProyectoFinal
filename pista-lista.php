<?php require_once('Connections/conexion.php'); 
RestringirAcceso("1,10");
$menuActivo=2;
?>

<?php

$query_DatosConsulta = sprintf("SELECT * FROM pista WHERE Estado=1");
$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);

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
         <br>
      </div>
      <div class="col-xs-12 col-sm-3 ">
      <?php include("includes/menuizquierda.php"); ?>
      </div>

    <div class="col-xs-12 col-sm-9">
      <div class="row">
        
      </div>
      <h1>Lista de pistas</h1>
      <div class="row">

      <?php 
      //AQUI ES DONDE SE SACAN LOS DATOS, SE COMPRUEBA QUE HAY RESULTADOS
      if ($totalRows_DatosConsulta > 0) {  
        ?>
        <?php
        do { ?>
        <div class="col-xs-12 col-sm-4">
        <div class="panel panel-default">
        <div class="panel-heading">
        <?php
          if ($row_DatosConsulta["Estado"]==1){?>
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        <?php }
        else
        {?>
        <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>

        <?php }?>        
      <?php echo $row_DatosConsulta["Nombre"]; ?></div>
            <div class="panel-body"><!--<img src="images/fotopista.jpg"> -->    
           <!-- <?php// echo $row_DatosConsulta["fchAlta"];
      //ObtenerFavorita($row_DatosHoteles["idHotel"]);
      ?>  -->
      </div>
      <div class="panel-footer">
<a href="pista-ver.php?id=<?php echo $row_DatosConsulta["idPista"];?>" class="btn btn-primary  btn-xs" role="button">Reservar</a>
</div>
</div>
</div>
<?php
                   } while ($row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta)); 
?>
<?php

     } 
    else
     { //MOSTRAR SI NO HAY RESULTADOS ?>
                No hay resultados.
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

</body>

</html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosConsulta);
?>

