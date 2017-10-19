<?php 
	require 'conexionPub.php';
	
	$pub = new conexionPub;
	$pub->detalle_pub($_GET['idpub']);
?>