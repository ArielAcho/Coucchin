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
	<link rel="shortcut icon" href="bs/img/cube.png">
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap-theme.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap-responsive.css">-->
	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/bootstrap.min.js"></script>
	<script src="bs/js/bootstrap.js"></script>
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
					<li><a href="vistaPublicaciones.php">Entrada</a></li>
					<?php
					if ($_SESSION['adm'] == 1){	
						echo "<li><a href='form_adm/conf_adm.php'>Configuraciones</a></li>";
					}else{
						echo "<li><a href='form_usr/conf_usr.php'>Configuraciones</a></li>";
					}
					?>
					<li><a href="../home.php">Cerrar Sesion</a></li>
    			</ul>
  			</div>
  		</nav>
	  	<div class="row-fluid">	<!--Cuerpo de Pagina -->
	    	<div class="col-sm-3">
	   			
	    	</div>
	    	<div class="col-sm-6"> <!-- Cuerpo Central -->
				<?php require_once 'contr_verPuntuacionPub.php' ?>
			</div>
	    	<div class="col-sm-3">
	        	<!-- Cuerpo Derecho -->
		   	</div>
	</div>
</body>
</html>