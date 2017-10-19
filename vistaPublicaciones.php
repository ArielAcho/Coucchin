<!DOCTYPE html>
<?PHP
		
		require_once 'funciones.php';
		require 'conexionPub.php';
		$criterio ="";
		$buscar="otros";
		$fechaini = "";
		$fechahast = "";
		$th = "";
?>
<html>
	<?php	head(); ?>
	<body>
		<div class="container">
			<?php 
			navbar();
			?>
			<div class="row-fluid">
				<div class= "col-sm-3">
					<?php formulario();?>
				</div>
				<div class= "col-sm-1">
				</div>
				<div class= "col-sm-9">
				<br><br><br><br><br><br>
				<?php
				$pub = new conexionPub;
					if($_POST != null){
						$criterio = $_POST['criterio'];
						$buscar = $_POST['buscar'];
						if( $_POST['fechaini'] <= $_POST['fechahast']){			
							$fechaini = $_POST['fechaini'];
							$fechahast = $_POST['fechahast'];
						}else{
							$fechaini =$_POST['fechahast'];
							$fechahast =$_POST['fechaini'];
						}

						$th = $_POST['th'];
					}
					$pub->obtener($criterio,$buscar,$fechaini,$fechahast,$th);
				?>
				</div>
			</div>
		</div>
	</body>