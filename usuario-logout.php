<?php require_once('Connections/conexion.php'); ?>

<?php

	$_SESSION['MM_Username'] = "";
    $_SESSION['MM_UserGroup'] = "";	 
    $_SESSION['webReservas_UserId'] = "";
    $_SESSION['webReservas_UserId'] = "";
    $_SESSION['webReservas_Nivel'] = "";

    unset($_SESSION ['MM_Username']);
	unset($_SESSION ['MM_UserGroup']);
	unset($_SESSION ['webReservas_UserId']);
	unset($_SESSION ['webReservas_UserId']);
	unset($_SESSION ['webReservas_Nivel']);

	$updateGoTo = "index.php";
	header(sprintf("Location: %s", $updateGoTo));

	//session_destroy($_SESSION['webReservas_Mail']);

?>