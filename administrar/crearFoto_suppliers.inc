<?

		$userfile = $_FILES[$data]['tmp_name'];

		$nombreFoto = basename($userfile);
	    $camino = dirname($userfile)."/";

		$file = $_FILES[$data]['name'];	 $ext = substr($file, -3); 		

		if(strtolower($ext) == "jpg") $img = @imagecreatefromjpeg($camino.$nombreFoto);
		else if(strtolower($ext) == "gif") $img = @imagecreatefromgif($camino.$nombreFoto);
		else if(strtolower($ext) == "png") $img = @imagecreatefrompng($camino.$nombreFoto);		

		$datos = getimagesize($camino.$nombreFoto) ;

			$ancho = 1200;
            $ratio = ($datos[0] / $ancho);
            $alturaFoto = round($datos[1] / $ratio);
            $thumb = imagecreatetruecolor($ancho,$alturaFoto);
            imagecopyresampled ($thumb, $img, 0, 0, 0, 0, $ancho, $alturaFoto, $datos[0], $datos[1]); 


	    $archivo = "../imagenes/".$imagen;
		imagejpeg($thumb,$archivo,90);		

?>