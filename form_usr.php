<!DOCTYPE html>
<html>
<?php
	function mod_datos(){
?>
		<br>
		<br>
		<br>	
		<div class="row-fluid">	<!--Cuerpo de Pagina -->
	    	<div class="col-sm-4"> <!-- Cuerpo Izquierdo --> 
	    	</div>
	    	<div class="col-sm-4"> <!-- Cuerpo Central -->
	    		<div class="row">
	  				<nav class="navbar">
		  				<div class="container-fluid">
			    			 <legend>Registrate</legend>
		  				</div>
					</nav>
					<form id="mod_perf" name="mod_perf"  class="form-horizontal" action = "#" method = "post">    		
					    <div class="form-group"> <!-- Ingresa ingresa e-mail-->
					        <label class="control-label col-xs-3">Email:</label>
					        <div class="col-xs-9">
					            <input type="email" class="btn btn-default" name="email" placeholder="Email">
					        </div>
					    </div>
					    <div class="form-group"> <!-- Ingresa nombre-->
					        <label class="control-label col-xs-3">Nombre:</label>
					        <div class="col-xs-9">
					            <input type="text" class="btn btn-default" name= "nom" placeholder="Nombre">
					        </div>
					    </div>
					    <div class="form-group"> <!-- Ingresa apellido-->
					        <label class="control-label col-xs-3">Apellido:</label>
					        <div class="col-xs-9">
					            <input type="text" class="btn btn-default" name="ape" placeholder="Apellido">
					        </div>
					    </div>
					    <div class="form-group"> <!-- Selecciona fecha de nacimiento-->
					        <label class="control-label col-xs-3">Fecha Nacimiento:</label>
					        <div class="col-xs-3">
					            <input type="date" placeholder="dd/mm/aaaa" class="btn btn-default" clase="cumpleanios" name="fecha" step="1" min="1900-01-01" max="2000-12-31">
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-xs-offset-3 col-xs-9">
					            <input id="registrar" type="submit" class="btn btn-default" value="Enviar" onclick="return validarRegistro()"> <!-- Envia el Formulario con los datos ingresados-->
					            <input type="reset" class="btn btn-default" value="Limpiar"> <!-- Resetea el Formulario -->
					        </div>
					    </div>
					</form>
					<br>
				</div>
			</div>
	    	<div class="col-sm-4"> <!-- Cuerpo Derecho -->
		   	</div>
		</div>
		<br>
		<br>
		<br>
<?php
}
	function camb_pass(){
?>
		<br>
		<br>
		<br>	
		<div class="row-fluid">	<!--Cuerpo de Pagina -->
	    	<div class="col-sm-4"> <!-- Cuerpo Izquierdo --> 
	    	</div>
	    	<div class="col-sm-4"> <!-- Cuerpo Central -->
	    		<div class="row">
	  				<nav class="navbar">
		  				<div class="container-fluid">
			    			 <legend>Cambiar Contraseña</legend>
		  				</div>
					</nav>
					<form id="camb_pass" name="camb_pass"  class="form-horizontal" action = "#" method = "post">    		
					    <div class="form-group"> <!-- Ingresa password-->
					        <label class="control-label col-xs-3">Nueva Password:</label>
					        <div class="col-xs-9">
					            <input type="password" class="btn btn-default" name="pass1" placeholder="Password">
					        </div>
					    </div>
					    <div class="form-group"> <!-- Ingresa password-->
					        <label class="control-label col-xs-3">Confirmar Password:</label>
					        <div class="col-xs-9">
					            <input type="password" class="btn btn-default" name="pass2" placeholder="Confirmar Password">
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-xs-offset-3 col-xs-9">
					            <input id="registrar" type="submit" class="btn btn-default" value="Enviar" onclick="return validarRegistro()"> <!-- Envia el Formulario con los datos ingresados-->
					            <input type="reset" class="btn btn-default" value="Limpiar"> <!-- Resetea el Formulario -->
					        </div>
					    </div>
					</form>
					<br>
				</div>	
			</div>
	    	<div class="col-sm-4"> <!-- Cuerpo Derecho -->
		   	</div>
		</div>
		<br>
		<br>
		<br>
<?php
}
	function act_premiun(){
?>
<?php
}
?>






































	
	

</html>