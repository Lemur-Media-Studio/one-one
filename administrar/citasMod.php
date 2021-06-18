<? 

include("conecta.inc");

if ($_GET['agregar']) {	
	
	$accion='agregar'; 	
	$titulo_pagina = "Agregar Cita"; 
		
}

if ($_GET['eliminar']) {

	$id = $_GET['id'];
	$archivo = $_GET['archivo'];
	
	$sql="DELETE FROM $tabla WHERE id = '$id'";
	$mysql->query($sql); 

	if ($archivo) {
		$dir = opendir("../imagenes");
		unlink ("../imagenes/".$archivo);
		closedir($dir);
	}

	header("Location:citas.php");

}

if ($_GET['editar']) {

	$accion='editar';
	$titulo_pagina = "Modificar una Cita";
	$id = $_GET['id'];
	$sql = "SELECT * FROM $tabla WHERE id = '$id' " ;
	$resultados = $mysql->query($sql); 
	foreach($resultados as $row);

} 

if ($_POST['envia']) {

	$error = "";
	
	if ($_POST) { foreach($_POST as $campo => $valor) { $cadena = "\$" . $campo . "='" . addslashes($valor) . "';";   eval($cadena); } }

	include("funciones.inc");
	
	if ($accion=='agregar') {

		$sql = 'INSERT INTO '.$tabla.' 
		(`tipo`
		,`texto`
		,`texto_ingles`
		,`imagen`
		,`prioridad`) 
		
		VALUES 
		
		("16"
		,"'.$texto.'"
		,"'.$texto_ingles.'"
		,"'.$imagen.'"
		,"'.$prioridad.'")';

		$mysql->query($sql);
		header("Location:citas.php");

	} else {

		$sql = ' UPDATE '.$tabla.' SET 
		  `titulo` = "'.$titulo.'"
		, `texto` = "'.$texto.'"
		, `texto` = "'.$texto.'"
		, `texto_ingles` = "'.$texto_ingles.'"
		, `prioridad` = "'.$prioridad.'" ';

		$sql.= " WHERE `id` = '$id' ;" ;
		
		$mysql->query($sql);
		
		header("Location:citas.php");

	}
	
} 

$sec = 16;

include("header.php");

?>


	<tr>
		<td>
			<table width="100%" cellpadding="10" >
				<tr>
					<td>
						<a href="citas.php">Citas</a> | <span class='seleccionado link1'>Agregar Cita</span> 
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td>
			<table width="100%" cellpadding="10">

				<tr> <td ><h2><?=$titulo_pagina?></h2> </td> </tr>
			
				<form action="" name="frm" method="post" enctype="multipart/form-data">

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
					<td> Prioridad

<input name="prioridad" maxlength="10" type="text" value="<? echo $_POST['prioridad']; echo  $row['prioridad']; ?>"/>
					
					
					</td>
				</tr>	

				<tr>
					<td>

						<input type="hidden" name="envia" value="1" />
				
						<button type="submit" onClick="javascript:document.frm.submit();">Aceptar</button></form>
						<button type="submit" onClick="javascript:history.back();">Volver</button>
	
					</td>
				</tr>

    		</table>
		</td>
	</tr>
   
<? include("foot.php") ?>
