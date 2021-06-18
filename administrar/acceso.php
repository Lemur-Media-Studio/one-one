<? 

include("conecta.inc");

if ($_POST) {

	foreach($_POST as $campo => $valor)	{ $cadena = "\$" . $campo . "='" . $valor . "';";   eval($cadena);	}
	
	//errores
	if (strlen($usuario)<1) $error[] = "Falta ingresar el nombre de usuario";
	if (strlen($contrasenia)<5) $error[] = "La constraseña debe ser mayor a 5 caracteres";

	//no hay errores
	if (!$error) {
	
		$sql = " UPDATE $tabla10 SET `usuario` = '$usuario', `contrasenia` = '$contrasenia'";
		$mysql->query($sql);
		
		header("Location:acceso.php");

	}

}

$sec = 20;

include("header.php");

$tituloPagina = "Datos de acceso al sistema de administraci&oacute;n";

if (!$error) {

	$sql = "SELECT * FROM $tabla10" ;
	$resultados = $mysql->query($sql); 
	foreach($resultados as $row);
	
}

?>

<form method="POST" action="">

	<tr>
		<td>
			<table width="100%" height="30"  ellpadding="10" class="texto">
				<tr>
					<td valign="middle" align="right">

					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>
			<table width="100%" cellpadding="10">

				<tr> <td><h2><?=$tituloPagina?></h2> </td> </tr>

				<tr>
					<td>   Usuario
					<input name="usuario" maxlength="20" type="text" class="campo" style="width:100%" value="<?=$_POST['usuario']?><?=$row['usuario']?>"/>	</td>
				</tr>
				
				<tr>
					<td> Contrase&ntilde;a 
					<input name="contrasenia" maxlength="20" type="password" class="campo" style="width:100%" value="<?=$_POST['contrasenia']?><?=$row['contrasenia']?>"/>	</td>
				</tr>

				<tr>
					<td><button type="submit">Cambiar</button>  </td>
				 
				</tr>

    		</table>
		</td>
	</tr>

	<input name="tituloPagina" type="hidden" value="<?=$tituloPagina?>">

</form>
   
<? include("foot.php") ?>