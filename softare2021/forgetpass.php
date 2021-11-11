<?php require_once('../Connections/conexion.php'); ?>
<?php
$corre = $_POST['correo'];
$contr = $_POST['contra'];
mysql_select_db($database_conexion, $conexion);
$query_Recordset3 = "SELECT * FROM clientes WHERE email = '$usuar' and contrasena = ‘$contr’";
$Recordset3 = mysql_query($query_Recordset3, $conexion) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
if ($totalRows_Recordset3 > 0)
header("location:../menu.html");
}
else
{
header("location:../login.html ");
}
?>
