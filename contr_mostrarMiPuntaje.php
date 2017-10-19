<?php
	require_once '../conexion.php';

	$idper = $_SESSION['id'];

	$couchinn = new conexion;
	$couchinn->mostrarMiPuntaje($idper);	
?>