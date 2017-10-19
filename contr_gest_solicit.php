<?php
	require 'solicitud.php';

	$sol = new solicitud();
	$acept=$_GET['acept'];
	$idsol=$_GET['idsol'];

	if($acept==1){
		$sol->aceptarSolicitud($idsol);#tambien borrar las otras solicitudes para el couch
	} 
	elseif($acept ==0) {
		$sol->rechazarSolicitud($idsol);
	}
?>