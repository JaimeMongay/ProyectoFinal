<?php require_once('Connections/conexion.php'); 

$pistaid = $_GET["id"];
echo $pistaid;

$SQL = sprintf("UPDATE pista SET Estado=0 WHERE idPista=%s",
				GetSQLValueString($_GET["id"], "int"));

 
  $Result1 = mysqli_query($con,  $SQL) or die(mysqli_error($con));



header("Location: pista-listaAdmin.php");
?>