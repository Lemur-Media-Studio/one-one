<?

include("conecta.inc");
include("funciones.inc");

$sql ="SELECT * FROM $tabla WHERE tipo = 5 ORDER BY prioridad DESC";
$resultados = $mysql->query($sql); 

$sec = 5;

$titulo = "Listado de Socios";
include("header.php") ;

?>

	<tr>
		<td>
			<table width="100%" cellpadding="10" >
				<tr>
					<td valign="middle">
						<span class='seleccionado'>Socios</span> | <a href="sociosMod.php?agregar=1">Agregar Socio</a> 
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>
			<table width="100%" cellpadding="10" >
				
				<tr> <td colspan="4"><h2><?=$titulo?></h2> </td> </tr>

				<tr>
				
					<td valign="middle"> Lugar </td>
					<td valign="middle"> Coordenadas </td>
					<td valign="middle"> Prioridad </td>
					<td > </td>
					
				</tr>

<?

foreach($resultados as $row) {

$id = $row['id'];
$titulo = $row['titulo'];
$longitud = $row['longitud'];
$latitud = $row['latitud'];
$prioridad = $row['prioridad'];

?>

				<tr> <td colspan="4"> <hr class="separa"> </td> </tr>

				<tr>
					
					<td valign="middle" > <?=$titulo?> </td>
					<td valign="middle" >  <?=$latitud?>, <?=$longitud?>  </td>
					<td valign="middle" > <?=$prioridad?> </td>
					<td valign="middle" align="right" > 

<a href="sociosMod.php?editar=1&id=<?=$id?>">Modificar</a><br/>
<a href="socios.php?eliminar=1&id=<?=$id?>&archivo=<?=$imagen?>">Eliminar</a> 

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
	echo "if (confirm('Esta seguro de eliminar este socio?')) document.location='sociosMod.php?eliminar=1&id=$id&archivo=$archivo' ";
	echo "</script>";

}

?>