<? 

include("conecta.inc");
include("funciones.inc");

$sql = "SELECT * FROM $tabla WHERE tipo = 14";
$resultados = $mysql->query($sql); 

$titulo_page = "Textos";

$sec = 14;

include("header.php") ;

?>

	<tr>
		<td>
			<table width="100%" height="30">
				<tr> <td> </td> </tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>
			<table width="100%" cellpadding="10" align="center">
				
				<tr> <td colspan="3"> <h2><?=$titulo_page?></h2> </td> </tr>

				<tr>
					<td> Secci&oacute;n	</td>
					<td> Texto	</td>
					<td> </td>
				</tr>

<? 


foreach($resultados as $row) {

$id = $row['id'];
$texto = $row['texto']; $texto = cortar($texto,170); $texto = strip_tags($texto);
$titulo = $row['seccion'];

?>
				<tr> <td colspan="3"> <hr class="separa"> </td> </tr>

				<tr>
					<td> <?=$titulo?> </td>
					<td> <?=$texto?> </td>
	
					<td align="right">  <a href="textosMod.php?editar=1&id=<?=$id?>">Modificar</a> </td>

				</tr>

<? } ?>


     		</table>
		</td>
	</tr>
  
<? 

include("foot.php");

?>