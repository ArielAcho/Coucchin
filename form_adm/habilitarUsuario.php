<!DOCTYPE html>
<?PHP
		session_start();
		if($_SESSION == Array()){
		header("Location: /my-site/home.php");
		}
		require_once 'funciones.php';
		require_once '../conexion.php';
?>
<html>
	<?php	head(); ?>
	<body>
		<div class="container">
			<?php 
			navbar();
			?>
			<br><br><br><br><br>
			<div class="row-fluid">
				<div class= "col-sm-2">
					<?php enlaces();?>
				</div>

				<div class= "col-sm-2">
				</div>
				<div class= "col-sm-6">
				<?php
					$persona = new conexion();
					$habilitados = $persona->habilitados();
					$inhabilitados = $persona->inhabilitados();

					echo "<h2>Usuarios Inhabilitados</h2>";
					tablas($inhabilitados);
					echo "<h2>Usuarios Habilitados</h2>";
					tablas($habilitados);


					if(isset($_POST["email"])){
						if(isset($_POST["estado"])){
							if($_POST["estado"]==0){
								$estado = 1;
							}else{
								$estado = 0;
							}
						}
						$persona->modificarEstado($_POST["email"],$estado);
					}
				?>
				</div>	
				<div class= "col-sm-2">	
				</div>
			</div>
		</div>
	</body>
</html>