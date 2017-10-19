<!DOCTYPE html>
<?php
	session_start();
	require_once 'funciones.php';
	if($_SESSION == Array()){
		header("Location: /my-site/home.php");
	}
    if($_SESSION['adm'] == 0){
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
					<li><a href="conf_adm.php">Configuraciones</a></li>
					<li><a href="../home.php">Cerrar Sesion</a></li>
					<!--<li><a href="">Contacto</a></li>
					<li><a href=""><img src="../bs/img/g/glyphicons-195-question-sign.png" width="18" height="18"></a></li>-->
    			</ul>
  			</div>
  		</nav>
  		<br><br><br><br><br><br>	
		<div class="container">
            <div class="col-xs-3 col-md-3">
				<?php enlaces() ?>
	  		</div>
			<div class="col-xs-1 col-md-1">
	  		</div>
	  		<div class="col-xs-5 col-md-5">
	  			<br>
	  			<nav class="navbar">
		  			<div class="container-fluid">
			   			 <legend>Modificar Perfil</legend>
		  			</div>
				</nav>
				<form id="mod_perf" name="mod_perf"  class="form-horizontal" action = "contr_mod_perf.php" method = "post">    		
				    <div class="form-group"> <!-- Ingresa nombre-->
				        <label class="control-label col-xs-3">Nombre:</label>
				        <div class="col-xs-9">
				            <input type="text" class="btn btn-default" name= "nom" placeholder="Nombre">
				        </div>
				    </div>
				    <div class="form-group"> <!-- Ingresa apellido-->
				        <label class="control-label col-xs-3">Apellido:</label>
				        <div class="col-xs-9">
				            <input type="text" class="btn btn-default" name="ape" placeholder="Apellido">
				        </div>
				    </div>
				    <div class="form-group"> <!-- Selecciona fecha de nacimiento-->
				        <label class="control-label col-xs-3">Fecha Nacimiento:</label>
				        <div class="col-xs-3">
				            <input type="date" placeholder="dd/mm/aaaa" class="btn btn-default" clase="cumpleanios" name="fecha" step="1" min="1900-01-01" max="2000-12-31">
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="col-xs-offset-3 col-xs-9">
				            <input id="registrar" type="submit" class="btn btn-primary" value="Enviar" onclick="return validarModPerfil()"> <!-- Envia el Formulario con los datos ingresados-->
				            <input type="reset" class="btn btn-primary" value="Limpiar"> <!-- Resetea el Formulario -->
				        </div>
				    </div>
				</form>
				<br>
	  		</div>
	  		<div class="col-xs-3 col-md-3">
	  		</div>
	  	</div>
	</div>
</body>
<script src="../JS/validarModPerfil.js"></script>
</html>