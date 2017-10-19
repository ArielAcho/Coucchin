<?php
require '../conexion.php';
session_start();
$con = new conexion();
$con->mod_perf_usr_adm($_POST['email'],$_POST['pass1'],$_POST['nom'],$_POST['ape'],$_POST['fecha'],$_SESSION['idMod']);
//header ("Location: /my-site/form_adm/form8.php");