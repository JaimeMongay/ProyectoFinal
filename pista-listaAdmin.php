<?php require_once('Connections/conexion.php'); 
//RestringirAcceso("10");
?>

<?php

$query_DatosConsulta = sprintf("SELECT * FROM pista");
$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);

//FINAL DE LA PARTE SUPERIOR
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
            <div class="panel-body">    
            <?php echo $row_DatosConsulta["fchAlta"];
      //ObtenerFavorita($row_DatosHoteles["idHotel"]);
      ?>  
      </div>
      <div class="panel-footer">
<a href="pista-fechas.php?id=<?php echo $row_DatosConsulta["idPista"];?>" class="btn btn-primary  btn-xs" role="button">Editar</a>
<a href="pista-activar.php?id=<?php echo $row_DatosConsulta["idPista"];?>" class="btn btn-success  btn-xs" role="button">Activar</a>
<a href="pista-eliminar.php?id=<?php echo $row_DatosConsulta["idPista"];?>" class="btn btn-danger  btn-xs" role="button">Eliminar</a>

<!--<button id="myModal" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm">Eliminar</button>-->

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

<form id="form1" name="form1" method="post" action="eliminar_modal.php?id=<?php echo $row_DatosConsulta["idPista"];?>">
<div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">asd
  <div class="modal-dialog modal-sm" role="document">

    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="modalTitle" class="modal-title">Eliminar Pista</h4>
      </div>
      <div id="modalBody" class="modal-body">
         <form id="createAppointmentForm" class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="inputPatient">¿Desea Eliminar esta pista?</label>
            </div>
       </form>
        <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="submitButton">Confirmar</button>
         
    </div>
      </div>
    </div>
  </div>
</div>
</form>


<?php include("includes/prepie.php"); ?>
<script src="bootstrap/js/jquery-1.11.2.min.js"></script> 
<script src="bootstrap/js/bootstrap.min.js"></script>
<?php include("includes/pie.php"); ?>
<?php include("includes/modales.php"); ?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->
</html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosConsulta);
?>

