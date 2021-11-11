<?php require_once('../Connections/conexion.php'); ?>
<?php
$nombr = strtoupper($_POST['nombre']);
$corre = $_POST['correo'];
$fenac = $_POST['nacimi'];
$clave = $_POST['contra'];
$gener = $_POST['genero'];
mysqli_select_db($conexion,$database_conexion);
$sqa = "INSERT INTO clientes (nombre, correo, fechanac,clave, genero)
values ('$nombr','$corre', '$fenac', '$clave', '$gener')";
$ejecuta = mysqli_query($conexion, $sqa);
header('location:../login.html');
?>
