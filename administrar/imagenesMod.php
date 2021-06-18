<? 

include("conecta.inc");

$id = $_GET['id'];
$id_imagen = $_GET['id_imagen'];
$titulo_item = $_GET['titulo'];

if ($_GET['agregar']) {	$accion='agregar'; 	$titulo_pagina = "Agregar una imagen para $titulo_item";	}

if ($_GET['eliminar']) {

	$sql = "DELETE FROM $tabla WHERE id = '$id_imagen'";
	$mysql->query($sql); 

	if ($archivo) {
		$dir = opendir("../imagenes");
		unlink ("../imagenes/".$archivo);
		closedir($dir);
	}
	
	header("Location:imagenes.php?id=$id&titulo=$titulo_item");

}

if ($_GET['editar']) {

	$accion='editar';
	$titulo_pagina = "Editar una imagen para $titulo_item";
	$sql = "SELECT * FROM $tabla WHERE id = '$id_imagen' " ;
	$resultados = $mysql->query($sql); 
	foreach($resultados as $row);
	$tipo = $row['tipo'];
	
} 

if ($_POST) {

	include("funciones.inc");

	foreach($_POST as $campo => $valor)	{ $cadena = "\$" . $campo . "='" . $valor . "';";   eval($cadena);	}

	$data = "userfile1"; 
	if ($_FILES[$data]['name']) { $imagen = "triquell_".GeneraPassword(12).".jpg"; include('crearFoto_slide.inc'); } 

	if (!$error) {

	if ($accion=='agregar') {

		$sql = "INSERT INTO $tabla (`item`,`prioridad`,`imagen`) VALUES ('$id','$prioridad','$imagen') ";
		$mysql->query($sql);

		header("Location:imagenes.php?id=$id&titulo=$titulo_item");


	} else {

		$sql = " UPDATE $tabla SET  `prioridad`='$prioridad' ";

		if ($_FILES["userfile1"]['name']) { $sql.= " ,`imagen` = '$imagen' ";	}

		$sql.="  WHERE `id` = '$id_imagen' ;" ;
		
		$mysql->query($sql);

		header("Location:imagenes.php?id=$id&titulo=$titulo_item");
	
	}

	}

}

include("header.php");

?>

<form action="" name="frm" method="post" enctype="multipart/form-data">

	<tr>
		<td>
			<table width="100%" cellpadding="10">
				<tr>
					<td>

						<a href="imagenes.php?id=<?=$id?>&titulo=<?=$titulo_item?>" >Im&aacute;genes</a> |
						<span class='seleccionado link1'>Agregar Imagen</span> 

					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>
			<table width="100%" cellpadding="10">

				<tr> <td> <h2><?=$titulo_pagina?></h2> </td> </tr>

				<tr>
					<td> Imagen <br /><br />
<?

if ($row['imagen']) echo "<br/><br/> <img src='../imagenes/".$row['imagen']."' border='0' width='600' ></img> <br/> <br/>";

?>

<input name="userfile1" type="file"> <br /> <br /> * Tama&ntilde;o recomendado: 1000 px de ancho.

					</td>
				</tr>
				
				<tr>
					<td>  Prioridad

<input name="prioridad" maxlength="10" type="text" value="<? echo $_POST['prioridad']; echo  $row['prioridad']; ?>"/>
El sistema ordena los resultados en la web seg&uacute;n la importancia de cada imagen, corresponde a mayor n&uacute;mero, mayor importancia. 	

					
					</td>
				</tr>	

				<tr>
					<td>
					
					<button type="submit" onClick="javascript:document.frm.submit();">Aceptar</button> </form>
					<button type="submit" onClick="javascript:history.back();">Volver</button>

				 </td>
				</tr>

    		</table>
		</td>
	</tr>

<? 

include("foot.php");

?>