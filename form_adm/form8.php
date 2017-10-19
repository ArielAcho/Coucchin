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
      				<a class="navbar-brand" href="conf_usr.php"><?php echo "Bienvenido " .$_SESSION['nom']. "!!!" ?></a>
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
  		<br><br><br><br><?php /* print_r( $_SESSION); */?><br><br>	
		<div class="container">
            <div class="col-xs-3 col-md-3">
<?php enlaces() ?>
	  			</div>
	  			<div class="col-xs-1 col-md-1">
	  			</div>
	  			<div class="col-xs-5 col-md-5">
	  				<br>
	  				<nav class="navbar">
		  				<div class="container-fluid">
			    			 <legend>Modificar Perfil de Usuario</legend>
		  				</div>
					</nav>
					<?php
					if($_SESSION['modificarUsuario']==True){?>
						<form id="mod_perf_user" name="mod_perf_user"  class="form-horizontal" action = "contr_mod_usr.php" method = "post">
						<div class="form-group"> <!-- Ingresa ingresa e-mail-->
					        <label class="control-label col-xs-3">Email de Usuario:</label>
					        <div class="col-xs-9">
					            <input type="text" class="btn btn-default" name="email" placeholder="Email">
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-xs-offset-3 col-xs-9">
					            <input id="registrar" type="submit" class="btn btn-default" value="Enviar" onclick="#"> <!-- Envia el Formulario con los datos ingresados-->
					            <input type="reset" class="btn btn-default" value="Limpiar"> <!-- Resetea el Formulario -->
					        </div>
					    </div>
					</form><?php
					}
					else{#planilla de modificar usuario con datos para Luciano ver scripts
						$preMod=$_SESSION['premiumParaMod'];
						#unset($_SESSION['premiumParaMod']);
						$passMod=$_SESSION['passwordParaMod'];
						$fecNacMod=$_SESSION['fechaNacParaMod'];
						$emailMod=$_SESSION['emailParaMod'];
						$apeMod=$_SESSION['apellidoParaMod'];
						$nomMod=$_SESSION['nombreParaMod'];
						?><form id="registro"	 name="registro"  class="form-horizontal" action = "contr_mod_usr_adm.php" method = "post" >
						
							<div class='form-group'><label class='control-label col-xs-3'>Email:</label>
								<div class='col-xs-9'>
									<input type='text' class='btn btn-default' name='email' placeholder='Email' <?php echo "value='".$emailMod."'";  ?> > 
								</div>
							</div>
						
							<div class='form-group'><label class='control-label col-xs-3'>Password:</label>
								<div class='col-xs-9'>
									<input type='text' class='btn btn-default' name='pass1' placeholder='Password' <?php echo "value='".$passMod."' "; ?> >
								</div>
							</div>
							<div class='form-group'><label class='control-label col-xs-3'>Nombre:</label>
								<div class='col-xs-9'>
							    	<input type='text' class='btn btn-default' name= 'nom' placeholder='Nombre'<?php echo "value='".$nomMod."' "?> >
							    </div>
							</div>
							<div class='form-group'><label class='control-label col-xs-3'>Apellido:</label>
								<div class='col-xs-9'>
							    	<input type='text' class='btn btn-default' name='ape' placeholder='Apellido' <?php echo "value='".$apeMod."' " ?> >
							  	</div>
							</div>
							<div class='form-group'><label class='control-label col-xs-3'>Fecha Nacimiento:</label>
								<div class='col-xs-3'>
							    	<input type='date' placeholder='dd/mm/aaaa' class='btn btn-default' clase='cumpleanios' name='fecha' step='1' min='1900-01-01' max='1998-12-31' <?php echo "value='".$fecNacMod."' "?> >
							    </div>
							</div>
							<div class='form-group'>
								<div class='col-xs-offset-3 col-xs-9'>
									<input id='registrar' type='submit' class='btn btn-default' value='Enviar'>
									<input type='reset' class='btn btn-default' value='Limpiar'>
								</div>
							</div>
						</form>
						<?php
					
					}
					/*if($_SESSION['estado']=='0'){?> <form id="mod_perf_user" name="mod_perf_user"  class="form-horizontal" action = "contr_mod_usr.php" method = "post">    		
						<div class="form-group"> <!-- Ingresa ingresa e-mail-->
					        <label class="control-label col-xs-3">Email de Usuario:</label>
					        <div class="col-xs-9">
					            <input type="text" class="btn btn-default" name="email" placeholder="Email">
					        </div><!-- El Administrador debe ingresar el email de la persona que desea modificar en el sistema-->
					    </div>
					    <div class="form-group">
					        <div class="col-xs-offset-3 col-xs-9">
					            <input id="registrar" type="submit" class="btn btn-default" value="Enviar" onclick="#"> <!-- Envia el Formulario con los datos ingresados-->
					            <input type="reset" class="btn btn-default" value="Limpiar"> <!-- Resetea el Formulario -->
					        </div>
					    </div>
					</form><?php }else{ echo 'hola';} */?>
					<br>
	  			</div>
	  			<div class="col-xs-3 col-md-3">
	  			</div>
	   		</div>
	  	</div>
	</div>
</body>
<script src="#"></script>
</html>