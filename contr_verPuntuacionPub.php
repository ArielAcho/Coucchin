<?php
	require_once 'conexionPub.php';

	$idpub=$_GET['idpub'];

	$couchinn = new conexionPub;
	$couchinn->mostrarPuntajePub($idpub);	
?>