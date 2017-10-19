<?php
	
	require 'conexionPub.php';

	$hues= new conexionPub();
	$hues->listar_huespedes($_SESSION['id']);  
	
?>