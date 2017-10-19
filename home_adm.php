<!DOCTYPE html>
<?php
	session_start();
	require_once 'form_usr.php';
?>
<html>
<head>
	<title>Couchinn</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="bs/img/cube.png">
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
	<div class="container">
	   	<nav class="navbar navbar-default navbar-fixed-top  "> <!--Barra de Menu Top-->
  			<div class="container-fluid">
  				<div class="navbar-header pull-left">
      				<a class="navbar-brand" href="#">Bienvenido !!!</a>
   				</div>
    			<ul class="nav navbar-nav pull-right "> <!--Menu itemps por derecha-->
					<li><a href="#">Entrada</a></li>
					<li><a href="#">Configuraciones</a></li>
					<li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>
					<li><a href="">Contacto</a></li>
					<li><a href=""><img src="bs/img/g/glyphicons-195-question-sign.png" width="18" height="18"></a></li>
    			</ul>
    		</div>
  		</nav>
  		<br><br><br>

  		<div class="container">
		  	<h4>Opciones</h4>
		  	<ul class="nav nav-tabs">
			 	<li><a data-toggle="tab" href="#menu1" class="">Modificar Datos Personales</a></li>
			    <li><a data-toggle="tab" href="#menu2" class="">Cambiar Contraseña</a></li>
			    <li><a data-toggle="tab" href="#menu3" class="">Activar C.Premiun</a></li>
			</ul>
		  	<div class="tab-content">
			    <div id="menu1" class="tab-pane fade">
					<?php mod_datos(); ?>
			    </div>
			    <div id="menu2" class="tab-pane fade">
			    	<?php camb_pass();?>
			    </div>
			    <div id="menu3" class="tab-pane fade">
			    </div>
			</div>
		</div>
		<div class="container">	
			<h4>Publicacion</h4>
		  	<ul class="nav nav-tabs">
			    <li><a data-toggle="tab" href="#menu4" class="">Crear Publicacion</a></li>
			    <li><a data-toggle="tab" href="#menu5" class="">Modificar Publicacion</a></li>
			    <li><a data-toggle="tab" href="#menu6" class="">Eliminar Publicacion</a></li>
			</ul>
		  	<div class="tab-content">
			    <div id="menu4" class="tab-pane fade">
			    </div>
			    <div id="menu5" class="tab-pane fade">
			    </div>
			    <div id="menu6" class="tab-pane fade">
			    </div>
			</div>
		</div>
		<div class="container">
			<h4>Usuarios</h4>
		  	<ul class="nav nav-tabs">
			    <li><a data-toggle="tab" href="#menu7" class="">Crear Publicacion</a></li>
			</ul>
			<div class="tab-content">
			    <div id="menu7" class="tab-pane fade">
			    </div>
			</div>
		</div>

  		<div class="container">
		  	<h4>Administrar Usuarios</h4>
		  	<ul class="nav nav-tabs">
			    <li><a data-toggle="tab" href="#menu101" class="pull-center">Modificar Usuario</a></li>
			    <li><a data-toggle="tab" href="#menu102" class="">Eliminar Usuario</a></li>
			    <li><a data-toggle="tab" href="#menu103" class="">Modificar Publicacion de Usuario</a></li>
			    <li><a data-toggle="tab" href="#menu104" class="">Eliminar Publicacion de Usuario</a></li>
			</ul>
		  	<div class="tab-content">
			    <div id="menu101" class="tab-pane fade">
			    </div>
			    <div id="menu102" class="tab-pane fade">
			    </div>
			    <div id="menu103" class="tab-pane fade">
			    </div>			    
			    <div id="menu104" class="tab-pane fade">
			    </div>
			</div>
		</div>
		<div class="container">	
			<h4>Administrar Tipo de Hospedaje</h4>
		  	<ul class="nav nav-tabs">
			    <li><a data-toggle="tab" href="#menu104" class="">Crear Tipo de Hospedaje</a></li>
			    <li><a data-toggle="tab" href="#menu105" class="">Modificar Tipo de Hospedaje</a></li>
			    <li><a data-toggle="tab" href="#menu106" class="">Eliminar Tipo de Hospedaje</a></li>
			</ul>
		  	<div class="tab-content">
			    <div id="menu104" class="tab-pane fade">
			    </div>
			    <div id="menu105" class="tab-pane fade">
			    </div>
			    <div id="menu106" class="tab-pane fade">
			    </div>
			</div>
		</div>
		<div class="container">	
			<h4>Administrar Listados</h4>
		  	<ul class="nav nav-tabs">
		  		<li><a data-toggle="tab" href="#menu107" class="">Listar Usuarios</a></li>
			    <li><a data-toggle="tab" href="#menu108" class="">Listar Info. Publicacion</a></li>
			    <li><a data-toggle="tab" href="#menu109" class="">Listar Solicitudes</a></li>
			</ul>
		  	<div class="tab-content">
			    <div id="menu107" class="tab-pane fade">
			    </div>
			    <div id="menu108" class="tab-pane fade">
			    </div>
			    <div id="menu109" class="tab-pane fade">
			    </div>
			</div>
		</div>


	</div>

<script src="bs/js/jquery.min.js"></script>
<script src="bs/js/bootstrap.min.js"></script>
<script src="bs/js/bootstrap.js"></script>
</body>
</html>