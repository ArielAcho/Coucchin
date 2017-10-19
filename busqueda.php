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
<form name="busqueda" method="POST">
	<!--<center><table border="0" cellpadding="6" cellspacing="0" width="200">-->
	<td><center><input type="text" size="15" class="btn btn-default" name="criterio" placeholder=""></td></center>
	<div class="panel-group" id="accordion">
		<div class="panel panel-default col-xs-offset-3 col-xs-9">
			<div class="panel-heading">  
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Criterio</a>
		  		</h4>
			</div>
			<div id="collapse1" class="panel-collapse collapse">
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
	  <div class="panel panel-default col-xs-offset-3 col-xs-9">
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
	  <div class="panel panel-default col-xs-offset-3 col-xs-9">
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
		  <div class="panel panel-default col-xs-offset-3 col-xs-9">
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
								<td><input type="submit" size="10"class="btn btn-primary" value="Buscar" onclick="return validarBusqueda()"></td>
							</div>
						</div>
						</tr>
</form>
</body>
</html>