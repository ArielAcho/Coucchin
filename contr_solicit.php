<?php
	require 'solicitud.php';

	$public = new solicitud();
	$id=$_SESSION['id'];
	$public->verSolicitudesDe($id);  
?>