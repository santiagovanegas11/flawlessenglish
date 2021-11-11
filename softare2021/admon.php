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
mysqli_select_db($conexion,$database_conexion);
$query_Recordset2 = "SELECT tiempo1, tiempo2, tiempo3, tiempo4, tiempo5, tiempo6, tiempo7, correo, numpre FROM tiempo";
$Recordset2 = mysqli_query($conexion, $query_Recordset2) or die(mysql_error());
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<!doctype html>
<html lang="es">
<html class="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inicio</title>
<script type="text/javascript">
</script>
</head>
<body bgcolor="#CCCCCC" >
<header>
<div align="center">
<h3>ADMINISTRADOR</h3>
</header>
<section id = "seccion">
<hr/>
<form action="tiempo.php" method="post" name="formal">
<div align="center">
<table border="5" bgcolor="#FFFFFF">
<tr>
 <td><label>TIEMPO DEL CHAT<input type="number" value="<?php echo $row_Recordset2['tiempo2']; ?>" min="1" max="10" name="tiempo2" id="tem2"
step="1" /></label></td>
 </tr>
<tr>
<td><a href="listauser.php" target="_blank">LISTA DE USUARIOS</a></td>
<td></td>
</tr>
</table>
<hr/>
<input type="image" src="../imagenes/enviar.PNG" name="sub" />
</form>
<hr/>
<a href="../super/menu01.php" ><img src="../imagenes/cencelar.PNG"></a>
<hr/>
<a href="fillpregun.html"><input type="button" value="LLENAR PREGUNTAS" name="boton1" /></a>
<hr/>
<a href="fillitems.php"><input type="button" value="LLENAR AGRO/TAREAS/EJERCICIOS/NECESIDADES/MERCADO" name="boton1" /></a>
</div>
<hr/>
</section>
</body>
</html>