<?php
	require_once '../tipohosp.php';
	$nom=$_POST['nom_th'];
	$hosp= new tipohosp();
	$hosp->crear_th($nom);
?>