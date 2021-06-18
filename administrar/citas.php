<? 

include("conecta.inc");
include("funciones.inc");

$sql ="SELECT * FROM $tabla WHERE tipo = 16 ORDER BY prioridad DESC ";
$resultados = $mysql->query($sql); 

$sec = 16;

$titulo = "Listado de Citas";
include("header.php") ;

?>

	<tr>
		<td>
			<table width="100%" cellpadding="10">
				<tr>
					<td>
						<span class='seleccionado'>Citas</span> | <a href="citasMod.php?agregar=1" class="link1">Agregar Cita</a> 
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>
			<table width="100%" cellpadding="10">
				
				<tr> <td colspan="3"> <h2><?=$titulo?></h2> </td> </tr>

				<tr>
				
					<td> Texto </td>
					<td> Prioridad </td>
					<td > </td>
					
				</tr>

<? 

foreach($resultados as $row) {

$id = $row['id'];
$texto = $row['texto'];
$prioridad = $row['prioridad'];

?>

				<tr> <td colspan="3"> <hr class="separa"> </td> </tr>

				<tr>
					
					<td> <?=$texto?> </td>
					<td> <?=$prioridad?> </td>
					<td align="right"> 

<a href="citasMod.php?editar=1&id=<?=$id?>" class="link2">Modificar</a><br/> 
<a href="citas.php?eliminar=1&id=<?=$id?>&archivo=<?=$imagen?>" class="link3">Eliminar</a> 

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
	$archivo = $_GET['archivo'];

	echo "<script>";
	echo "if (confirm('Esta seguro de eliminar esta cita?')) document.location='citasMod.php?eliminar=1&id=$id&archivo=$archivo' ";
	echo "</script>";

}

?>