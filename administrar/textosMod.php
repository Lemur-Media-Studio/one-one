<? 

include("conecta.inc");
include("funciones.inc");

if ($_GET['editar']) {

	$accion='editar';
	$titulo_pagina = "Editar Texto";
	$id = $_GET['id'];
	$sql = "SELECT * FROM $tabla WHERE id = '$id' " ;
	$resultados = $mysql->query($sql); 
	foreach($resultados as $row);

} 

if ($_POST) {

	if ($_POST) { foreach($_POST as $campo => $valor) { $cadena = "\$" . $campo . "='" . addslashes($valor) . "';";   eval($cadena); } }
	
	$sql = ' UPDATE '.$tabla.' SET 
	`texto` = "'.$texto.'"
	, `texto_ingles` = "'.$texto_ingles.'"
	, `titulo` = "'.$titulo.'"
	, `titulo_ingles` = "'.$titulo_ingles.'" WHERE id = '.$id.' ';
	
	$mysql->query($sql);

	header("Location:textos.php");

}

$sec = 14;

include("header.php");

?>

<form action="" name="frm" method="post" enctype="multipart/form-data">


	<tr>
		<td>
			<table width="100%" height="30" cellpadding="10">
				<tr>
					<td>
						<a href="textos.php">Textos</a> | <span class='seleccionado'>Modificar Texto</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>

			<table width="100%" cellpadding="10">

				<tr> <td> <h2><?=$titulo_pagina?></h2> </td> </tr>

				<tr> <td> Secci&oacute;n: <? echo $row['seccion']; ?> </td> </tr>	

				<tr>
					<td> T&iacute;tulo

<input name="titulo" maxlength="120" type="text" value="<? echo $_POST['titulo']; echo  $row['titulo']; ?>"/>
										
					</td>
				</tr>	

				<tr>
					<td> T&iacute;tulo en Ingles

<input name="titulo_ingles" maxlength="120" type="text" value="<? echo $_POST['titulo_ingles']; echo  $row['titulo_ingles']; ?>"/>
										
					</td>
				</tr>	

				<tr>
					<td> Texto

<textarea  name="texto" rows="6" ><?=$_POST['texto']?><?=$row['texto']?></textarea>		
		
					</td>
				</tr>	

				<tr>
					<td> Texto en Ingles

<textarea  name="texto_ingles" rows="6" ><?=$_POST['texto_ingles']?><?=$row['texto_ingles']?></textarea>		
		
					</td>
				</tr>	



				<tr>
					<td>

						<input name="frm" value="frm" type="hidden">
	
						<button type="submit" onClick="javascript:document.frm.submit();">Aceptar</button></form>
						<button type="submit" onClick="javascript:history.back();">Volver</button>

					</td>
				</tr>

    		</table>
		</td>
	</tr>
  
<? include("foot.php") ?>

