<? 

include("conecta.inc");
include("funciones.inc");

$sec = 2;

include("header.php") ;

$sql = "SELECT * FROM $tabla2 ORDER BY prioridad_cat DESC ";
$resultados = $mysql->query($sql); 

$titulo = "Listado de Categor&iacute;as";

?>

	<tr>
		<td>
			<table width="100%" cellpadding="10">
				<tr>
					<td>

						<a href="alquiler.php">Equipos</a> |
						<span class='seleccionado'>Categor&iacute;as</span> |
						<a href="categoriasMod.php?agregar=1" class="link1">Agregar Categor&iacute;a</a> 

					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>
			<table width="100%" cellpadding="10" >
				
				<tr> <td colspan="4"> <h2><?=$titulo?></h2> </td> </tr>

				<tr>

					<td> Nombre	</td>
					<td> Equipos </td>
					<td> Prioridad </td>
					<td> </td>
					
				</tr>

<? 

foreach($resultados as $row) {

$id = $row['id_cat'];
$nombre = $row['nombre_cat'];
$prioridad = $row['prioridad_cat'];

$sql3 = "SELECT id FROM $tabla WHERE categoria = $id";
$resultados3 = $mysql->query($sql3); 
$productos = $resultados3->num_rows;

?>

				<tr> <td colspan="4"> <hr class="separa"> </td> </tr>

				<tr>

					<td> <?=$nombre?></td>
					<td> <?=$productos?></td>
					<td> <?=$prioridad?></td>
			
					<td align="right"> 

	<a href="categoriasMod.php?editar=1&id=<?=$id?>" class="link2" >Modificar</a> <br> <a href="categorias.php?eliminar=1&id=<?=$id?>" class="link3">Eliminar</a> 
			
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
	echo "<script>";
	echo "if (confirm('Esta seguro de eliminar esta categoria?')) document.location='categoriasMod.php?eliminar=1&id=$id' ";
	echo "</script>";

}

?>