<?php 
	require 'conexionPub.php';
	SESSION_start();
	
	$pub = new conexionPub;
	$idpub = $_GET['idpub'];
	$idpreg = $_GET['idpreg'];
	$idper = $_SESSION['id'];
	$desc = $_POST['descr'];

	$pub->enviarResp($desc, $idpub, $idpreg, $idper);

?>