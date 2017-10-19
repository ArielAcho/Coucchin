<?php

	function head(){
		?><head>
			<title>Couchinn</title>
			<meta charset="utf-8">
			<link rel="shortcut icon" href="bs/img/cube.png">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="bs/css/bootstrap-theme.css">
			<link rel="stylesheet" type="text/css" href="bs/css/bootstrap-theme.min.css">
			<!--<link rel="stylesheet" type="text/css" href="../bs/css/bootstrap-responsive.css">-->
			<script src="bs/js/jquery.min.js"></script>
			<script src="bs/js/bootstrap.min.js"></script>
			<script src="bs/js/bootstrap.js"></script>
		</head><?PHP
	}

	function navbar(){
		?><nav class="navbar navbar-default navbar-fixed-top  "> <!--Barra de Menu Top-->
  			<div class="container-fluid">
    			<ul class="nav navbar-nav pull-right "> <!--Menu itemps por derecha-->
                    <li><a href="#" onclick="history.back()">Atras</a></li>
                    <?php
					  	if($_SESSION['adm']==0){ echo '<li><a href="form_usr/conf_usr.php">Configuraciones</a>';}else{echo '<li><a href="form_adm/conf_adm.php">Configuraciones</a>';}
						?>
					<li><a href="home.php">Cerrar sesion</a></li>
                    <!--<li><a href="#">Contacto</a></li>
					<li><a href="home.php"><img src="bs/img/g/glyphicons-195-question-sign.png" width="18" height="18"></a></li>-->
                </ul>
    			<div class="navbar-header pull-left">
  <!--Hay que agregar el link--><a class="navbar-brand" href="#"><?php echo "Bienvenido " .$_SESSION['nom']. "!!!" ?></a>
   				</div>
  			</div>
		</nav><?php
	}

	function formulario(){
		?> <br><br><br><br><br><br>
				<form name="busqueda" method="POST">
			<center><input type="text" size="18" class="btn btn-default" name="criterio" placeholder=""><input type="submit" size="10"class="btn btn-primary" value="Buscar" onclick="return validarBusqueda()"></center><br>
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">  
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Criterio</a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse in">
						<div class="panel-body">
							<tr>
								<div class="form-group">
									<div  class="col-xs-offset-3 col-xs-9">
										<td align="left" valign="top"><b>Titulo</b></td>
										<td><input type="radio" size="25" class="btn btn-default" value="titulo" name="buscar"> </td>
									</div></div>
							</tr>
							<tr>
								<div class="form-group">
									<div  class="col-xs-offset-3 col-xs-9">
										<td align="left" valign="top"><b>Descripcion</b></td>
										<td><input type="radio" size="25" class="btn btn-default" value="descripcion" name="buscar"> </td>
									</div>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<div  class="col-xs-offset-3 col-xs-9">
										<td align="left" valign="top"><b>Capacidad</b></td>
										<td><input type="radio" size="25" class="btn btn-default" value="capacidad" name="buscar"> </td>
									</div>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<div  class="col-xs-offset-3 col-xs-9">
										<td align="left" valign="top"><b>Direccion</b></td>
										<td><input type="radio" size="25" class="btn btn-default" value="direccion" name="buscar"> </td>
									</div>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<div  class="col-xs-offset-3 col-xs-9">
										<td align="left" valign="top" ><b>Otros</b></td>
										<td><input checked type="radio" size="25" class="btn btn-default" value="otros" name="buscar"> </td>
									</div>
								</div>
							</tr>
						</div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					Fecha desde:</a>
				  </h4>
				</div>
				<div id="collapse2" class="panel-collapse collapse">
					<div class="panel-body">
								<tr>
									<td><input type="date" size="15" placeholder="dd/mm/aaaa" class="btn btn-default" clase="cumpleanios" name="fechaini" step="1" min="1990-01-01" max="2020-12-31"></td>
								</tr>
					</div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
					Fecha hasta:</a>
				  </h4>
				</div>
				<div id="collapse3" class="panel-collapse collapse">
					<div class="panel-body">
								<tr>
									<td><input type="date" size="15" placeholder="dd/mm/aaaa" class="btn btn-default" clase="cumpleanios" name="fechahast" step="1" min="1990-01-01" max="2020-12-31"></td>
								</tr>
					</div>
				</div>
			  </div>
				  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
					Tipo Hosp:</a>
				  </h4>
				</div>
				<div id="collapse4" class="panel-collapse collapse">
					<div class="panel-body">
								<tr>
									<td><?php 	require_once "contr_th_tipo.php"	?></td>
								</tr>
								<tr>
									<td><p> </p></td>
								</tr>
					</div>
				</div>
			  </div>
				</div>
									<tr>
								<div class="form-group">
									<div  class="col-xs-offset-3 col-xs-9">
										<td></td>
									</div>
								</div>
								</tr>
				</form><?php
	}

?>