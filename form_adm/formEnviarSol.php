<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION == Array()){
		header("Location: /my-site/home.php");
	}
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$fecha = date('Y-m-d');
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
      				<a class="navbar-brand" href="#"><?php echo "Bienvenido ".$_SESSION['nom']."!!!" ?></a>
   				</div>
    			<ul class="nav navbar-nav pull-right "> <!--Menu itemps por derecha-->
					<li><a href="#" onclick="history.back()">Atras</a></li>
					<li><a href="../vistaPublicaciones.php">Entrada</a></li>
					<li><a href="conf_adm.php">Configuraciones</a></li>
					<li><a href="../home.php">Cerrar Sesion</a></li>
    			</ul>
  			</div>
  		</nav>
	  	<div class="row-fluid">	<!--Cuerpo de Pagina -->
	    	<div class="col-sm-3">
	        	
	        	
	    	</div>
	    	<div class="col-sm-6"> <!-- Cuerpo Central -->
	    		
			    <form id="registro" name="registro"  class="form-horizontal" action = "contrl_enviarSolicitud.php?idpub=<?php echo $_GET['idpub']; ?>" method = "post">
					<br>
					<br>
					<br>
					<br>
					<br>
				    <legend>Enviar solicitud</legend>		 
				    <br>   		
				    <div class="form-group"> <!-- Selecciona fecha -->
				        <label class="control-label col-xs-3">Fecha:</label>
				        <div class="col-xs-4">
				            <input type="date" placeholder="dd/mm/aaaa" class="btn btn-default" clase="cumpleanios" name="fecha" step="1" min="<?php echo $fecha ?>" max="2020-12-31">
						</div>	
						<label class="control-label col-xs-3">Cantidad de dias:</label>
				        <div class="col-xs-2">    
							<input type="number" placeholder="dias" class="btn btn-default" clase="cumpleanios" name="cantidad" step="1" min="1">
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="col-xs-offset-3 col-xs-9">
				            <input id="registrar" type="submit" class="btn btn-primary" value="Enviar"> <!-- Envia el Formulario con los datos ingresados-->
				            <input type="reset" class="btn btn-primary" value="Limpiar"> <!-- Resetea el Formulario -->
				        </div>
				    </div>
				</form>
			</div>
	    	<div class="col-sm-3">
	        	<!-- Cuerpo Derecho -->
		   	</div>
	</div>
</body>
</html>