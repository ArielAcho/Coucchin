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
					<li><a href="conf_usr.php">Configuraciones</a></li>
					<li><a href="../home.php">Cerrar Sesion</a></li>
				</ul>
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
	  			<div class="col-xs-5 col-md-5">
	  				<br>
	  				<nav class="navbar">
		  				<div class="container-fluid">
			    			 <legend>Crear Publicacion</legend>
		  				</div>
					</nav>
					<form name="crear_pub"  class="form-horizontal col-sm-12" action = "../contr_crear_pub.php" method = "POST" enctype="multipart/form-data">   
					    <div class="form-group">
					        <label class="control-label col-xs-3">Titulo:</label>
					        <div class="col-xs-9">
					            <input type="text" size="42" class="btn btn-default" name= "titulo" placeholder="Titulo">
					        </div>
					    </div>
					    <div class="form-group"> 
					        <label class="control-label col-xs-3">Descripcion:</label>
					        <div class="col-xs-9">
					            <input type="text" size="42" class="btn btn-default input-lg" name="descripcion" placeholder="Descripcion">
					        </div>
					    </div>
					    <div class="form-group">
					        <label class="control-label col-xs-3">Agrega Imagen</label>
					        <div class="col-xs-3">
					            <input type="file" size="45" class="btn btn-default" name="alex" placeholder="Imagen">
					        </div>
					    </div>
					    <div class="form-group">
  							<label class="control-label col-xs-3">Seleccionar: </label>
							    <?php require_once '../contr_th_tipo.php';?>
						</div>
					    <div class="form-group"> 
					        <label class="control-label col-xs-3">Direccion:</label>
					        <div class="col-xs-9">
					            <input type="text" size="42" class="btn btn-default" name="direccion" placeholder="Direccion">
					        </div>
					    </div>
						<div class="form-group"> 
					        <label class="control-label col-xs-3">Capacidad:</label>
					        <div class="col-xs-9">
					            <input type="text" size="42" class="btn btn-default" name="capacidad" placeholder="Capacidad">
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-xs-offset-3 col-xs-9">
					            <input type="submit" class="btn btn-primary" value="Enviar" onclick="return validarCrearPub(this.form.alex.value)"> <!-- Envia el Formulario con los datos ingresados-->
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
	</div>
</body>
<script src="../JS/validarCrearPublicacion.js"></script>
</html>