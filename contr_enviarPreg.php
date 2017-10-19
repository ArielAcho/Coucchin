<?php 
	require 'conexionPub.php';
	SESSION_start();
	
	$pub = new conexionPub;
	$idpub = $_GET['idpub'];
	$idper = $_SESSION['id'];
	$desc = $_POST['descr'];

	$pub->enviarPreg($desc, $idpub, $idper);

?>