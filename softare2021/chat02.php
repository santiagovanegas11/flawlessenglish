<?php require_once('../Connections/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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

$anno1 = date("Y");
$mess1 = date("m");
$dias1 = date("d");
$horas = date("H");
$minut = date("i");

$hoyes = mktime($horas,$minut,0,$mess1,$dias1,$anno1);


$fecha = date("Y-M-d-H-i", $hoyes);
$preci = $_POST['precio'];
session_start();
$corre = $_SESSION['CORRE'];

mysqli_select_db($conexion,$database_conexion);
$sqa = "INSERT INTO master (campo1, campo4, campo5) values ('$fecha', '$preci', '$corre')";
$ejecuta = mysqli_query($conexion, $sqa);

header("location:../grupo20/chat01.php");?>

