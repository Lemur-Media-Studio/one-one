<? 

include("conecta.inc");

if ($_GET['agregar']) {	
	
	$accion='agregar'; 	
	$titulo_pagina = "Agregar un Comprador "; 
}

if ($_GET['eliminar']) {

	$id = $_GET['id'];
	$archivo = $_GET['archivo'];
	
	$sql="DELETE FROM $tabla WHERE id = '$id'";
	$mysql->query($sql); 
	
	//elimino los archivos
	if ($archivo) {
		$dir = opendir("../imagenes");
		unlink ("../imagenes/$archivo");
		closedir($dir);
	}

	header("Location:buyers.php");

}

if ($_GET['editar']) {

	$accion='editar';
	$titulo_pagina = "Editar un Comprador";
	$id = $_GET['id'];
	$sql = "SELECT * FROM $tabla WHERE id = '$id' " ;
	$resultados = $mysql->query($sql); 	
	foreach($resultados as $row);

} 

if ($_POST) {

	include("funciones.inc");

	foreach($_POST as $campo => $valor)	{ $cadena = "\$" . $campo . "='" . $valor . "';";   eval($cadena);	}
	
	$data = "userfile1"; if ($_FILES[$data]['name']) { $imagen = "think_".GeneraPassword(12).".jpg"; include('crearFoto.inc'); } 

	if ($accion=='agregar') {

		$sql = 'INSERT INTO '.$tabla.' 
		(`tipo`
		,`titulo`
		,`texto`
		,`titulo_ingles`
		,`texto_ingles`
		,`imagen`
		,`prioridad`) 
		
		VALUES 
		
		("4"
		,"'.$titulo.'"
		,"'.$texto.'"
		,"'.$titulo_ingles.'"
		,"'.$texto_ingles.'"
		,"'.$imagen.'"
		,"'.$prioridad.'")';

		$mysql->query($sql);
		header("Location:buyers.php");

	} else {

		$sql = ' UPDATE '.$tabla.' SET 
		  `titulo` = "'.$titulo.'"
		, `texto` = "'.$texto.'"
		, `titulo_ingles` = "'.$titulo_ingles.'"
		, `texto` = "'.$texto.'"
		, `texto_ingles` = "'.$texto_ingles.'"
		, `prioridad` = "'.$prioridad.'" ';

		if ($_FILES['userfile1']['name']) { $sql.= " ,`imagen` = '$imagen' "; }

		$sql.= " WHERE `id` = '$id' ;" ;
		
		$mysql->query($sql);
		
		header("Location:buyers.php");

	}

}

$sec = 4;

include("header.php");

?>

<form action="" name="frm" method="post" enctype="multipart/form-data">

	<tr>
		<td>
			<table width="100%" height="30" cellpadding="10" >
				<tr>
					<td>
						<a href="buyers.php">Compradores</a> | <span class='seleccionado'>Agregar Comprador</span>
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
					<td>  Imagen <br/> <br/>

<? if ($row['imagen']) echo "<br/> <img src='../imagenes/".$row['imagen']."' border='0' width='600'></img><br><br>"; ?>

<input name="userfile1" type="file">  <br/> <br/> * Tama&ntilde;o recomendado: 800 px de alto.

					</td>
				</tr>

				<tr>
					<td> Prioridad

<input name="prioridad" maxlength="10" type="text" value="<? echo $_POST['prioridad']; echo  $row['prioridad']; ?>"/>
El sistema ordena los resultados en la web seg&uacute;n la importancia de cada imagen, corresponde a mayor n&uacute;mero, mayor importancia. 	
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
