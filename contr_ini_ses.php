<?php  
	require_once 'conexion.php';
	session_start();
	session_destroy();
	
	$email=$_POST['email'];
	$passw=$_POST['password'];


	session_start();
	$couchinn= new conexion;
	$couchinn->login($email,$passw);
	
?>