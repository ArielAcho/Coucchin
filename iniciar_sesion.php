<!DOCTYPE html>
<?php
	session_start();
	session_destroy();
?>
<html>
<head>
			<title>Couchinn</title>
			<meta charset="utf-8">
			<link rel="shortcut icon" href="bs/img/cube.png">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="bs/css/bootstrap-theme.css">
			<link rel="stylesheet" type="text/css" href="bs/css/bootstrap-theme.min.css">
			<!--<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap-responsive.css">-->
			<script src="bs/js/jquery.min.js"></script>
			<script src="bs/js/bootstrap.min.js"></script>
			<script src="bs/js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
	   <nav class="navbar navbar-default navbar-fixed-top  "> <!--Barra de Menu Top-->
  			<div class="container-fluid">
    			<ul class="nav navbar-nav pull-right "> <!--Menu itemps por derecha-->
					<li><a href="home.php">Inicio</a></li>
					<li><a href="iniciar_sesion.php">Iniciar Sesion</a></li>
					<li><a href="registrar.php">Registrar</a></li>
				<!--	<li><a href="">Contacto</a></li>
					<li><a href=""><img src="bs/img/g/glyphicons-195-question-sign.png" width="18" height="18"></a></li>-->
    			</ul>
    			<ul class="nav navbar-nav pull-left"> <!-- Menu itemps por izquierda -->
					<li><a href="home.php"><img src="bs/img/logo.png"  height="22" ></a></li>
    			</ul>
  			</div>
		</nav>
	  	<div class="row-fluid">	<!--Cuerpo de Pagina -->
	    	<div class="col-sm-4">
	        	
	        	<!-- Cuerpo Izquierdo -->
	    	</div>
	    	<div class="col-sm-4"> <!-- Cuerpo Central -->
	    		<br>
				<br>
				<br>
				<br>
				<br>
	    		<legend >Iniciar Sesion</legend>
	    		<br>
						<form id="sesion" name="sesion" class="form-horizontal" action = "contr_ini_ses.php" method = "post">
							
							<div class="form-group"> <!-- Ingresa ingresa e-mail-->
				        		<label class="control-label col-xs-3">Email:</label>
				        		<div class="col-xs-9">
				            		<input type="text" class="btn btn-default" name="email" placeholder="Email">
				        		</div>
				    		</div>
				    		<div class="form-group"> <!-- Ingresa password-->
				        		<label class="control-label col-xs-3">Password:</label>
				        		<div class="col-xs-9">
				            		<input type="password" class="btn btn-default" name="password" placeholder="Password">
				        		</div>
				    		</div>
							<br>
							<div class="form-group">
				        		<div class="col-xs-offset-3 col-xs-9">
						            <input id="iniciar" name="iniciar" type="submit" class="btn btn-primary" value="Enviar" onclick="return validarFormulario()"> <!-- Envia el Formulario con los datos ingresados-->
						            <input type="reset" class="btn btn-primary" value="Limpiar"> <!-- Resetea el Formulario -->
						        </div>
				    		</div>
						</form>
						<br>
				    	<p><a href="olvidepass.php" class="col-xs-offset-3 col-xs-8.5">olvidaste tu contraseña?</a></p>	
						
	    	</div>
	     	<div class="col-sm-4">
	        	<br>
	        	<br>
	        	<br>
	   		<!-- lado derecho con hola mundo -->
	   		</div>
		</div>
	</div>
<script src="JS/validacion.js"></script>
</body>
</html>
