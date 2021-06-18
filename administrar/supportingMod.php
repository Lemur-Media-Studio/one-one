<? 

include("conecta.inc");

if ($_GET['agregar']) {	
	
	$accion='agregar'; 	
	$titulo_pagina = "Agregar una Organizaci&oacute;n "; 
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

	header("Location:supporting.php");

}

if ($_GET['editar']) {

	$accion='editar';
	$titulo_pagina = "Editar una Organizaci&oacute;n";
	$id = $_GET['id'];
	$sql = "SELECT * FROM $tabla WHERE id = '$id' " ;
	$resultados = $mysql->query($sql); 	
	foreach($resultados as $row);

} 

if ($_POST) {

	include("funciones.inc");

	foreach($_POST as $campo => $valor)	{ $cadena = "\$" . $campo . "='" . $valor . "';";   eval($cadena);	}
	
	$data = "userfile1"; if ($_FILES[$data]['name']) { $imagen = "mk_".GeneraPassword(12).".jpg"; include('crearFoto_logo.inc'); } 

	if ($accion=='agregar') {

		$sql = "INSERT INTO $tabla (`tipo`,`imagen`,`prioridad`,`titulo`) VALUES ('2','$imagen','$prioridad','$titulo') ";
		$mysql->query($sql);
		
		if (mysqli_error($mysql)) echo mysqli_error($mysql); else header("Location:supporting.php");


	} else {

		$sql = " UPDATE $tabla SET  `prioridad` = '$prioridad', `titulo` = '$titulo'  ";
		
		if ($_FILES['userfile1']['name']) { $sql.= " ,`imagen` = '$imagen' "; }
		
		$sql.="  WHERE `id` = '$id' ;" ;
		$mysql->query($sql);
		header("Location:supporting.php");

	}

}

$sec = 2;

include("header.php");

?>

<form action="" name="frm" method="post" enctype="multipart/form-data">

	<tr>
		<td>
			<table width="100%" height="30" cellpadding="10" >
				<tr>
					<td>
						<a href="supporting.php">Organizaciiones</a> | <span class='seleccionado'>Agregar Organizaci&oacute;n</span>
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
					<td>  Imagen <br/> <br/>

<? if ($row['imagen']) echo "<br/> <img src='../imagenes/".$row['imagen']."' border='0' ></img><br><br>"; ?>

<input name="userfile1" type="file">  <br/> <br/> * Tama&ntilde;o recomendado: 120 x 90px. de ancho y alto.

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
