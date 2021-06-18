<?php

function GeneraPassword($longitud) {


/* Asignamos el juego de caracteres al array $caracteres para generar la contraseña.
Podemos añadir más caracteres para hacer más segura la contraseña.
*/
$caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789etert3en4bpoi2vz0002yptripor" ;

/* Introduce la semilla del generador de números aleatorios mejorado */
mt_srand(microtime() * 1000000);

for($i = 0; $i < $longitud; $i++) {
/* Genera un valor aleatorio mejorado con mt_rand, entre 0 y el tamaño del array
$caracteres menos 1. Posteríormente vamos concatenando en la cadena $password
los caracteres que se van eligiendo aleatoriamente.
*/
$key = mt_rand(0,strlen($caracteres)-1);
$password = $password . $caracteres{$key};
}

return $password;

}

function cortar($cadena,$limite) {

	if (strlen($cadena)==0) { $cadena="---"; return $cadena; }
	else {
	
		//si el tamaño del texto supera el $limite la corto y reemplazo por "..." desde el caracter $limite.
		if (strlen($cadena)>=$limite)	{
	
			$cadena=substr_replace($cadena, '...', $limite); 
			return $cadena;

		} else return $cadena;
	}

}


?>