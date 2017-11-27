
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  global $con;
  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($con, $theValue) : mysqli_escape_string($con,$theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}







//Función que muestra el nombre del usuario de sessión iniciada.
function obtenerNombre($id)
{
  global $con;
  
  $query_ConsultaFuncion = sprintf("SELECT Nombre FROM usuario WHERE idUsuario=%s",GetSQLValueString($id, "int"));

  //echo $query_ConsultaFuncion;
  $ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
  $row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
  $totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
  

  return $row_ConsultaFuncion["Nombre"];
  mysqli_free_result($ConsultaFuncion);
}

//Autorieza el acceso a ciertas paginas del sistema
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  
  $isValid = False; 

 
  if (!empty($UserName)) { 
     
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
   
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}


function RestringirAcceso($LISTADENIVELES)
{
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = $LISTADENIVELES;
$MM_donotCheckaccess = "false";

$MM_restrictGoTo = "error-acceso.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
}

// CALCULAR DATOS PISTAS //
function ObtenerNombrePista($id)
{
  global $con;
  
  $query_ConsultaFuncion = sprintf("SELECT Nombre FROM pista WHERE idPista=%s",GetSQLValueString($id, "int"));
  //echo $query_ConsultaFuncion;
  $ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
  $row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
  $totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
  
  return $row_ConsultaFuncion["Nombre"];
  mysqli_free_result($ConsultaFuncion);
}


//Obtiene los horarios de las pistas reservadas y anuladas
function CalcularHorasPistaReservadas($pista)
{
  global $con;
  
  $query_ConsultaFuncion = sprintf("SELECT * FROM reserva WHERE idPista=%s",GetSQLValueString($pista, "int"));
  //echo $query_ConsultaFuncion;
  $ConsultaFuncion = mysqli_query($con, $query_ConsultaFuncion) or die(mysqli_error($con));
  $row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
  $totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
  
  if ($totalRows_ConsultaFuncion>0){
     do { 
     ?>
         {
          id: <?php echo $row_ConsultaFuncion["idReserva"]; ?>,
          title: '<?php echo $row_ConsultaFuncion["Motivo"]; ?>',
          start: '<?php echo $row_ConsultaFuncion["fchInicio"]; ?>',
          end: '<?php echo $row_ConsultaFuncion["fchFin"]; ?>'
        },

         <?php
     } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
  }

  mysqli_free_result($ConsultaFuncion);
}


//COMPRUEBA LAS FECHAS AL HACER UNA RESERVA
function ComprobarFechasLibresPista($idpista, $desde, $hasta)
{
  global $con;
  
    
  $query_ConsultaFuncion = "SELECT * FROM pista WHERE Estado=1 AND idPista=".$idpista." AND idPista NOT IN (SELECT DISTINCT (reserva.idPista) FROM reserva WHERE (reserva.fchInicio BETWEEN  ".GetSQLValueString(DateToQuotedMySQLDate($desde), "date")." AND ".GetSQLValueString(DateToQuotedMySQLDate($hasta), "date").") OR (reserva.fchFin BETWEEN  ".GetSQLValueString(DateToQuotedMySQLDate($desde), "date")." AND ".GetSQLValueString(DateToQuotedMySQLDate($hasta), "date").")) ";

  $ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
  $row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
  $totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
  
  if ($totalRows_ConsultaFuncion==1){
    
    return 1;
  }
  else
  {
    return 0;
  }
  mysqli_free_result($ConsultaFuncion);
}

//function ComprobarFechasLibresPista2($idpista, $desde, $hasta)
//{
 // global $con;
  
  
 // $query_ConsultaFuncion = "SELECT * FROM pista WHERE Estado=1 AND idPista=".$idpista." AND idPista NOT IN (SELECT DISTINCT (reservapista.idPista) FROM reservapista WHERE (reservapista.fchInicio BETWEEN  ".GetSQLValueString(DateToQuotedMySQLDate($desde), "date")." AND ".GetSQLValueString(DateToQuotedMySQLDate($hasta), "date").") OR (reservapista.fchFin BETWEEN  ".GetSQLValueString(DateToQuotedMySQLDate($desde), "date")." AND ".GetSQLValueString(DateToQuotedMySQLDate($hasta), "date").")) ";
  
//  $ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
//  $row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
//  $totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
  
//  if ($totalRows_ConsultaFuncion==1){
    
//    return 1;
//  }
//  else
//  {
//    return 0;
//  }
//  mysqli_free_result($ConsultaFuncion);
//}


//DIFERENCIA DE HORAS PARA CONTROLAR EL MAXIMO DE RESERVA
function CalcularHorasDiferencia($desde, $hasta)
{
  $tiempo1=strtotime($desde);
  $tiempo2=strtotime($hasta);
  return $tiempo2-$tiempo1;
}

// FECHAS POR PARTE
function DateToQuotedMySQLDate($Fecha) 
{ 
$Parte1 = substr($Fecha, 0, 10);
$Parte2 = substr($Fecha, 10, 18);

if ($Parte1<>""){ 
   $trozos=explode("/",$Parte1,3); 
   return $trozos[2]."-".$trozos[1]."-".$trozos[0].$Parte2; } 
else 
   {return "NULL";} 
} 

//USUARIO UNICO, SI EL EMAIL AL REGISTRARSE ESTA YA REGISTRADO
function UsuarioUnico($email)
{
  global $con;
  
  $query_ConsultaFuncion = sprintf("SELECT * FROM usuario WHERE Email=%s",
    GetSQLValueString($email, "text"));
  //echo $query_ConsultaFuncion;
  
  $ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
  $row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
  $totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
  
  if ($totalRows_ConsultaFuncion==1) return false; else return true;
  mysqli_free_result($ConsultaFuncion);
}


//CADENA ALEATORIA PARA GENERAR NUEVA CONTRASEÑA
function recordarPass(){
    $length = 6;
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $caracteresLength = strlen($caracteres);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $caracteres[rand(0, $caracteresLength - 1)];
    }
    return $randomString; 
}

?>