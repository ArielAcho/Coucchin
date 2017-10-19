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
    			<!--<ul class="nav navbar-nav ">
    			<form class="form-inline pull-xs-left">
   					<input class="form-control" type="text" placeholder="Search">
    				<button class="btn btn-default" type="submit">Search</button>
  				</form>
  				</ul>-->
  			</div>
  		</nav>
  		<br><br><br><br><br><br>	
		<div class="container">
			<div class="row">
				<div class="col-xs-2 col-md-2">
<?php enlaces() ?>
	  			</div>
	  			<div class="col-xs-2 col-md-2">

	  			</div>
	  			<div class="col-xs-5 col-md-7">
	  				<?php require_once '../contr_solicit.php'; ?>
	  			</div>
	  		</div>
	  	</div>
	</div>
</body>
<script src="../JS/validarContraseña.js"></script>
</html>