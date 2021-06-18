<? 

include("seguridad.inc") ; 
include("conecta.inc");

$sql_admin ="SELECT * FROM $tabla10 ";
$resultados_admin = $mysql->query($sql_admin); 
foreach($resultados_admin as $row_admin);
$titulo_admin = $row_admin['titulo'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<head>
	
	<title><?=$titulo_admin?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
	<link href="style.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width">


</head>

<body leftmargin="0" topmargin="0">

<table width="94%" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<table width="100%" cellpadding="10" align="center" >
				<tr>
					<td  align="left" >
<? 

echo "<h1>OneToOne Backend</h1>";

if ($sec==1) echo "<span class='seleccionado'>Portadas</span> | ";  else echo "<a href='home.php'>Portadas</a> | ";

if ($sec==2) echo "<span class='seleccionado'>Organizaciones</span> | ";  else echo "<a href='supporting.php'>Organizaciones</a> | ";

if ($sec==3) echo "<span class='seleccionado'>Proveedores</span> | ";  else echo "<a href='suppliers.php'>Proveedores</a> | ";

if ($sec==4) echo "<span class='seleccionado'>Compradores</span> | ";  else echo "<a href='buyers.php'>Compradores</a> | ";

if ($sec==5) echo "<span class='seleccionado'>Socios</span> | ";  else echo "<a href='socios.php'>Socios</a> | ";

if ($sec==14) echo "<span class='seleccionado'>Textos</span> | ";  else echo "<a href='textos.php'>Textos</a> | ";

if ($sec==16) echo "<span class='seleccionado'>Citas</span> | ";  else echo "<a href='citas.php'>Citas</a> | ";

if ($sec==15) echo "<span class='seleccionado'>Mantenimiento</span> | ";  else echo "<a href='mantenimiento.php'>Mantenimiento</a> | ";

if ($sec==20) echo "<span class='seleccionado'>Acceso</span> | ";  else echo "<a href='acceso.php'>Acceso</a> | ";
										
echo "<a href='".$_SESSION['url']."' target='_blank'>Web</a> |	<a href='index.php'>Salir</a>";
					
					
?>
					</td>

				</tr>

			</table>
		</td>
	</tr>

