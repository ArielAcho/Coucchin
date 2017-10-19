<?php

	# CONTROLADOR DE MODIFICAR CONTRASEÑA
	# EN LA CONEXION EXISTE UNO PERO NO FUNCIONA COMO DEBE
	# Minuta sabado 04-06 
		#Modificacion de el cambiar contraseña
	# Faltan realizar script controladores
	
	require_once '../conexion.php';
	SESSION_start();
	$cont1=$_POST['pass1'];
	$cont2=$_POST['pass2'];
	$cont3=$_POST['pass3'];
    $id=$_SESSION['id'];
    
	$couchinn = new conexion;
	$couchinn->cambiar_pass($id,$cont1,$cont2,$cont3);
?>