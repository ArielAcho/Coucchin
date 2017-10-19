<?php

	function head(){
		?><head>
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
		</head><?PHP
	}

	function navbar(){
		?><nav class="navbar navbar-default navbar-fixed-top  "> <!--Barra de Menu Top-->
  			<div class="container-fluid">
  				<div class="navbar-header pull-left">
      				<a class="navbar-brand" href="#"><?php echo "Bienvenido " .$_SESSION['nom']. "!!!" ?></a>
   				</div>
    			<ul class="nav navbar-nav pull-right "> <!--Menu itemps por derecha-->
					<li><a href="../vistaPublicaciones.php">Entrada</a></li>
					<li><a href="conf_adm.php">Configuraciones</a></li>
					<li><a href="../home.php">Cerrar Sesion</a></li>
					<!--<li><a href="">Contacto</a></li>
					<li><a href=""><img src="../bs/img/g/glyphicons-195-question-sign.png" width="18" height="18"></a></li>-->
    			</ul>

  			</div>
  		</nav><?php
	}

	function tablas($listado){
		?>

			<div class= "row-fluid">
			   <div class="table-responsive">

				<!--<form role="form" name="tabla" method="POST">-->
				<table class="table">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody>
					<?php
						while($row = mysqli_fetch_array($listado)){
							if($row['2']==0){
								$str = "Inhabilitar";
								$est = 1;
							}else{
								$str = "Habilitar";
								$est = 0;
							}
							echo "
									<tr>
										<td>".$row['0']."</td>
										<td>".$row['1']."</td>
										<td>
											<form role='form' method='POST'>
												<input type='hidden' name='email' value='".$row['0']."'>
												<input type='hidden' name='estado' value='".$row['2']."'>
												<input  type='submit' class='btn btn-primary' value='".$str."'>
											</form>
										</td>
									</tr>
								";
						}


					?>
					</tbody>
				</table>
			  </div>
			</div>
		<?php
		}

	function formulario(){?>
		<br><br><br><br><br><br>
					<form name="busqueda" method="POST">
					<center><table border="0" cellpadding="6" cellspacing="0" width="200">
						<tr align="right" valign="top">
						<div class="form-group">
							<div  class="col-xs-offset-3 col-xs-9">
								<td><input type="text" size="15" class="btn btn-default" name="criterio" placeholder="Criterio"></td>
							</div>
						</div>
						</tr>
						<tr>
							<td><p> </p></td>
						</tr>
						<tr>
						<div class="form-group">
							<div  class="col-xs-offset-3 col-xs-9">
								<td align="left" valign="top"><b>Titulo</b></td>
								<td><input type="radio" size="25" class="btn btn-default" value="titulo" name="buscar"> </td>
							</div>
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
								<td align="left" valign="top"><b>Otros</b></td>
								<td><input type="radio" size="25" class="btn btn-default" value="otros" name="buscar" checked></td>
							</div>
						</div>
						</tr>
						<tr>
							<td align="left" valign="top"><b>Fecha Desde:</b></td>
						</tr>
						<tr>
							<td><input type="date" size="15" placeholder="dd/mm/aaaa" class="btn btn-default" clase="cumpleanios" name="fechaini" step="1" min="1990-01-01" max="2020-12-31"></td>
						</tr>
						<tr>
							<td align="left" valign="top"><b>Fecha Hasta:</b></td>
						</tr>
						<tr>
							<td><input type="date" size="15" placeholder="dd/mm/aaaa" class="btn btn-default" clase="cumpleanios" name="fechahast" step="1" min="1990-01-01" max="2020-12-31"></td>
						</tr>
						<tr>
							<td align="left" valign="top"><b>Selecciona:</b></td>
						</tr>
						<tr>
							<td><?php 	require_once "contr_th_tipo.php"	?></td>
						</tr>
						<tr>
							<td><p> </p></td>
						</tr>
						<tr>
						<div class="form-group">
							<div  class="col-xs-offset-3 col-xs-9">
								<td><input type="submit" size="10"class="btn btn-default" value="Buscar"></td>
							</div>
						</div>
						</tr>
					</table></center>
				</form>
	
	<?php
	}

	function desdeHasta(){?>
					<form class="form-inline" method="post">
						<div class="form-group">
							<label class = "alert alert-info"><b>Fecha Desde:</b></label>
							<input type="date" class="form-control" id="desde" name="desde">
						</div>
						<div class="form-group">
							<label class = "alert alert-info"><b>Fecha Hasta:</b></label>
							<input type="date" class="form-control" id="hasta" name="hasta">
						<button type="submit" class="btn btn-primary"><b>Buscar</b></button>
						</div>
					</form>
	<?php
	}

	function enlaces(){?>
					<div class="btn-group-vertical">
	      	            <label class="list-group-item active">Opciones</label>
				        <a href="form1.php" class="btn btn-default" role="button">Modificar Perfil</a>
                        <a href="form2.php" class="btn btn-default" role="button">Cambiar Contraseña</a>
						<a href="../form_usr/formVerPuntuacion.php" class="btn btn-default" role="button">Ver Mis Puntuaciones</a>
                        <label class="list-group-item active">Solicitudes</label>
						<a href='gestionar_solicitudes.php' class='btn btn-default' role='button'>Ver mis Solicitudes</a>
						<a href='misSolicitudesAceptadas.php' class='btn btn-default' role='button'>Ver Solicitudes Aceptadas</a>
						<label class="list-group-item active">Reportes</label>
						<a href='verListaSolicitudes.php' class='btn btn-default' role='button'>Ver Listado de Solicitudes</a>
						<a href='verPremium.php' class='btn btn-default' role='button'>Ver Listado U. Premium</a>
                        <label class="list-group-item active">Publicaciones</label>
						<a href='form6.php' class='btn btn-default' role='button'>Crear Publicaciones</a>
						<a href='form5.php' class='btn btn-default' role='button'>Ver mis Publicaciones</a>
                        <label class="list-group-item active">Usuario</label>
						<a href="habilitarUsuario.php" class="btn btn-default" role="button">Habilitar/Inhabilitar Usuario</a>
						<label class="list-group-item active">Hospedaje</label>	
                        <a href="form13.php" class="btn btn-default" role="button">Agregar Tipo de Hospedaje</a>
				        <a href="form14.php" class="btn btn-default" role="button">Modificar Tipo de Hospedaje</a>
                        <a href="form15.php" class="btn btn-default" role="button">Eliminar Tipo de Hospedaje</a>
						<label class="list-group-item active">Huespedes</label>
						<a href='../form_PuntuarPer.php' class='btn btn-default' role='button'>Puntuar Huespedes</a>
	                    <br>
	      			</div>
	<?php
	}

	function imprimirSolicitudesAceptadas($lista){ #<!-- Modifique este modulo -->
		echo "<br>";
		while($row = mysqli_fetch_array($lista)){
		$fecha=date("d-m-Y", strtotime($row['1']));	

		echo "<div class='row-fluid'>
				<div class='col-sm-6 col-md-4'>
					<div class='thumbnail'>
						<div class='caption'>
							<p ALIGN=left><b>Titulo de la Publicacio: </b>".$row['0']."</p>
							<p ALIGN=left><b>Fecha de Confirmacion: </b>".$fecha."</p>
							<p ALIGN=left><b>Cantidad de Dias: </b> ".$row['4']."</p>
							<br>
							<h5 ALIGN=center><b>Datos del Publicante</b></h5>
							<p ALIGN=left><b>Nombre: </b> ".$row['2']."</p>
							<p ALIGN=left><b>Email: </b> ".$row['3']."</p>
						</div>
					</div>
				</div>
			</div>";
		}
	}

	function imprimirpremium($lista){?> <!-- Modifique este modulo -->
		<div class = 'row' id='usuarios'>
	  		<table class="table table-bordered" style="text-align: center;">
				<thead>
					<tr>
						<th style="text-align: center;">Nombre</th>
						<th style="text-align: center;">Apellido</th>
						<th style="text-align: center;">Email</th>
						<th style="text-align: center;">Fecha</th>
						<th style="text-align: center;">Saldo</th>
					</tr>
				</thead>
			    <tbody>
			<?php	
			$total = 0;
			while($row = mysqli_fetch_array($lista)){
				$nombre = $row['0'];
				$apellido = $row['1'];
				$email = $row['2'];
				$fecha=date("d-m-Y", strtotime($row['3']));
				$saldo = $row['4'];
				$total = $total + $saldo;
				echo "<tr><td>".$nombre."</td>";
				echo "<td>".$apellido."</td>";
				echo "<td>".$email."</td>";
				echo "<td>".$fecha."</td>";
				echo "<td>".$saldo."</td></tr>";
			
			}
			?>
				</tbody>
			</table>
			<?php
					echo "<p><b>Saldo Total: </b>".$total."</p>";
			?>
		</div>
			<a class = "col-sm-2 col-xs-offset-5 btn btn-primary" href="javascript:imprSelec('usuarios')">Imprimir Listado</a>
		
	<?php
	}

	function imprimirlistado($lista){?>
				
	  		<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th >Email Solicitante</th>
						<th >Nombre Solicitante</th>
						<th >Fecha Confirma</th>
						<th >Titulo Publicacion</th>
						<th >Email Publicante</th>
						<th >Nombre Publicante</th>
					</tr>
				</thead>
			    <tbody>
			<?php
			
			while($row = mysqli_fetch_array($lista)){
				$emails = $row['0']; //email solicitante
				$nombres = $row['1']; //nombre solicitante
				$fconfirma=date("d-m-Y", strtotime($row['2'])); #fechaconfirmacion
				$titulop = $row['3']; #titulo de publicacion
				$emailp = $row['4']; #email del publicante
				$nombrep = $row['5']; #nombre publicante
				
				echo "<tr><td>".$emails."</td>";
				echo "<td>".$nombres."</td>";
				echo "<td>".$fconfirma."</td>";
				echo "<td>".$titulop."</td>";
				echo "<td>".$emailp."</td>";
				echo "<td>".$nombrep."</td></tr>";
			
			}
			?>
				</tbody>
			</table>
	<?php
	}

?>