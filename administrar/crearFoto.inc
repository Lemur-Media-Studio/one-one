<?

		$userfile = $_FILES[$data]['tmp_name'];

		$nombreFoto = basename($userfile);
	    $camino = dirname($userfile)."/";

		$file = $_FILES[$data]['name'];	 $ext = substr($file, -3); 		

		if(strtolower($ext) == "jpg") $img = @imagecreatefromjpeg($camino.$nombreFoto);
		else if(strtolower($ext) == "gif") $img = @imagecreatefromgif($camino.$nombreFoto);
		else if(strtolower($ext) == "png") $img = @imagecreatefrompng($camino.$nombreFoto);		

		$datos = getimagesize($camino.$nombreFoto) ;

			$altura = 800;
            $ratio = ($datos[1] / $altura);
            $anchuraFoto = round($datos[0] / $ratio);
            $thumb = imagecreatetruecolor($anchuraFoto,$altura);
            imagecopyresampled ($thumb, $img, 0, 0, 0, 0, $anchuraFoto, $altura, $datos[0], $datos[1]);

	    $archivo = "../imagenes/".$imagen;
		imagejpeg($thumb,$archivo,90);		

?>