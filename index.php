<?
	
include("lan_inc.php");
include("administrar/conecta.inc");
//include('classes/thumb.php');

$enviado = 0;

if ($_POST['nombre']) {

		foreach($_POST as $campo => $valor) { $cadena = "\$" . $campo . "='" . $valor . "';";     eval($cadena); } 

		$cuerpo = "<strong>Nombre y Apellido:</strong> $nombre <br/> <strong>Telefono:</strong> $telefono <br/>
		<strong>Mail:</strong> $email <br/> <strong>Servicio en el que esta interesado:</strong> $servicio <br/>
		<strong>Consulta:</strong> $consulta <br/>
		
		";
			
		$emailDestino = "contacto@romargroup.com.ar";
		//$emailDestino = "ahora.suena@hotmail.com";

		$headers = "From: OneToOne <maria.kim@one-oneconsultancy.com> \r\n";
		$headers .= "Reply-To: no-reply <maria.kim@one-oneconsultancy.com> \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$asunto = "Contacto";

		mail($emailDestino,$asunto,$cuerpo,$headers);
		$enviado = 1;

}


?>
<!DOCTYPE html>
<html lang="es">
	
<head>

	<title>one to one &bull; trade consulting </title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<meta name="title" content="one to one ">
	<meta name="description" content="Somos una empresa de consultor&iacute;a que presta servicios adaptados a firmas que buscan comercializar sus productos  y ampliar sus mercados en Estados Unidos, Am&eacute;ica Latina y Asia. ">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	
	<meta property="og:title" content="one to one " />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://one-oneconsultancy.com" />
	<meta property="og:site_name" content="one to one " />

	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	
	<link type="text/css" rel="stylesheet" href="slick/slick.css">
	<link type="text/css" rel="stylesheet" href="slick/slick-theme.css">
	<link type="text/css" rel="stylesheet" href="css/animate.css" />

	<link rel="stylesheet" type="text/css" href="style.css" />

	<!-- Global site tag (gtag.js) - Google Ads: 598138187 -->
	
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-598138187"></script>
	
	<script>
	
	window.dataLayer = window.dataLayer || [];
	
	function gtag(){dataLayer.push(arguments);}
	
	gtag('js', new Date());
	
	gtag('config', 'AW-598138187');
	
	</script>
	
</head>

<body>

<div class='pre-load-web bg_main'> <div class='imagen-load ' id="loader"> <img src="imgs/logo.svg" width="200" /> </div> </div>

<div class="menu"><a href="#" class="fa fa-bars fa-lg"></a></div>
<div class="close"><a href="#" class="fa fa-close fa-lg"></a></div>

<div class="main">
	
	<div class="header bg_main">

		<a href="#" class="logo"><img src="imgs/logo.svg" /></a>

		<ul class="social">

			<li><a href="https://facebook.com/OneToOne.Consultancy" target="_blank" class="fa fa-facebook"></a></li>
			<li><a href="https://www.twitter.com/onetooneok" target="_blank" class="fa fa-twitter"></a></li>
			<li><a href="https://www.linkedin.com/company/onetooneok" target="_blank" class="fa fa-linkedin"></a></li>
			<li><a href="https://www.instagram.com/onetooneok" target="_blank" class="fa fa-instagram"></a></li>
			<li> | </li>
<?
	
if ($_SESSION['l']==1) echo '<li><a href="?l=2">ESP</a></li>'; else echo '<li><a href="?l=1">ENG</a></li>'; 
	
?>			
			
		</ul>

		<ul class="nav" >
			<li><a href="#about" class="scroll"><?=$menu1?></a></li>
			<li><a href="#suppliers" class="scroll"><?=$menu2?></a></li>
			<li><a href="#buyers" class="scroll"><?=$menu3?></a></li>
			<li><a href="#partners" class="scroll"><?=$menu4?></a></li>
			<li><a href="#contact" class="scroll"><?=$menu5?></a></li>
		</ul>
		
	</div>
	
	<div class="section fullscreen" id="home">
		
		<div class="slick" id="slick_home">
			
<?
	
$sql = "SELECT * FROM $tabla WHERE tipo = 1 ORDER BY prioridad DESC ";
$resultados = $mysql->query($sql); 

foreach($resultados as $row) {

	$imagen = $row['imagen'];
	echo '<div style="background-image: url(imagenes/'.$imagen.')"> </div>';

}	
	
?>					
			
		</div>

<?
	
if ($_SESSION['l']==1) echo '<img src="imgs/home_titulo_eng.svg" class="home_titulo" />'; else echo '<img src="imgs/home_titulo.svg" class="home_titulo" />';
	
?>
		
	</div>

<?
	
$sql = "SELECT * FROM $tabla WHERE id = 22 ";
$resultados = $mysql->query($sql); 
foreach($resultados as $row);

if ($_SESSION['l']==1) {
	$titulo = $row['titulo_ingles'];
	$texto = $row['texto_ingles'];
} else {
	$titulo = $row['titulo'];
	$texto = $row['texto'];
}
	
?>
	
	<div class="section padding" id="about">
		
		<div class="cont_small center">
			
			<h1 id="anima1"><?=$titulo?></h1> <p class="margin_bottom" id="anima2"><?=nl2br($texto)?></p> <h5>#DynamicGrowth</h5>
			
		</div>
		
	</div>

<?
	
$sql = "SELECT * FROM $tabla WHERE id = 23 ";
$resultados = $mysql->query($sql); 
foreach($resultados as $row);

if ($_SESSION['l']==1) {
	$titulo = $row['titulo_ingles'];
	$texto = $row['texto_ingles'];
} else {
	$titulo = $row['titulo'];
	$texto = $row['texto'];
}
	
?>
	
	<div class="section padding bg_main" id="welcome">
		
		<div class="cont">
			
			<div class="col1" id="anima3"> <h2 class="margin_bottom_2"><?=$titulo?></h2> <p><?=nl2br($texto)?></p> </div>
			
			<div class="col2" id="anima4">
				
				<img src="imgs/foto_bio.jpg" class="foto_bio" />
				
				<hr/>

<?
	
$sql = "SELECT * FROM $tabla WHERE tipo = 16 ORDER BY prioridad DESC ";
$resultados = $mysql->query($sql); 
foreach($resultados as $row) {

	if ($_SESSION['l']==1) { $texto = $row['texto_ingles']; } 
	else { $texto = $row['texto']; }
	
	echo '<div class="nota"> <h3>'.nl2br($texto).'</h3> </div> <hr/>';
	
}	
	
?>					
			</div>
			
			<div class="fila center margin_top"> <img src="imgs/firma.svg" class="firma" /> </div>
			
		</div>
		
	</div>
	
	<div class="section padding" id="organizations">
		
		<div class="cont">
			
			<h2 id="anima5"><?=$titulo1?></h2>
			
			<div class="slick" id="slick_organizations">

<?
	
$sql = "SELECT * FROM $tabla WHERE tipo = 2 ORDER BY prioridad DESC ";
$resultados = $mysql->query($sql); 

foreach($resultados as $row) {

	$imagen = $row['imagen'];
	echo '<div> <img src="imagenes/'.$imagen.'" /> </div>';

}	
	
?>					
			</div>
			
		</div>
		
	</div>

<?
	
$sql = "SELECT * FROM $tabla WHERE id = 19 ";
$resultados = $mysql->query($sql); 
foreach($resultados as $row);

if ($_SESSION['l']==1) {
	$titulo = $row['titulo_ingles'];
	$texto = $row['texto_ingles'];
} else {
	$titulo = $row['titulo'];
	$texto = $row['texto'];
}
	
?>
	
	<div class="section padding bg_light" id="suppliers">
		
		<div class="cont_small">
			
			<h1 class="center margin_bottom" id="anima6"><?=$titulo?></h1> <p class="margin_bottom_2" id="anima7"><?=nl2br($texto)?></p>
			
		</div>
		
		<div class="cont">
			
			<div class="slick" id="slick_suppliers">
					
<?
	
$sql = "SELECT * FROM $tabla WHERE tipo = 3 ORDER BY prioridad DESC ";
$resultados = $mysql->query($sql); 

foreach($resultados as $row) {

	$imagen = $row['imagen'];
	
	if ($_SESSION['l']==1) {
		$titulo = $row['titulo_ingles'];
		$texto = $row['texto_ingles'];
	} else {
		$titulo = $row['titulo'];
		$texto = $row['texto'];
	}
	
	echo '<div style="background-image: url(imagenes/'.$imagen.')">  <span class="box clr_main"> <h2 class="margin_bottom">'.$titulo.'</h2> <p>'.nl2br($texto).'</p> </span> </div> ';

}	
	
?>					
			</div>
				
		</div>
				
	</div>

<?
	
$sql = "SELECT * FROM $tabla WHERE id = 20 ";
$resultados = $mysql->query($sql); 
foreach($resultados as $row);

if ($_SESSION['l']==1) {
	$titulo = $row['titulo_ingles'];
	$texto = $row['texto_ingles'];
} else {
	$titulo = $row['titulo'];
	$texto = $row['texto'];
}
	
?>

	<div class="section padding" id="buyers" >
		
		<div class="cont_small center">
			
			<h1 id="anima8"><?=$titulo?></h1> <p class="margin_bottom" id="anima9"><?=nl2br($texto)?></p>
			
		</div>

	</div>
	
	<div class="listado margin_bottom">

<?
	
$sql = "SELECT * FROM $tabla WHERE tipo = 4 ORDER BY prioridad DESC ";
$resultados = $mysql->query($sql); 

foreach($resultados as $row) {

	$imagen = $row['imagen'];
	
	if ($_SESSION['l']==1) {
		$titulo = $row['titulo_ingles'];
		$texto = $row['texto_ingles'];
	} else {
		$titulo = $row['titulo'];
		$texto = $row['texto'];
	}
	
	echo '<div class="item center"> <div class="item_img"> <img src="imagenes/'.$imagen.'" />  </div> <h4>'.$titulo.'</h4> <p>'.nl2br($texto).'</p> </div> ';

}	
	
?>					
			
	</div>	
			
	<img src="imgs/banner.jpg" class="ancho" id="banner" />		

<?
	
$sql = "SELECT * FROM $tabla WHERE id = 21 ";
$resultados = $mysql->query($sql); 
foreach($resultados as $row);

if ($_SESSION['l']==1) {
	$titulo = $row['titulo_ingles'];
	$texto = $row['texto_ingles'];
} else {
	$titulo = $row['titulo'];
	$texto = $row['texto'];
}
	
?>
	
	<div class="section padding" id="partners" >
		
		<div class="cont_small center ">
			
			<h1 id="anima10"><?=$titulo?></h1> <p class="margin_bottom_2" id="anima11"><?=nl2br($texto)?></p>
			
		</div>
		
		<div class="cont">
			
			<h3 class="margin_bottom"><?=$titulo2?></h3>
			
			<div id="map" class="margin_bottom"> </div>
						
		</div>
		
		<div class="cont_small center">

			<p> <strong><?=$titulo3?></strong> <br/>

<?
	
$cuenta = 1;
	
$sql = "SELECT * FROM $tabla WHERE tipo = 5 ORDER BY prioridad DESC";
$resultados = $mysql->query($sql); 
$total = $resultados->num_rows;

foreach($resultados as $row) {

if ($_SESSION['l']==1) {
	$titulo = $row['titulo_ingles'];
} else {
	$titulo = $row['titulo'];
}

	echo $titulo;
	
	if($cuenta<$total) { echo ', '; $cuenta++; }
	
}  

?>  
			</p>

		</div>

	</div>
			
	<div class="section padding bg_main" id="contact">

<? 
	
	if ($_SESSION['l']==1) { 
	
		if($enviado==0) { 	

?>

		<div class="titulo center margin_bottom" id="anima12"> <div> <h1 class="clr_light">Hey!</h1> <p class="big_text"> Contact us for more information and<br/> customer service.</p> </div>	</div>	

		<div class="cont_small" id="contact">
				
			<form method="post" name="form" action="#contact">
				
				<strong>NAME & SURNAME</strong> <br/>
				<input type="text" name="nombre" maxlength="90" required /> 
				  
				<strong>TELEPHONE</strong>  <br/>
				<input type="text" name="telefono" maxlength="90" /> 
				  
				<strong>MAIL</strong> <br/>
				<input type="email" name="email" maxlength="90" required /> 

				<strong>SERVICE YOU ARE INTERESTED IN</strong> <br/> 
				<div class='select-style'> <select name='envio'>
					<option>Consulting</option>
					<option>Logistics/Courier</option>
					<option>Customs Broker Services</option>
					<option>Representation/Trading</option>
					<option>Product Purchase</option>
					<option>Trade Mission</option>
					<option>Other</option>
				</select> </div>	
					
				<strong>COMMENTS</strong>  <br/>
				<textarea name="consulta" required></textarea> 
				
				<div class="fila margin_bottom_2"> <button type="submit">SEND</button> </div>
					
			</form>
						
		</div>

		<div class="titulo center"> <div> <h5 class="clr_light">Call us!</h5> <p> [+1] 213 306 6554 I <br/>
645 W. 9TH ST. / Los Angeles. CA [90015]  </p> </div> </div>	

<? 
	
		} else echo '<h1 class="center clr_light">Thank you!</h1> <p class="center"><strong>YOUR COMMENT WAS SENT.</strong></ ';
	
	} 
	
	else { 
	
		if($enviado==0) { 	

?>

		<div class="titulo center margin_bottom" id="anima12"> <div> <h1 class="clr_light">Hola!</h1> <p class="big_text"> Escr&iacute;banos y a la brevedad<br/>
nos comunicaremos con usted.</p> </div>	</div>	

		<div class="cont_small" id="contact">
				
			<form method="post" name="form" action="#contact">
				
				<strong>NOMBRE Y APELLIDO</strong> <br/>
				<input type="text" name="nombre" maxlength="90" required /> 
				  
				<strong>TEL&Eacute;FONO</strong>  <br/>
				<input type="text" name="telefono" maxlength="90" /> 
				  
				<strong>MAIL</strong> <br/>
				<input type="email" name="email" maxlength="90" required /> 

				<strong>SERVICIO EN EL QUE EST&Aacute;S INTERESADO</strong> <br/> 
				<div class='select-style'> <select name='servicio'>
					<option>Consultor&iacute;a</option>
					<option>Log&iacute;stica/Env&iacute;os</option>
					<option>Servicios de agente de aduana</option>
					<option>Representaci&oacute;n/Comercializaci&oacute;n</option>
					<option>Compra de producto</option>
					<option>Misi&oacute;n comercial</option>
					<option>Otro</option>
				</select> </div>	
					
				<strong>CONSULTA</strong>  <br/>
				<textarea name="consulta" required></textarea> 
				
				<div class="fila margin_bottom_2"> <button type="submit">ENVIAR</button> </div>
					
			</form>
						
		</div>

		<div class="titulo center"> <div> <h5 class="clr_light">Ll&aacute;menos</h5> <p> [+1] 213 306 6554 I <br/>
645 W. 9TH ST. / Los Angeles. CA [90015]  </p> </div> </div>	


<? 
	
		} else echo '<h1 class="center clr_light">Gracias!</h1> <p class="center"><strong>SU COMENTARIO FUE ENVIANDO DE FORMA CORRECTA.</strong></ ';

	}  
	
	
?>

	</div>
	
</div>

	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="js/scripts.js?v=2" type="text/javascript"></script>
	<script src="js/anima.js" type="text/javascript"></script>
	<script src="js/fontawesome.js"></script>
	<script src="js/waypoint.js" type="text/javascript"></script>
	<script src="slick/slick.min.js" type="text/javascript" ></script>

	<script type="text/javascript">

      function initialize() {

        var myLatLng = { lat: 10.313283, lng: 35.425775 };

	    var infoWindow = new google.maps.InfoWindow;

	    var colores = [
	        {
	          featureType: "all",
	          elementType: "all",
	          stylers: [
	            { saturation: -100 }
	          ]
	        }
		];

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 2,
          center: myLatLng
        });

	    var estilo = new google.maps.StyledMapType(colores);
	    map.mapTypes.set('mapa-bn', estilo);
	    map.setMapTypeId('mapa-bn');

		var image = 'imgs/seniala.png';
<?
	
$sql = "SELECT * FROM $tabla WHERE tipo = 5 ";
$resultados = $mysql->query($sql); 

foreach($resultados as $row) {

	$id = $row['id']; 
	$lat = $row['latitud']; 
	$lng = $row['longitud']; 
	
?>		
        var marker<?=$id?> = new google.maps.Marker({
          position: { lat: <?=$lat?>, lng: <?=$lng?> },
          map: map,
          icon: image
        });
   
<? }  ?>  

                      
      }
      
    </script>

	<script async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANB--3I9cvZo-ERw-YfU0JQc9fPkzl2OQ&callback=initialize">  </script>

</body>

</html>