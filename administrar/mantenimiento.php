<?php

include("conecta.inc");

	$accion='editar'; $titulo = "Editar Im&aacute;genes";
	
if ($_POST) {

	include("funciones.inc");

	foreach($_POST as $campo => $valor)	{ $cadena = "\$" . $campo . "='" . $valor . "';";   eval($cadena);	}
	
	$data = "userfile1";
	if ($_FILES[$data]['name']) { copy($_FILES[$data]['tmp_name'],"../imgs/logo.svg"); } 
	
	$data = "userfile2";
	if ($_FILES[$data]['name']) { copy($_FILES[$data]['tmp_name'],"../imgs/foto_bio.jpg"); } 

	$data = "userfile3";
	if ($_FILES[$data]['name']) { copy($_FILES[$data]['tmp_name'],"../imgs/banner.jpg"); } 
	
	
	header("Location:mantenimiento.php");

}

$sec = 15;

include("header.php");

$aux = rand(1000);

?>

<form action="" name="frm" method="post" enctype="multipart/form-data">


	<tr>
		<td>
			<table width="100%" cellpadding="10">

				<tr>
					<td> <h2><?=$titulo?></h2> </td>
				</tr>

				
				<tr>
					<td> Logo <br /> <br />

<img src='../imgs/logo.svg?v=<?=$aux?>' border='0'  ></img><br><br>

<input name="userfile1" type="file"> * Preferentemente en .svg

					</td>
				</tr>			

				<tr>
					<td> Foto Bio <br /> <br />

<img src='../imgs/foto_bio.jpg?v=<?=$aux?>' border='0'  ></img><br><br>

<input name="userfile2" type="file"> * Tama&ntilde;o recomendado: 300 x 200 px de ancho y alto. 

					</td>
				</tr>			

				<tr>
					<td> Separador <br /> <br />

<img src='../imgs/banner.jpg?v=<?=$aux?>' border='0' width='600' ></img><br><br>

<input name="userfile3" type="file"> * Tama&ntilde;o recomendado: 1200 x 480 px de ancho y alto. 

					</td>
				</tr>			
				
				
				<tr>
					<td><input type="hidden" name="envia" value="1"> <button type="submit">Actualizar</button></form>  </td>
				</tr>


    		</table>
		</td>
	</tr>
   
<? include("foot.php") ?>