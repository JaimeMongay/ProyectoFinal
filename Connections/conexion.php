<?php

//La "p" antes de localhost indica que la conexión es persistente 


if (!isset($_SESSION)) {
  session_start();
}

$hostname_con = "localhost";
$database_con = "reservas";
$username_con = "root";
$password_con = "";
$con = mysqli_connect($hostname_con, $username_con, $password_con, $database_con);
mysqli_set_charset($con, 'utf8');

if (is_file("includes/funciones.php")) 
include("includes/funciones.php"); 
else
{
	include("../includes/funciones.php");
}
?>