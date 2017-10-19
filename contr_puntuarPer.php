<?php
	
	require 'conexionPub.php';
	session_start();
	
	$idh=$_POST['nom'];
	$idper=$_SESSION['id'];
	$valor=$_POST['puntos'];
	$descripcion=$_POST['descr'];
	
	$hues= new conexionPub();
	$hues->puntuar_huesped($idh, $idper, $valor, $descripcion);  
	
?>