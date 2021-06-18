<?

session_start();

if ($_GET['l']) { $_SESSION['l'] = $_GET['l']; } else if (!$_SESSION['l']) { $_SESSION['l'] = 1; }

if ($_SESSION['l']==1) {
		
	$menu1 = "ABOUT US";
	$menu2 = "SUPPLIERS";
	$menu3 = "BUYERS";
	$menu4 = "STRATEGIC PARTNERS";
	$menu5 = "CONTACT US";
	
	$titulo1 = "SUPPORTING ORGANIZATIONS";
	$titulo2 = "OUR ROUTES AROUND THE WORLD";
	$titulo3 = "LIST OF ROUTES | ONE TO ONE";
	

} else if ($_SESSION['l']==2) {

	$menu1 = "NOSOTROS";
	$menu2 = "PROVEEDORES";
	$menu3 = "COMPRADORES";
	$menu4 = "SOCIOS ESTRAT&Eacute;GICOS";
	$menu5 = "CONTACTO";

	$titulo1 = "ORGANIZACIONES QUE NOS ACOMPA&Ntilde;AN";
	$titulo2 = "NUESTRAS RUTAS ALREDEDOR DEL MUNDO";
	$titulo3 = "LISTA DE RUTAS | ONE TO ONE";

}  

?>