<!--Snippet de conexón -->
<?php require_once('Connections/conexion.php'); ?>

<!-- Codigo de álta uevo usuario -->
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// si el mm_insert esta seteado ,tiene alguna valor y tiene el valor alta usuario entonces si que me vas hacer el insert directamente.
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "altaUsuario")) {

  if (UsuarioUnico($_POST["email"])){

  // Salto de encritación para hacer la clave BLOWFISH
  $salt = '$2y$07$KsjhvH69zP1r7t06pzXph/';

  $insertSQL = sprintf("INSERT INTO usuario(Nombre, Email, Password, FchAlta) VALUES (%s, %s, %s, NOW() )",
                      GetSQLValueString($_POST["nombre"], "text"),
                      GetSQLValueString($_POST["email"], "text"),
                      GetSQLValueString(crypt($_POST["password"], $salt), "text"));
                        // función que quita lo malo  perjudicial inyecciones sql y similares
                    
  // Realiza la inserción.
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));


  $insertGoTo = "usuario-alta-ok.php";
  // Arrastra todos los parametros en caso que los tuviera.
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  }
  else
  {
      $insertGoTo = "error-email.php";
      header(sprintf("Location: %s", $insertGoTo));
  }

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
  <!-- InstanceBeginEditable name="Contenido" -->
   <?php include("includes/postbody.php"); ?>


  <div class="container">
    <div class="row">
      

      <div class="col-xs-12 col-sm-3 "><?php include("includes/menuizquierda.php"); ?></div>
      <div class="col-xs-12 col-sm-9 ">
       <h1>Alta de Usuario</h1>
      
      <form class="form-horizontal" id ="altaUsuario" name ="altaUsuario" action="usuario-alta.php" method="post" onSubmit="javascript:return validaralta();">
      <!--javascript:return  si es false no ara el action y si es true si que lo hara, por eso tenemos que ponerle el retorno del valor-->

        <div class="form-group">
          <label for="nombre" class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
            </div>
          <div class="alert alert-danger oculto" role="alert" name="aviso1" id="aviso1"><span class="glyphicon glyphicon-remove" ></span> Necesitamos saber tu nombre</div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
          <div class="alert alert-danger oculto" role="alert" id="aviso2"><span class="glyphicon glyphicon-remove" ></span> Necesitamos saber tu email</div>
        </div>
 
      
        <div class="form-group">
          <label for="email2" class="col-sm-2 control-label">Repetir Email</label>
            <div class="col-sm-4">
               <input type="email" class="form-control" id="email2" name="email2"placeholder="Repetir Email">
            </div>
          <div class="alert alert-danger oculto" role="alert" id="aviso3"><span class="glyphicon glyphicon-remove" ></span> Necesitamos que repitas tu email</div>
        </div>
        <div class="alert alert-danger oculto" role="alert" id="aviso4"><span class="glyphicon glyphicon-remove" ></span> No coinciden los emails</div>

        <div class="form-group">
          <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
          <div class="alert alert-danger oculto" role="alert" id="aviso5"><span class="glyphicon glyphicon-remove" ></span> Necesitamos que escribas una contraseña</div>
        </div>


        <div class="form-group">
          <label for="password2" class="col-sm-2 control-label">Repetir Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" id="password2" name="password2" placeholder="Repetir Password">
            </div>
          <div class="alert alert-danger oculto" role="alert" id="aviso6"><span class="glyphicon glyphicon-remove" ></span> Necesitamos que repitas tu contraseña</div>
        </div>
        <div class="alert alert-danger oculto" role="alert" id="aviso7"><span class="glyphicon glyphicon-remove" ></span> No coinciden las contraseñas</div>

    
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <label>
            <input type="checkbox" name="intAcepto"> Acepto las <a href="#"  data-toggle="modal" data-target="#privacidad">condiciones de uso.
            </a>
          </label>
          </div>
        </div>
        <div class="alert alert-danger oculto" role="alert" id="aviso10"><span class="glyphicon glyphicon-remove" ></span> Necesitamos que acepte las condiciones de uso</div>
 
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Registrarme</button>
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
  <?php include("includes/scripts.php"); ?>
  
  </body>
</html>