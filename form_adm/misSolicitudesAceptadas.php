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
			<br><br><br><br><br>
			<div class="row-fluid">
				<div class= "col-sm-2">
					<?php enlaces();?>
				</div>

				<div class= "col-sm-1">
				</div>
				<div class= "col-sm-8">
					<nav class="navbar">
				  		<div class="container-fluid">
					    	<legend>Listado de Mis Solicitudes aceptadas</legend>
				  		</div>
					</nav>
				<?php
					desdehasta();
					$sol = new solicitud();

					if((isset($_POST['desde']))and(isset($_POST['hasta']))){
						$desde = $_POST['desde'];
						$hasta = $_POST['hasta'];
					}else if((!isset($_POST['desde']))and(!isset($_POST['hasta']))){
						$hasta = date("Y/m/d");
						$año =date('Y');
						$mes =date('m')-1;
						$dia =date('d');
						$desde= $año."/0".$mes."/".$dia;
					}
					$listado = $sol->misSolicitudesAceptadas( $_SESSION['id'],$desde,$hasta); # retorna el listado de todas las solicitudes confirmadas
					imprimirSolicitudesAceptadas($listado);
				
				?>
				</div>	
				<div class= "col-sm-1">	
				</div>
			</div>
		</div>
	</body>
</html>