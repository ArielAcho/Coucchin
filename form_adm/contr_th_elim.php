<?php
	require_once '../tipohosp.php';
	$nom1=$_POST['nom_th1'];
	$hosp= new tipohosp();
	$hosp->elim_th($nom1);
?>