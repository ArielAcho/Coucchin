<!DOCTYPE html>
<?php
	session_start();
require_once 'funciones.php';
	if($_SESSION == Array()){
		header("Location: /my-site/home.php");
	}
    if($_SESSION['adm'] == 1){
		header("Location: /my-site/form_usr/conf_usr.php");
	}
?>
<html>
<head>
	<title>Couchinn</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../bs/img/cube.png">
	<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap-theme.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap-responsive.css">-->
	<script src="../bs/js/jquery.min.js"></script>
	<script src="../bs/js/bootstrap.min.js"></script>
	<script src="../bs/js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
	   <nav class="navbar navbar-default navbar-fixed-top  "> <!--Barra de Menu Top-->
  			<div class="container-fluid">
  				<div class="navbar-header pull-left">
      				<a class="navbar-brand" href="#"><?php echo "Bienvenido " .$_SESSION['nom']. "!!!" ?></a>
   				</div>
    			<ul class="nav navbar-nav pull-right "> <!--Menu itemps por derecha-->
                    <li><a href="#" onclick="history.back()">Atras</a></li>
					<li><a href="../vistaPublicaciones.php">Entrada</a></li>
					<li><a href="conf_usr.php">Configuraciones</a></li>
					<li><a href="../home.php">Cerrar Sesion</a></li>
					<!--<li><a href="">Contacto</a></li>
					<li><a href=""><img src="../bs/img/g/glyphicons-195-question-sign.png" width="18" height="18"></a></li>-->
                </ul>
  			</div>
  		</nav>
  		<br><br><br><br><br><br>	
		<div class="container">
			<div class="row-fluid">
	  			<div class="col-xs-3 col-md-3">
<?php enlaces() ?>
	  			</div>
	  			<div class="col-xs-1 col-md-1">
	  			</div>
	  			<div class="col-xs-6 col-md-6">
	  	            <br>
	  	            <nav class="navbar">
		  				<div class="container-fluid">
			    			 <legend>Cambiar Contraseña</legend>
		  				</div>
					</nav>
					<form id="camb_pass" name="camb_pass"  class="form-horizontal" action = "contr_mod_cont.php" method = "post">    		
					    <div class="form-group"> <!-- Ingresa password-->
					        <label class="control-label col-xs-3">Contraseña actual:</label>
					        <div class="col-xs-9">
					            <input type="text" class="btn btn-default" name="pass1" placeholder="Password">
					        </div>
					    </div>
					    <div class="form-group"> <!-- Ingresa password-->
					        <label class="control-label col-xs-3">Nueva Contraseña:</label>
					        <div class="col-xs-9">
					            <input type="text" class="btn btn-default" name="pass2" placeholder="Password">
					        </div>
					    </div>
					    <div class="form-group"> <!-- Ingresa password-->
					        <label class="control-label col-xs-3">Confirmar Nueva Contraseña:</label>
					        <div class="col-xs-9">
					            <input type="text" class="btn btn-default" name="pass3" placeholder="Confirmar Password">
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-xs-offset-3 col-xs-9">
					            <input id="registrar" type="submit" class="btn btn-primary" value="Enviar" onclick="return validarCambioContraseña()"> <!-- Envia el Formulario con los datos ingresados-->
					            <input type="reset" class="btn btn-primary" value="Limpiar"> <!-- Resetea el Formulario -->
					        </div>
					    </div>
					</form>
					<br>
	  			</div>
	      	    <br><br>
	   			</div>
	   		</div>
	  	</div>
    </body>
    <script src="../JS/validarCambioContraseña.js"></script>
</html>