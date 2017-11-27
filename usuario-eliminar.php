<?php require_once('Connections/conexion.php'); 

$usuarioid = $_GET["id"];
//echo $pistaid;

$SQL = sprintf("UPDATE usuario SET Estado=0 WHERE idUsuario=%s",
				GetSQLValueString($_GET["id"], "int"));

 
  $Result1 = mysqli_query($con,  $SQL) or die(mysqli_error($con));



header("Location: usuario-lista.php");
?>