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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
					</nav>
<?php enlaces() ?>
	  			</div>
	  			<div class="col-xs-2 col-md-2">
	  			</div>
	  			<div class="col-xs-5 col-md-5">
	  				<br>
	  				<nav class="navbar">
		  				<div class="container-fluid">
			    			 <legend>Modificar Publicacion</legend>
		  				</div>
					</nav>
					<form name="crear_pub"  class="form-horizontal col-sm-12" action = "../contr_mod_pub.php" method = "POST" enctype="multipart/form-data">   
					    <input type="hidden" name="idP" value="<?php echo $_GET['publi']['0'] ?>">
						<div class="form-group">
					        <label class="control-label col-xs-3">Titulo:</label>
					        <div class="col-xs-9">
					            <input type="text" size="50" class="btn btn-default" name= "titulo" placeholder="Titulo" value="<?php echo $_GET['publi']['3']; ?>"
					        </div>
					    </div>
					    <div class="form-group"> 
					        <label class="control-label col-xs-3">Descripcion:</label>
					        <div class="col-xs-9">
					            <input type="text" size="50" class="btn btn-default input-lg" name="descripcion" placeholder="Descripcion" value="<?php echo $_GET['publi']['4']; ?>"
					        </div>
					    </div>
					    <div class="form-group">
					        <label class="control-label col-xs-3">Agrega Imagen:</label>
					        <div class="col-xs-3">
					            <input type="file" size="50" class="btn btn-default" name="alex" value="<?php echo $_GET['publi']['1']; ?>"
					        </div>
					    </div>
					    <div  class="form-group">
  							<label class="control-label  col-xs-offset-">Seleccionar:</label>
							 <div class="col-xs-offset-2" >  
								<?php require_once '../contr_th_tipo.php';?>
							</div>
						</div>
					    <div class="form-group"> 
					        <label class="control-label col-xs-3">Direccion:</label>
					        <div class="col-xs-9">
					            <input type="text" size="50" class="btn btn-default" name="direccion" placeholder="Direccion" value="<?php echo $_GET['publi']['8'] ?>">
					        </div>
					    </div>
						<div class="form-group"> 
					        <label class="control-label col-xs-3">Capacidad:</label>
					        <div class="col-xs-9">
					           <input type="text" size="50" class="btn btn-default" name="capacidad" placeholder="Direccion" value="<?php echo $_GET['publi']['10'] ?>">
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-xs-offset-3 col-xs-9">
					            <input type="submit" class="btn btn-default" value="Enviar" onclick="return validarCrearPub(this.form.alex.value)"> <!-- Envia el Formulario con los datos ingresados-->
					            <input type="reset" class="btn btn-default" value="Limpiar"> <!-- Resetea el Formulario -->
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