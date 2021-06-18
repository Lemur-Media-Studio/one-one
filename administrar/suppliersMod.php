<? 

include("conecta.inc");

if ($_GET['agregar']) {	
	
	$accion='agregar'; 	
	$titulo_pagina = "Agregar Proveedor"; 
		
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

	header("Location:suppliers.php");

}

if ($_GET['editar']) {

	$accion='editar';
	$titulo_pagina = "Modificar un Proveedor";
	$id = $_GET['id'];
	$sql = "SELECT * FROM $tabla WHERE id = '$id' " ;
	$resultados = $mysql->query($sql); 
	foreach($resultados as $row);

} 

if ($_POST['envia']) {

	$error = "";
	
	if ($_POST) { foreach($_POST as $campo => $valor) { $cadena = "\$" . $campo . "='" . addslashes($valor) . "';";   eval($cadena); } }

	include("funciones.inc");
	
	$data = "userfile1"; if ($_FILES[$data]['name']) { $imagen = "mk_".GeneraPassword(12).".jpg"; include("crearFoto_suppliers.inc"); } 

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
		
		("3"
		,"'.$titulo.'"
		,"'.$texto.'"
		,"'.$titulo_ingles.'"
		,"'.$texto_ingles.'"
		,"'.$imagen.'"
		,"'.$prioridad.'")';

		$mysql->query($sql);
		header("Location:suppliers.php");

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
		
		header("Location:suppliers.php");

	}
	
} 

$sec = 3;

include("header.php");

?>


	<tr>
		<td>
			<table width="100%" cellpadding="10" >
				<tr>
					<td>
						<a href="suppliers.php">Proveedores</a> | <span class='seleccionado link1'>Agregar Proveedor</span> 
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
					<td>  Imagen  

<? if ($row['imagen']) echo " <br/> <br/> <img src='../imagenes/".$row['imagen']."' width='600' border='0'></img> <br> <br> "; ?>

<input name="userfile1" type="file"> * Tama&ntilde;o recomendado: 1200 x 800 px de ancho y alto. 

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
