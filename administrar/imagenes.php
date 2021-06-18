<? 

include("conecta.inc");
include("funciones.inc");

//por defecto
$order = "prioridad";
$order2 = "DESC";

$id = $_GET['id'];
$titulo_item = $_GET['titulo'];

if ($_POST) { foreach($_POST as $campo => $valor)	{ $cadena = "\$" . $campo . "='" . $valor . "';";   eval($cadena);	} }

$sql = "SELECT * FROM $tabla WHERE item = ".$id." ORDER BY prioridad DESC";
$resultados = $mysql->query($sql); 

$titulo_muestra = " Im&aacute;genes para ".$titulo_item;
include("header.php") ;

?>

	<tr>
		<td>
			<table width="100%" cellpadding="10">
				<tr>
					<td>

						<span class='seleccionado'>Im&aacute;genes</span> |
						<a href="imagenesMod.php?agregar=1&id=<?=$id?>&titulo=<?=$titulo_item?>"  class="link1">Agregar Imagen</a> 

					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>
			<table width="100%" cellpadding="10">
				
				<tr> <td colspan="3"> <h2><?=$titulo_muestra?></h2> </td> </tr>

				<tr>
					<td> Imagen	</td>
					<td> Prioridad	</td>
					<td> </td>
				</tr>

<? 

foreach($resultados as $row) {

$id_imagen = $row['id'];
$imagen = $row['imagen'];
$prioridad = $row['prioridad'];

?>

				<tr> <td colspan="3"> <hr class="separa"> </td> </tr>

				<tr>

					<td> <? if ($imagen) echo '<span class="imagen"><img src="../imagenes/'.$imagen.'" /></span>'; ?> </td>
					<td> <?=$prioridad?> </td>
		
					<td align="right"> 

<a href="imagenesMod.php?editar=1&id_imagen=<?=$id_imagen?>&titulo=<?=$titulo_item?>&id=<?=$id?>" class="link2">Modificar</a> <br />
<a href="imagenes.php?eliminar=1&id_imagen=<?=$id_imagen?>&archivo=<?=$imagen?>&titulo=<?=$titulo_item?>&id=<?=$id?>" class="link3">Eliminar</a> 

					</td>

				</tr>

<? } ?>


     		</table>
		</td>
	</tr>
  
<? 

include("foot.php");


if ($_GET['eliminar']) {

	$id = $_GET['id'];
	$id_imagen = $_GET['id_imagen'];
	$archivo = $_GET['archivo'];
	$titulo = $_GET['titulo'];

	echo "<script>";
	echo "if (confirm('Esta seguro de eliminar esta imagen?')) document.location='imagenesMod.php?eliminar=1&id=$id&archivo=$archivo&titulo=$titulo&id_imagen=$id_imagen' ";
	echo "</script>";

}

?>