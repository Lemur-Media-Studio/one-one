<?php
	
	session_start(); 

	if (!$_SESSION['ingreso']) { header("Location:index.php"); }

?>