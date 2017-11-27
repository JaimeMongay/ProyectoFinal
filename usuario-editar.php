<?php require_once('Connections/conexion.php');

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
//echo "antes";
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "altaUsuario")) {

 

// Salto de encritación para hacer la clave BLOWFISH
  $salt = '$2y$07$KsjhvH69zP1r7t06pzXph/';

$updateSQL = sprintf("UPDATE usuario SET Nombre=%s, Email=%s, Password=%s, Nivel=%s WHERE idUsuario=%s",
                      GetSQLValueString($_POST["nombre"], "text"),
                      GetSQLValueString($_POST["email"], "text"),
                      GetSQLValueString(crypt($_POST["password"], $salt), "text"),
                      GetSQLValueString($_POST["nivel"], "int"),
                      GetSQLValueString($_GET["id"], "int"));

//echo $updateSQL;
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
echo $updateSQL;

  $insertGoTo = "usuario-lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));


}


$query_datosUsuario = sprintf("SELECT * FROM usuario WHERE idUsuario=".GetSQLValueString($_GET["id"], "int"));
$DatosUsuario = mysqli_query($con,  $query_datosUsuario) or die(mysqli_error($con));
$row_DatosUsuario = mysqli_fetch_assoc($DatosUsuario);
$totalRows_DatosUsuario = mysqli_num_rows($DatosUsuario);

//echo $query_datosUsuario;


?>



<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Web de Reservas</title>
    <!-- InstanceEndEditable -->
  <!-- Bootstrap -->
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
  <h1>Modificación de Usuario </h1>

 <form action="usuario-editar.php?id=<?php echo $_GET["id"]; ?>" name="altaUsuario" class="form-horizontal" id="altaUsuario" method="post" onSubmit="javascript:return validaralta2();">



        <div class="form-group">
          <label for="nombre" class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row_DatosUsuario["Nombre"];?>">
            </div>
          <div class="alert alert-danger oculto" role="alert" name="aviso1" id="aviso1"><span class="glyphicon glyphicon-remove" ></span> Necesitamos saber un nombre</div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row_DatosUsuario["Email"];?>">
            </div>
          <div class="alert alert-danger oculto" role="alert" id="aviso2"><span class="glyphicon glyphicon-remove" ></span> Necesitamos saber un email</div>
        </div>
 
      
        <div class="form-group">
          <label for="email2" class="col-sm-2 control-label">Repetir Email</label>
            <div class="col-sm-4">
               <input type="email" class="form-control" id="email2" name="email2"placeholder="Repetir Email" value="<?php echo $row_DatosUsuario["Email"];?>">
            </div>
          <div class="alert alert-danger oculto" role="alert" id="aviso3"><span class="glyphicon glyphicon-remove" ></span> Necesitamos que repitas tu email</div>
        </div>
        <div class="alert alert-danger oculto" role="alert" id="aviso4"><span class="glyphicon glyphicon-remove" ></span> No coinciden los emails</div>

        <div class="form-group">
          <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $row_DatosUsuario["Password"];?>">
            </div>
          <div class="alert alert-danger oculto" role="alert" id="aviso5"><span class="glyphicon glyphicon-remove" ></span> Necesitamos que escribas una contraseña</div>
        </div>


        <div class="form-group">
          <label for="password2" class="col-sm-2 control-label">Repetir Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" id="password2" name="password2" placeholder="Repetir Password" value="<?php echo $row_DatosUsuario["Password"];?>">
            </div>
          <div class="alert alert-danger oculto" role="alert" id="aviso6"><span class="glyphicon glyphicon-remove" ></span> Necesitamos que repitas tu contraseña</div>
        </div>
        <div class="alert alert-danger oculto" role="alert" id="aviso7"><span class="glyphicon glyphicon-remove" ></span> No coinciden las contraseñas</div>

      <div class="form-group">
    <label for="Nivel" class="col-sm-2 control-label">Nivel</label>
    <div class="col-sm-4">
        <select name="nivel" id="nivel" class="form-control">
          <option value="1">Usuario</option>
          <option value="10">Administrador</option>
        </select>
    </div>
    </div>
     
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="javascript:window.history.back();" class="btn btn-warning" role="button">Volver Atrás</a>
      
      
          </div>
        </div>

  <!-- Comprobar si realmente hemos hecho click en el boton de registrarme -->
  <input type="hidden" class="form-control" id="MM_insert" name="MM_insert" value="altaUsuario">

</form>
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
mysqli_free_result($DatosUsuario);
?>