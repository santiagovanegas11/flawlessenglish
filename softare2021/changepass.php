<?php require_once('../Connections/conexion.php'); ?>
<?php

$passw = $_POST[‘anter’];
$cont1 = $_POST[‘contra1’];
$cont2 = $_POST[‘contra2’];
If ($cont1 == $cont2)
{
mysql_select_db($database_conexion, $conexion);
$query_Recordset3 = "SELECT * FROM usuarios WHERE contrasena = ‘$anter’";
$Recordset3 = mysql_query($query_Recordset3, $conexion) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
if ($totalRows_Recordset3 > 0)
{
$sqa = "UPDATE usuario SET contrasena = '$cont1'";
$ejecuta = mysqli_query($conexion, $sqa);
header("location:../exito.html");
}
else
{
echo '<script language="javascript">alert("ERROR EN EL CAMBIO DE CONTRASEÑA");</script>';
header("location:../menu.html ");
}
}
else
{
echo '<script language="javascript">alert("CONTRASEÑAS NO SON IGUALES");</script>';
header("location:../menu.html");
}
?>