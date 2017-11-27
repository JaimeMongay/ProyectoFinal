<?php require_once('Connections/conexion.php'); ?>

<!-- Codigo de álta uevo usuario -->
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// si el mm_insert esta seteado ,tiene alguna valor y tiene el valor alta usuario entonces si que me vas hacer el insert directamente.
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "contraseña")) {

$email = $_POST["email"];
//echo $email;

$passNew = recordarPass();
//echo $passNew;

$email_admin_web = "jaimeju10@gmail.com";
$email_usuario_web = $_POST["email"];
$subject = "PADEL OCA NUEVA CONTRASEÑA";
$message ="Estimado usuario, se ha generado una nueva contraseña para acceder al sistema de reservas de nuestra web.\n\n NUEVA CONTRASEÑA: " .$passNew;
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=UTF-8";
$headers[] = "From: {$email_admin_web}";
$headers[] = "Reply-To: {$email_admin_web}";
$subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
mail($email_usuario_web,$subject,$message,implode("\r\n",$headers));

// Salto de encritación para hacer la clave BLOWFISH
  $salt = '$2y$07$KsjhvH69zP1r7t06pzXph/'; 


 $updateSQL = sprintf("UPDATE usuario SET Password=%s WHERE Email=%s",
                     GetSQLValueString(crypt($passNew, $salt), "text"),
                     GetSQLValueString($_POST["email"], "text"));
                        // función que quita lo malo  perjudicial inyecciones sql y similares
                    
  // Realiza la actualización.
  $Result1 = mysqli_query($con,  $updateSQL) or die(mysqli_error($con));


  $insertGoTo = "recordar-pass-ok.php";
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
      

      <div class="col-xs-12 col-sm-3 "><?php include("includes/menuizquierda.php"); ?></div>
      <div class="col-xs-12 col-sm-9 ">
      
      
       <h1>Recordar Contraseña</h1>
      <div class="alert alert-info" role="alert">Escriba una dirección de correo y le mandaremos la nueva contraseña.</div>
      <form class="form-horizontal" id ="contraseña" name ="contraseña" action="recordar-pass.php" method="post" >
      <!--onSubmit="javascript:return validarpass();"    javascript:return  si es false no ara el action y si es true si que lo hara, por eso tenemos que ponerle el retorno del valor-->

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
          <div class="alert alert-danger oculto" role="alert" id="aviso2"><span class="glyphicon glyphicon-remove" ></span> Necesitamos saber tu email</div>
        </div>
   
 
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Recordar</button>
          </div>
        </div>

  <!-- Comprobar si realmente hemos hecho click en el boton de registrarme -->
  <input type="hidden" class="form-control" id="MM_insert" name="MM_insert" value="contraseña">

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