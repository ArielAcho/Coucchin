<!DOCTYPE html>
<?php
	session_start();
require_once 'funciones.php';
	if($_SESSION == Array()){
		header("Location: /my-site/home.php");
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
      				<a class="navbar-brand" href="conf_usr.php"><?php echo "Bienvenido " .$_SESSION['nom']. "!!!" ?></a>
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
	  	<div class="row-fluid">	<!--Cuerpo de Pagina -->
	    	<div class="col-sm-3">
<?php enlaces() ?>
	    	</div>
	    	<div class="col-sm-7"> <!-- Cuerpo Central -->
	   		<?php
				require_once 'contr_mostrarMisPub.php';
			?>		
			</div>
	    	<div class="col-sm-2">
	        	<!-- Cuerpo Derecho -->
		   	</div>
	</div>
</body>
</html>