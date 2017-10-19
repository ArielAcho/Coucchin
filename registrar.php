<!DOCTYPE html>
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
				<!--	<li><a href="#">Contacto</a></li>
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
	    		
			    <form id="registro" name="registro"  class="form-horizontal" action = "contr_regis.php" method = "post">
					<br>
					<br>
					<br>
					<br>
					<br>
				    <legend>Registrate</legend>		 
				    <br>   		
				    <div class="form-group registrarse"> <!-- Ingresa ingresa e-mail-->
				        <label class="control-label col-xs-3">Email:</label>
				        <div class="col-xs-9">
				            <input type="text" class="btn btn-default" name="email" placeholder="Email">
				        </div>
				    </div>
				    <div class="form-group registrarse"> <!-- Ingresa password-->
				        <label class="control-label col-xs-3">Password:</label>
				        <div class="col-xs-9">
				            <input type="password" class="btn btn-default" name="pass1" placeholder="Password">
				        </div>
				    </div>
				    <div class="form-group registrarse"> <!-- Ingresa password-->
				        <label class="control-label col-xs-3">Confirmar Password:</label>
				        <div class="col-xs-9">
				            <input type="password" class="btn btn-default" name="pass2" placeholder="Confirmar Password">
				        </div>
				    </div>
				    <div class="form-group registrarse"> <!-- Ingresa nombre-->
				        <label class="control-label col-xs-3">Nombre:</label>
				        <div class="col-xs-9">
				            <input type="text" class="btn btn-default" name= "nom" placeholder="Nombre">
				        </div>
				    </div>
				    <div class="form-group registrarse"> <!-- Ingresa apellido-->
				        <label class="control-label col-xs-3">Apellido:</label>
				        <div class="col-xs-9">
				            <input type="text" class="btn btn-default" name="ape" placeholder="Apellido">
				        </div>
				    </div>
				    <div class="form-group registrarse"> <!-- Selecciona fecha de nacimiento-->
				        <label class="control-label col-xs-3">Fecha Nacimiento:</label>
				        <div class="col-xs-3">
				            <input type="date" placeholder="dd/mm/aaaa" class="btn btn-default" clase="cumpleanios" name="fecha" step="1" min="1900-01-01" max="1998-12-31">
				        </div>
				    </div>
				    <div class="form-group registrarse">
				        <div class="col-xs-offset-3 col-xs-9">
				            <input id="registrar" type="submit" class="btn btn-primary" value="Enviar" onclick="return validarRegistro()"> <!-- Envia el Formulario con los datos ingresados-->
				            <input type="reset" class="btn btn-primary" value="Limpiar"> <!-- Resetea el Formulario -->
				        </div>
				    </div>
				</form>
			</div>
	    	<div class="col-sm-4">
	        	<!-- Cuerpo Derecho -->
		   	</div>
	</div>
<script src="JS/validarRegistro.js"></script>
</body>
</html>