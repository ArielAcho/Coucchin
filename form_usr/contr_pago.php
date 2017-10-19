<?php
	require_once '../pago.php';
	session_start();
	$idper=$_SESSION['id'];
	$premium=$_SESSION['premium'];//***premium 0=Desactivado 1=Activado***
	$nro_tarjeta=$_POST['nro_tarjeta'];
	$marca=$_POST['nseg'];
	$tipo_cuen=$_POST['tipo_cuen'];
	$banco=$_POST['banco'];
	$saldo=$_POST['saldo'];

	if($premium==0) {
		$pag = new pago;
		$pag->registrar($nro_tarjeta,$marca,$tipo_cuen,$banco,$saldo,$idper);	
		$pag->cerrar();
        $_SESSION['premium'] = 1;
        echo '<script language="javascript">';
        echo 'window.alert("Cuenta Premium activada exitosamente");';
        echo "window.location='conf_usr.php';";
        echo '</script>';
	}else {
        echo '<script language="javascript">';
        echo 'window.alert("Error activando cuenta premium");';
        echo "window.location='conf_usr.php';";
        echo '</script>';
    }

  /*  $_SESSION['premium'] = 1;
    echo '<script language="javascript">';
    echo 'window.alert("Cuenta Premium activada exitosamente");';
    echo "window.location='conf_usr.php';";
    echo '</script>';*/
?>