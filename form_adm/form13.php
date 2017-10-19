<!DOCTYPE html>
<?php
	session_start();
require_once 'funciones.php';
	
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
    			<!--<ul class="nav navbar-nav ">
    			<form class="form-inline pull-xs-left">
   					<input class="form-control" type="text" placeholder="Search">
    				<button class="btn btn-default" type="submit">Search</button>
  				</form>
  				</ul>-->
  			</div>
  		</nav>
  		<br><br><br><br><br>	
		<div class="container">
			<div class="row-fluid">
                <div class="col-xs-3 col-md-3">
	  				<!--<nav class="navbar navbar-default">
	  					<div class="container-fluid">
                            <ul class="nav navbar-nav">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="#">Administrador</a>
			    	            </div>
				            </ul>
	  	                </div>
					</nav>-->
<?php enlaces() ?>
	  			</div>
	  			<div class="col-xs-2 col-md-2">
	  			</div>
	  			<div class="col-xs-5 col-md-5">
	  				<nav class="navbar">
		  				<div class="container-fluid">
			    			 <legend>Crear Tipo de Hospedaje</legend>
		  				</div>
					</nav>   		
					    <div class="row">
	  						<div class="col-xs-1 col-md-1">
	  						</div>
					    	<div class="col-xs-6 col-md-6">
						    <?php require_once '../contr_th.php'/* esto imprime el listado y el formulario de crear t. hospedaje*/ ;?>
						    <br>
						    </div>
						    <div class="col-xs-3 col-md-3">
	  						</div>
						</div>

					<form name="agregarHospedaje" class="form-horizontal" action = "contr_th_crear.php" method = "post"> 
					    <div class="form-group"> <!-- Ingresa tipo de hospedaje-->
					        <label class=" col-xs-6 control-label">Crear Tipo de Hospedaje:</label>
					        <br>
					        <br>
					        <div class="col-xs-offset-1 col-xs-9">
					            <input type="text" class="btn btn-default" name="nom_th" placeholder="Tipo de Hospedaje">
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-xs-offset-2 col-xs-9">
					        <br>
					            <input type="submit" class="btn btn-primary" value="Enviar" onclick="return validarAgregarHospedaje()"> <!-- Envia el Formulario con los datos ingresados-->
					            <input type="reset" class="btn btn-primary" value="Limpiar"> <!-- Resetea el Formulario -->
					        </div>
					    </div>
					</form>
					<br>
	  			</div>
	   		</div>
	  	</div>
	</div>
</body>
<script src="../JS/validarAgregarHospedaje.js"></script>
</html>