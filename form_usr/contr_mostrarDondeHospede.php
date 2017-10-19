<?php 
	require '../conexionPub.php';
	
	$pub = new conexionPub;
	$pub->mostrarDondeHospede($_SESSION['id']);
?>