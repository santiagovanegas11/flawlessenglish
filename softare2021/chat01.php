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

$mt = 1;

$hoyes = mktime($horas,$minut,0,$mess1,$dias1,$anno1);

session_start();
if (isset($_SESSION['TELEF'])) {} else {$_SESSION['TELEF'] = "3";}
if (isset($_SESSION['DIREC'])) {} else {$_SESSION['DIREC'] = "";}
if (isset($_SESSION['PRECI'])) {} else {$_SESSION['PRECI'] = "$";}

mysqli_select_db($conexion,$database_conexion);

$query_Recordset2 = "SELECT campo1, campo4, campo5 FROM master";
$Recordset2 = mysqli_query($conexion, $query_Recordset2) or die(mysql_error());
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

?>

<!doctype html>
<!--menu desplegable-->
<head>
<link type="text/css" rel="stylesheet" href="css/stylesheet.css">
<link type="text/css" rel="stylesheet" href="css/fontello.css">

<title>FLAWLESS ENGLISH</title>
</head>
<header>
<body bgcolor ="#58D3F7" text="000000"><img src="flawless.jpg">
<nav>
<ul>
    <li><a href="home.html"><span class="primero"><i class="icon-home"></i></span>HOME</a></li>
<li><a href="login.html"><span class="segundo"><i class="icon-login"></i></span>LOGIN</a>
<ul>
<li><a href="forgetpass.html">Did you forget your password?</a></li>
<li><a href="changepass.html">Change password</a></li>
</ul>
</li>
<li><a href="signup.html"><span class="tercero"><i class="icon-sign"></i></span>SIGN UP</a></li>
</ul>
</nav>
</header>
<hr color="blue">
</body>
<!--fin del menu desplegable-->
<html lang="es">
<html class="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Inicio</title>
<script language="javascript">
	var falmin = 0;
	var falseg = 0;
	var minutos = 0;
	var segundos = 0;
	function actReloj(mt) 
	{ 
		segundos = segundos + 1;
		if (segundos == 60) {
			segundos = 0;
			minutos = minutos + 1
		}

		falseg = 60 - segundos
		if (segundos == 0) {
			falmin = mt - minutos;
			falseg = 0;
		} else {
			falmin = mt - minutos - 1;
		}

		reloj=""+minutos+" minutos y "+segundos+" segundos"; 
		falta = ""+falmin+" minutos y "+falseg+" segundos";
		document.form1.reloj.value = reloj; 
		document.form1.minuto.value = falta; 
		if (minutos == mt) {
			document.form1.submit();
		}
		var funcion = "actReloj("+mt+")";
		setTimeout(funcion,1000); 
	} 

</script>

</head>
<body bgcolor="" onLoad="actReloj(<?php echo $mt; ?>)">
<header>
<div align="center">
<h2>FLAWLESS ENGLISH CHAT ONLINE</h2>
</header>
<section id = "seccion">
<article>
 </div>
 <form action="chat02.php" method="post" name="form1">
<?php echo date("Y-M-d----H-i", $hoyes); ?>
<div align="center"><table border="12" bordercolor="#000000" width="1000">
<tr><td><p><h4><mark>Tiempo transcurrido
<input disabled type="text" name="reloj" size="25">(tiempo m??ximo de <?php echo $mt; ?> minutos)..............Tiempo restante<input disabled type="text" name="minuto" size="25"></mark></h4></p>
</td></tr>   
    <tr>
    <td>
    <select name="lamast" id="zona" size = "22"  > <option selected disabled></option>
<option>Bienvenidos al chat de flawless english, aqu?? puedes aprender y charlar junto a otros usarios y as?? aclarar tus dudas. Sino es suficiente para ti, puedes ir a nuestro chat en Messenger.</option>
<?php do { 
$puesto = strpos($row_Recordset2['campo5'],"@");
$identi = substr($row_Recordset2['campo5'],0,$puesto);

?>
<option selected value="<?php echo $row_Recordset2['autonume']; ?>"> <?php echo $identi.'-'.$row_Recordset2['campo1'].'-'.$row_Recordset2['campo4']; ?>" </option>

<?php
} while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
?>
</select>
    </td>
    </tr>
    <tr>
    <td><label><input required name="precio" type="text"  id="cod3" maxlength="153" size="153" /></label></td>
    </tr>
</table>    
<input type="image" src="../imagenes/enviar.PNG" name="sub" />
</form>

<a href="../grupo20/menu.html" ><img src="../imagenes/menu.PNG"></a>
</article>
</section>
</body>
</html>
<?php
mysqli_free_result($Recordset2);
?>

