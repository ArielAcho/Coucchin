<?php

	function enlaces(){?>
		<div class="btn-group-vertical">
	    	<div class="list-group-item active">Opciones</div>
			<a href="form1.php" class="btn btn-default" role="button">Modificar Perfil</a>
			<a href="formVerPuntuacion.php" class="btn btn-default" role="button">Ver Mis Puntuaciones</a>
			<a href="form2.php" class="btn btn-default" role="button">Cambiar Contraseña</a>
	        <label class="list-group-item active">Publicaciones</label>
			<a href='form6.php' class='btn btn-default' role='button'>Crear Publicacion</a>
			<a href='vista_donde_hospede.php' class='btn btn-default' role='button'>Ver donde me hospede</a>
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
	<?php
		
} ?>
