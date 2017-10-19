<?php
	//require_once '../conexion.php';
	require '../conexion.php';
	session_start();
	$con = new conexion();
	$con->mod_perf_usr($_POST['email']);
	header ("Location: /my-site/form_adm/form8.php");

	/*
	if($_SESSION['estado']=='0'){
		$email=$_POST['email'];
		$couchinn= new conexion;
		$usuario= $couchinn->mod_perf_usr($email);
		$_SESSION['estado']='1';
	}else{
		if($_SESSION['estado']=='1'){
		$_SESSION['']
/*	if($usuario['3'] != ' '){
			echo"	<div class='form-group'><label class='control-label col-xs-3'>Email:</label><div class='col-xs-9'>";
			echo"           <input type='text' class='btn btn-default' name='email' placeholder='Email'></div></div>";
			echo"   <div class='form-group'><label class='control-label col-xs-3'>Password:</label><div class='col-xs-9'>";
			echo"           <input type='password' class='btn btn-default' name='pass1' placeholder='Password'></div></div>";
			echo"   <div class='form-group'><label class='control-label col-xs-3'>Nombre:</label><div class='col-xs-9'>";
			echo"           <input type='text' class='btn btn-default' name= 'nom' placeholder='Nombre'></div></div>";
			echo"   <div class='form-group'><label class='control-label col-xs-3'>Apellido:</label><div class='col-xs-9'>";
			echo"           <input type='text' class='btn btn-default' name='ape' placeholder='Apellido'></div></div>";
			echo"   <div class='form-group'><label class='control-label col-xs-3'>Fecha Nacimiento:</label><div class='col-xs-3'>";
			echo"           <input type='date' placeholder='dd/mm/aaaa' class='btn btn-default' clase='cumpleanios' name='fecha' step='1' min='1900-01-01' max='1998-12-31'></div></div>";
	
		}*/
	?>