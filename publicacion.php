<!DOCTYPE html>
<?php
	session_start(); 
	if($_SESSION == Array()){
		header("Location: /my-site/home.php");
	}
    if($_SESSION['adm'] == 1){
		header("Location: /my-site/form_adm/conf_adm.php");
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
					<li><a href="../vistaPublicaciones.php">Entrada</a></li>
					<li><a href="conf_usr.php">Configuraciones</a></li>
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
				<div class="col-sm-3"> <!-- ITEMS IZQUIERDA -->
	      			<div class="btn-group-vertical">
	      	            <div class="list-group-item active">Opciones</div>
						<a href="form1.php" class="btn btn-default" role="button">Modificar Perfil</a>
						<a href="form2.php" class="btn btn-default" role="button">Cambiar Contraseña</a>
	      	            <label class="list-group-item active">Publicaciones</label>
						<a href='form6.php' class='btn btn-default' role='button'>Crear Publicacion</a>
						<a href='form5.php' class='btn btn-default' role='button'>Ver mis Publicaciones</a>
	      	            <label class="list-group-item active">Solicitudes</label>
						<a href='gestionar_solicitudes.php' class='btn btn-default' role='button'>Ver mis Solicitudes</a>
					<?php

					  	if($_SESSION['premium']==0){ 
					  		echo "<label class='list-group-item active'>Usuario Premiun</label>";
					  		echo '<a href="form3.php" class="btn btn-default" role="button">Activar Cuenta Premiun</a>';
						}?>
	      	            <label class="list-group-item active">Tipos de Hospedajes</label>
                        <a href="form4.php" class="btn btn-default" role="button">Ver tipos de hospedajes</a>
						<label class="list-group-item active">Huespedes</label>
						<a href='../form_PuntuarPer.php' class='btn btn-default' role='button'>Puntuar Huespedes</a>
					<br>
					</div>
				</div>
	  			<div class="col-sm-7"> <!-- ITEMS CENTRO -->
					<?PHP require_once 'contr_mostrarMisPub.php';?>

	  			</div>
	  			<div class="col-sm-2">
	  			</div>
	  		</div>
	  	</div>
	</div>
</body>
</html>