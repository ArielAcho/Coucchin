<?php
	require_once '../tipohosp.php';
	$nom1=$_POST['nom_th1'];
	$nom2=$_POST['nom_th2'];
	$hosp= new tipohosp();
	$hosp->mod_th($nom1,$nom2);
?>