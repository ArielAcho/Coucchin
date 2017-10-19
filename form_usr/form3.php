<!DOCTYPE html>
<?php
	session_start();
require_once 'funciones.php';
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
			    			 <legend>Activar cuenta Premium</legend>
		  				</div>
					</nav><!-- ***modificaciones de Walter ser_premium***-->
					<form id="pago" name="pago"  class="form-horizontal" action = "contr_pago.php" method = "post">    		
					    <div class="form-group"> <!-- Ingresa nro de tarjeta-->
					        <label class="control-label col-xs-3">Número de Tarjeta:</label>
					        <div class="col-xs-9">
					            <input type="text" class="btn btn-default" name="nro_tarjeta" placeholder="Número de tarjeta">
					        </div>
					    </div>
					    <div class="form-group"> <!-- Ingresa marca-->
					        <label class="control-label col-xs-3">Numero de seguridad:</label>
					        <div class="col-xs-9">
					            <input type="text" class="btn btn-default" name= "nseg" placeholder="Numero de seguridad">
					        </div>
					    </div>
					    <div class="form-group"> <!-- Ingresa tipo de cuenta-->
					        <label class="control-label col-xs-3">Tipo de cuenta:</label>
					        <div class="col-xs-9">
					            <select class = "btn btn-default" name="tipo_cuen" >
									<option>Cuenta corriente</option>
									<option>Caja de ahorro</option>
								</select>
					        </div>
					    </div>
					    <div class="form-group"> <!-- ingresa banco-->
					        <label class="control-label col-xs-3">Banco:</label>
					        <div class="col-xs-3">
					            <input type="text" placeholder="Banco" class="btn btn-default" name="banco">
					        </div>
					    </div>
					    <div class="form-group"> <!-- ingresa la cantidad de saldo-->
					        <label class="control-label col-xs-3">Precio:</label>
					      <!--  <li class= "btn btn-default" name="saldo" values="500">500</li>-->
					        <div class="col-xs-3">
					            <select class = "btn btn-default"name="saldo" value="500">
									<option>500</option>
								</select>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-xs-offset-3 col-xs-9">
					            <input id="registrar" type="submit" class="btn btn-primary" value="Enviar" onclick="return validarPago()"> <!-- Envia el Formulario con los datos ingresados-->
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
<script src="../JS/validarPago.js"></script>
</body>
</html>