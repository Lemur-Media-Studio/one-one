<?

$error = 0;
session_start();
session_destroy();

include("conecta.inc");

$sql = "SELECT * FROM $tabla10";
$resultados = $mysql->query($sql); 
foreach($resultados as $row);

$titulo_admin = $row['titulo'];

if ($_POST) {

	$sql = "SELECT * FROM $tabla10";
	$resultados = $mysql->query($sql); 
	foreach($resultados as $row);

	$usuario = $_POST['usuario'];
	$contrasenia = $_POST['contrasenia'];
	
	$usuario = preg_replace('.<[^>]+>.','',$usuario);
	$contrasenia = preg_replace('.<[^>]+>.','',$contrasenia);
	
	if (($usuario==$row['usuario']) AND ($contrasenia==$row['contrasenia'])) {

		$error = 0;
		session_start();

		$_SESSION['ingreso'] = true;
		$_SESSION['usuario'] = $row['usuario'] ;
		$_SESSION['url'] = $row['url'] ;
	    $_SESSION['nombre'] =  $row['nombre'] ;
		$_SESSION['titulo'] =  $row['titulo'] ;

		header("Location:home.php");

} else $error = 1;

}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<head>
<title><?=$titulo_admin?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0">

<div class="login">
	
	<form method="POST">
	
		<input name="usuario" type="text" maxlength="80" type="text" required placeholder="Usuario" />
	
		<input name="contrasenia" type="password" maxlength="80" type="text" required placeholder="Contrase&ntilde;a:" />

		<button type="submit">Ingresar</button>

<?
	
if ($error) { echo "<br/><br/> La contrase&ntilde;a o nombre de usuario son inv&aacute;lidos. "; }

?>
	
	</form>

</div>

</table>
</body>
</html>