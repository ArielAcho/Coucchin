<!DOCTYPE html>
<?PHP
		session_start();
		if($_SESSION == Array()){
		header("Location: /my-site/home.php");
		}
		require_once 'funciones.php';
		require_once '../solicitud.php';
?>
<html>
	<?php	head(); ?>
	<body>
		<div class="container">
			<?php 
			navbar();
			?>
			<br><br><br><br><br><br>
			<div class="row-fluid">
				<div class= "col-sm-2">
					<?php enlaces();?>
				</div>
				<div class= "col-sm-1">
				</div>
				<div class= "col-sm-8">
					<nav class="navbar">
			  			<div class="container-fluid">
				    		<legend>Listado de Solicitudes</legend>
			  			</div>
					</nav>
			
				<?php
						# SE MODIFICO ESTA PAGINA // IMPORTAR
						$solicitud = new solicitud();
						desdeHasta();
						if((isset($_POST['desde']))and(isset($_POST['hasta']))){
							$desde = $_POST['desde'];
							$hasta = $_POST['hasta'];
						}else if((!isset($_POST['desde']))and(!isset($_POST['hasta']))){
							$hasta = date("Y/m/d");
							$año =date('Y')-1;
							$mes =date('m');
							$dia =date('d');
							$desde= $año."/0".$mes."/".$dia;
						}
						$listado = $solicitud-> obtenerSolicitud($desde,$hasta);
						imprimirlistado($listado);

				?>
				</div>
				<div class= "col-sm-1">	
					<?php
					?>
				</div>
			</div>
		</div>
	</body>
</html>