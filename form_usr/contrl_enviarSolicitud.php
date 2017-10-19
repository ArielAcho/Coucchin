<?php
	require_once '../solicitud.php';
	SESSION_start();
	$fecha=$_POST['fecha'];
	$cant=$_POST['cantidad'];
    $id=$_SESSION['id'];
	$idpub=$_GET['idpub'];
    
	$couchinn = new solicitud;
	$couchinn->enviar_solicitud($id,$idpub,$fecha,$cant);
?>