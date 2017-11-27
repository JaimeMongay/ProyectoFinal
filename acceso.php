<?php require_once('Connections/conexion.php'); ?>
<?php
//Conexión de acceso de un usuario

//Inicia sessión si no se ha iniciado.
if ((isset($_SESSION['webReservas_UserId'])) && ($_SESSION['webReservas_UserId']!="")) {
    setcookie("reserva", $_SESSION['webReservas_Mail'], time()+30);
    $t = time();
    setcookie("tiemposession", $t, time()+30);
    ComprobarSesion();
}

function ComprobarSesion(){
$seg=60;
$usu= $_COOKIE["reserva"];

if (($_COOKIE['tiemposession'] + $seg) < time()){

          header('Location://localhost/reservasweb/usuario-logout.php');
            }else{
            $t = time();
        setcookie("tiemposession", $t, time()+36);
     
}
  session_name($_SESSION['webReservas_Mail']);
  session_start();
//echo $usu;

}
  


//Se utiliza en caso que vinieran parametros a la que no tenemos permiso.
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}


function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array(); 
    return $datarow[$field]; 
}


if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];

  //ATENCIÓN USAMOS BLOWFISH para guardar la contraseña.
  $password=crypt($_POST['password'], '$2y$07$KsjhvH69zP1r7t06pzXph/');
  $MM_fldUserAuthorization = "Nivel";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = false;
  
  	
  $LoginRS__query=sprintf("SELECT idUsuario, email, password, Nivel FROM usuario WHERE email=%s AND password=%s AND Estado=1",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($con,  $LoginRS__query) or die(mysqli_error(con));
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysqli_result($LoginRS,0,'Nivel');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	 
    $_SESSION['webReservas_UserId'] = mysqli_result($LoginRS,0,'idUsuario');
    $_SESSION['webReservas_Mail'] = mysqli_result($LoginRS,0,'email');
    $_SESSION['webReservas_Nivel'] = mysqli_result($LoginRS,0,'Nivel');
	//ContabilizarAcceso($_SESSION['webReservas_UserId']);
	
	/* DESCOMENTAR SOLO SI SE USA EL CHECK DE RECORDAR CONTRASEÑA, HABRÁ QUE USAR LA FUNCIÓN generar_cookie()
	if ((isset($_POST["CAMPORECUERDA"])) && ($_POST["CAMPORECUERDA"]=="1"))
	generar_cookie($_SESSION['webReservas_UserId']);
	*/	     

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>