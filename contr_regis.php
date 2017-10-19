<?php
	require_once 'conexion.php';
	session_start();
	session_destroy();
	$email=$_POST['email'];
	$pass=$_POST['pass1'];
	$nom=$_POST['nom'];
	$ape=$_POST['ape'];
	$fecha=$_POST['fecha'];

	
	session_start();
	$couchinn = new conexion;
	$couchinn->registrar($pass,$nom,$ape,$email,$fecha);	

?>