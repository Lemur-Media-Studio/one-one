<?
	
include("conecta.inc");

if ($_GET['agregar']) {	
	
	$accion='agregar'; 	
	$titulo_pagina = "Agregar una Socio "; 
		
}

if ($_GET['eliminar']) {

	$id = $_GET['id'];
	$archivo = $_GET['archivo'];
	
	$sql = "DELETE FROM $tabla WHERE id = '$id'";
	$mysql->query($sql); 

	if ($archivo) {
		$dir = opendir("../imagenes");
		unlink ("../imagenes/".$archivo);
		closedir($dir);
	}

	header("Location:socios.php");

}

if ($_GET['editar']) {

	$accion='editar';
	$titulo_pagina = "Modificar un Socio ";
	$id = $_GET['id'];
	$sql = "SELECT * FROM $tabla WHERE id = '$id' " ;
	$resultados = $mysql->query($sql); 	
	foreach($resultados as $row);

} 

if ($_POST['envia']) {

	$error = "";
	
	if ($_POST) {	foreach($_POST as $campo => $valor)	{ $cadena = "\$" . $campo . "='" . $valor . "';";   eval($cadena);	} }

	include("funciones.inc");
	
	if ($accion=='agregar') {

		$sql = 'INSERT INTO '.$tabla.' 
		(`tipo`
		,`titulo`
		,`titulo_ingles`
		,`longitud`
		,`latitud`
		,`prioridad`) 
		
		VALUES 
		
		("5"
		,"'.$titulo.'"
		,"'.$titulo_ingles.'"
		,"'.$longitud.'"
		,"'.$latitud.'"
		,"'.$prioridad.'")';

		$mysql->query($sql);
		header("Location:socios.php");

	} else {

		$sql = ' UPDATE '.$tabla.' SET 
		  `titulo` = "'.$titulo.'"
		, `titulo_ingles` = "'.$titulo_ingles.'"
		, `texto` = "'.$texto.'"
		, `longitud` = "'.$longitud.'"
		, `latitud` = "'.$latitud.'"
		,`prioridad` = "'.$prioridad.'" ';

		$sql.= " WHERE `id` = '$id' ;" ;
	
		$mysql->query($sql);
		header("Location:socios.php");

	}
	
} 

$sec = 5;

include("header.php");

?>

	<tr>
		<td>
			<table width="100%" cellpadding="10" >
				<tr>
					<td valign="middle">
						<a href="socios.php">Socios</a> | <span class='seleccionado'>Agregar Socio</span> 
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
					<td valign="middle" > Ciudad

<input name="titulo" maxlength="120" type="text" value="<?php echo $_POST['titulo']; echo  $row['titulo']; ?>"/>
										
					</td>
				</tr>	

				<tr>
					<td valign="middle" > Ciudad en Ingles

<input name="titulo_ingles" maxlength="120" type="text" value="<?php echo $_POST['titulo_ingles']; echo  $row['titulo_ingles']; ?>"/>
										
					</td>
				</tr>	

				<tr>
					<td valign="middle" > Latitud

<input name="latitud" maxlength="120" type="text" value="<?php echo $_POST['latitud']; echo  $row['latitud']; ?>"/>
										
					</td>
				</tr>	


				<tr>
					<td valign="middle" > Longitud

<input name="longitud" maxlength="120" type="text" value="<?php echo $_POST['longitud']; echo  $row['longitud']; ?>"/>
										
					</td>
				</tr>	


				<tr>
					<td valign="middle" > Prioridad

<input name="prioridad" maxlength="10" type="text" value="<?php echo $_POST['prioridad']; echo  $row['prioridad']; ?>"/>
					
					
					</td>
				</tr>	

				<tr>
					<td valign="middle" >

					<input type="hidden" name="envia" value="1" />
			
					<button type="submit" onClick="javascript:document.frm.submit();">Aceptar</button></form>
					<button type="submit" onClick="javascript:history.back();">Volver</button>
					<br /><br />

				 </td>
				</tr>


    		</table>
		</td>
	</tr>


   
<?php include("foot.php") ?>
