<?php 
	require '../conexionPub.php';
	
	$pub = new conexionPub;
	$pub->activarPub($_GET['idpub']);
?>