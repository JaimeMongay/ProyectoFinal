<?php require_once('../Connections/conexion.php'); ?>
<?php

//ISERTA ANULACIÓN y RESERVA
if ($_POST["accion"]==1)
	{

		//INSERTO FINALMENTE LA FECHA Y DEVUELVO UN "1"
		$query_Insert = sprintf("INSERT INTO reserva (idPista, idUsuario, fchInicio, fchFin, Motivo, Estado, fchReserva) VALUES (%s, %s, %s, %s, %s , 0, NOW())",
			GetSQLValueString($_POST["idPista"], "int"),
			GetSQLValueString($_SESSION['webReservas_UserId'], "int"),
			GetSQLValueString(date('Y-m-d H:i:s', $_POST["fchFechaInicio"]-7200), "date"),
			GetSQLValueString(date('Y-m-d H:i:s', $_POST["fchFechaFin"]-7200), "date"),
			GetSQLValueString($_POST["Motivo"], "text"));
							   
		$Result1 = mysqli_query($con, $query_Insert) or die(mysqli_error());


		  echo "1";
		}

//ELIMINA ANULACIÓN y RESERVA
if ($_POST["accion"]==2)
	{
$query_Delete = sprintf("DELETE FROM reserva WHERE idReserva=%s",
                       GetSQLValueString($_POST["idReserva"], "int"));
					   
$Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());
  echo "1";
}



?>