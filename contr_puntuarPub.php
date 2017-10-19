<?php 
	require 'conexionPub.php';
	SESSION_start();
	
	$pub = new conexionPub;
	$idpub = $_GET['idpub'];
	$idper = $_SESSION['id'];
	$point = $_POST['puntos'];
	$desc = $_POST['descr'];

	$pub->puntuarPub($point, $desc, $idpub, $idper);

?>