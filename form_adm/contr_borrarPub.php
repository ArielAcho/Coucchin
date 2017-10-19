<?php 
	require '../conexionPub.php';
	
	$pub = new conexionPub;
	$pub->borrarPub($_GET['idpub']);
?>