<?
	//paginacion
	
	$numero = (($pagina*$numreg)-$numreg)+1;
	$resultados3 = $mysql->query($consulta);
	$total = $resultados3->num_rows;
	
	$numpags = ceil($total/$numreg);
	$limitinf = ($pagina-1)*$numreg;
	
	//cambia la direccion del orden para la consulta
	if ($_GET[cambmodo]) { 
		if ($modo==desc) $modo='asc'; else  $modo='desc';
	}
	
	if ($numpags==0) $numpags=1;


?>