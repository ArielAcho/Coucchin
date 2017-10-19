<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION == Array()){
		header("Location: /my-site/home.php");
	}
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
    			<ul class="nav navbar-nav pull-right ">                    
					<li><a href="vistaPublicaciones.php" onclick="#">Atras</a></li>
                    <?php
					  	if($_SESSION['adm']==0){ echo '<li><a href="form_usr/conf_usr.php">Configuraciones</a>';}else{echo '<li><a href="form_adm/conf_adm.php">Configuraciones</a>';}
						?>
					<li><a href="home.php">Cerrar sesion</a></li></ul> <!--Menu itemps por derecha-->
    			<ul class="nav navbar-nav pull-left"> <!-- Menu itemps por izquierda -->
					<li><a href=""><img src="bs/img/logo.png"  height="22" ></a></li>
    			</ul>
  			</div>
		</nav>
	   		<?php
				require_once 'contr_detallePub.php';
			?>		
</body>
	<script src="JS/validarMensaje.js"></script>
</html>