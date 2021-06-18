<? 

include("conecta.inc");

if ($_GET['agregar']) {	$accion='agregar'; 	$titulo_pagina = "Agregar una Categor&iacute;a"; }

if ($_GET['eliminar']) {

	$id = $_GET['id'];
	
	$sql = "DELETE FROM $tabla WHERE categoria = '$id' AND tipo = 1";
	$mysql->query($sql); 

	$sql = "DELETE FROM $tabla2 WHERE id_cat = '$id'";
	$mysql->query($sql); 

	header("Location:categorias.php");

}

if ($_GET['editar']) {

	$accion='editar';
	$titulo_pagina = "Modificar Categor&iacute;a ";
	$id = $_GET['id'];
	$sql = "SELECT * FROM $tabla2 WHERE id_cat = '$id' " ;
	$resultados = $mysql->query($sql); 
	foreach($resultados as $row);
	
} 

if ($_POST) {

	if ($_POST) { foreach($_POST as $campo => $valor) { $cadena = "\$" . $campo . "='" . ($valor) . "';";   eval($cadena); } }

	include("funciones.inc");

	if ($accion=='agregar') {

		$sql ="INSERT INTO $tabla2 (`nombre_cat`,`prioridad_cat`) VALUES ('$nombre_cat','$prioridad_cat') ";
		$mysql->query($sql); 

		header("Location:categorias.php");


	} else {

		$sql = " UPDATE $tabla2 SET `nombre_cat`='$nombre_cat', `prioridad_cat`='$prioridad_cat' "; 

		$sql.="  WHERE `id_cat` = '$id' ;" ;
		$mysql->query($sql); 

		header("Location:categorias.php");

	}

}

$sec = 2;

include("header.php");

?>

	<tr>
		<td>
			<table width="100%" cellpadding="10">
				
				<tr>
					<td>

						<a href="alquiler.php.php">Equipos</a> |
						<a href="categorias.php">Categor&iacute;as</a> |
						<span class='seleccionado'>Agregar Categor&iacute;a</span> 

					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>
			<table width="100%" cellpadding="10">

				<tr> <td> <h2><?=$titulo_pagina?></h2> </td> </tr>

<form name="frm" method="post" enctype="multipart/form-data">
				
				<tr>
					<td> Nombre

<input name="nombre_cat" maxlength="120" type="text" value="<? echo $_POST['nombre_cat']; echo  $row['nombre_cat']; ?>"/>
					
					</td>
				</tr>	

				<tr>
					<td> Prioridad

<input name="prioridad_cat" maxlength="10" type="text" value="<? echo $_POST['prioridad_cat']; echo  $row['prioridad_cat']; ?>"/>
					
					</td>
				</tr>	

				<tr>
					<td>
				
						<button type="submit" onClick="javascript:document.frm.submit();">Aceptar</button></form>
						<button type="submit" onClick="javascript:history.back();">Volver</button>

					</td>
				</tr>

    		</table>
		</td>
	</tr>

<? include("foot.php") ?>
