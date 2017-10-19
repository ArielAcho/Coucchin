<?php 
	require '../conexionPub.php';
	
	$pub = new conexionPub;
	$pub->mostrarMisPub($_SESSION['id']);
?>