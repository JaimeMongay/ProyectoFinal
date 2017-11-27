<?php require_once('Connections/conexion.php');
//RestringirAcceso("1, 10"); ?>
<?php


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "altapista")) {


  $insertSQL = sprintf("INSERT INTO pista(Nombre, Estado, fchAlta) VALUES (%s, %s, NOW())",
                      
                       GetSQLValueString($_POST["Nombre"], "text"),
                       GetSQLValueString($_POST["Estado"], "int"));

  
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));

  $insertGoTo = "pista-alta-ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}


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
      <div class="col-xs-12">
         <br>
      </div>
      <div class="col-xs-12 col-sm-3 ">
      <?php include("includes/menuizquierda.php"); ?>
      </div>

    <div class="col-xs-12 col-sm-9">
  <h1>Alta de Pista</h1>
  <form action="pista-alta.php" name="altapista" class="form-horizontal" id="altapista" method="post" onSubmit="javascript:return validaraltapista();">
  <div class="form-group">                                                                                        <!--Comprobar este validar pista -->
    <label for="Nombre" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-4">
      <input name="Nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre">
    </div>
    
  </div>
  <div class="alert alert-danger oculto" role="alert" id="avisopista1"><span class="glyphicon glyphicon-remove" ></span> Introduce el nombre de la pista.</div>
    <div class="form-group">
    <label for="Estado" class="col-sm-2 control-label">Estado</label>
    <div class="col-sm-4">
        <select name="Estado" id="Estado" class="form-control">
          <option value="1">Activa</option>
          <option value="0">No Activa</option>
        </select>
    </div>
    </div>
 
  <!--
    <div class="form-group">
    <label for="dblPrecio" class="col-sm-2 control-label">Precio/hora</label>
    <div class="col-sm-4">
      <input name="dblPrecio" type="text" class="form-control" id="dblPrecio" placeholder="Precio">
    </div>
  </div>
  <div class="alert alert-danger oculto" role="alert" id="avisohotel11"><span class="glyphicon glyphicon-remove" ></span> Introduce el precio por día de tu propiedad.</div>
  -->

    
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Dar de alta la Pista</button>
    </div>
  </div>
  <input type="hidden" class="form-control" id="MM_insert" name="MM_insert" value="altapista">
    <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="<?php echo $_SESSION['webReservas_UserId']; ?>">
</form>
  </div>
</div>
  
  
  </div>
  <?php include("includes/prepie.php"); ?>
  <script src="bootstrap/js/jquery-1.11.2.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <?php include("includes/pie.php"); ?>
  <?php include("includes/modales.php"); ?>
  <?php include("includes/scripts.php"); ?>
  
  
  </body>
</html>
