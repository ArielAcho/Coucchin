<?php
	require_once '../conexion.php';
	session_start();
	$nom=$_POST['nom'];
	$ape=$_POST['ape'];
	$fecha=$_POST['fecha'];
	$id=$_SESSION['id'];


	$couchinn = new conexion;
	$couchinn->mod_perf($nom,$ape,$fecha,$id);	

?>