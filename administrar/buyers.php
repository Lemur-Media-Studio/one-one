<? 

include("conecta.inc");
include("funciones.inc");

$sql ="SELECT * FROM $tabla WHERE tipo = 4 ORDER BY prioridad DESC ";
$resultados = $mysql->query($sql); 

$titulo_page = "Listado de Compradores";

$sec = 4;

include("header.php") ;

?>

	<tr>
		<td>
			<table width="100%" height="30" cellpadding="10">
				<tr>
					<td>
						<span class='seleccionado'>Compradores</span> | <a href="buyersMod.php?agregar=1" class="link1">Agregar Comprador</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>
			<table width="100%" cellpadding="10">
				
				<tr> <td colspan="4"> <h2><?=$titulo_page?></h2> </td> </tr>

				<tr>
					<td> Imagen </td>
					<td> T&iacute;tulo </td>
					<td> Prioridad </td>
					<td> </td>
				</tr>

<? 

foreach($resultados as $row) {

$id = $row['id'];
$imagen = $row['imagen'];
$titulo = $row['titulo'];
$prioridad = $row['prioridad'];

?>
				<tr> <td colspan="4"> <hr class="separa"> </td> </tr>

				<tr>
					<td> <span class="imagen"> <img src="../imagenes/<?=$imagen?>" border="0" ></img> </span> </td>

					<td> <?=$titulo?> </td>
					<td> <?=$prioridad?> </td>

					<td align="right"> 

<a href="buyersMod.php?editar=1&id=<?=$id?>" class="link2">Modificar</a><br/>
<a href="buyers.php?eliminar=1&id=<?=$id?>&archivo=<?=$imagen?>" class="link3">Eliminar</a> 

					</td>
				</tr>

<? } ?>

     		</table>
		</td>
	</tr>
  
<? 

include("foot.php");

if (isset($_GET['eliminar'])) {

	$id = $_GET['id'];
	$archivo = $_GET['archivo'];

	echo "<script>";
	echo "if (confirm('Esta seguro de eliminar este comprador?')) document.location='buyersMod.php?eliminar=1&id=$id&archivo=$archivo' ";
	echo "</script>";

}

?>