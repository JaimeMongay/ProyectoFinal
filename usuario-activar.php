<?php require_once('Connections/conexion.php'); 

$pistaid = $_GET["id"];
echo $pistaid;

$SQL = sprintf("UPDATE usuario SET Estado=1 WHERE idUsuario=%s",
				GetSQLValueString($_GET["id"], "int"));

 
  $Result1 = mysqli_query($con,  $SQL) or die(mysqli_error($con));



header("Location: usuario-lista.php");
?>