<?php  
	require_once 'conexion.php';
	
	$email=$_POST['email'];

	$couchinn= new conexion;
	$couchinn->recuperar($email);
	
?>