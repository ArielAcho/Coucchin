<!DOCTYPE html>
<html>
<?php
	/*<a href='detallePub.php?idpub=".$fila['0']."'>*/

class conexionPreg{

		private $servidor = "localhost";
		private $usuario = "root";
		private $clave = "";
		private $base = "couchinn";
		private $conexion;
		private $user;
		private $password;		

		public function __construct(){

		 	$this->conexion = new mysqli($this->servidor, $this->usuario, $this->clave, $this->base);

			if ($this->conexion->connect_error){
				die("Fallo la conexion a la base de datos");
			}

		}
	
		public function cerrar(){

			$this->conexion->close();

		}

		public function mostrarMisPreguntas($idPer){ //y respuestas
			$query ="SELECT * from publicacion WHERE idpersona3 = '$idPer'";
			$resultado = $this->conexion->query($query);
			$cont=0;//para contar si no hay publicaciones con preguntas/respuestas
			if ($row = mysqli_fetch_array($resultado)){
				$resultado = $this->conexion->query($query);
				while($rowPublis = mysqli_fetch_array($resultado)){ //iteracion de mis publicaciones
					$ids=$rowPublis['idpublicacion'];
					$otraQuery = "SELECT * FROM pregunta INNER JOIN responde ON (pregunta.idpublicacion1 = '$ids' AND responde.idpublicacion0 = '$ids') ";//revisar
					$resultadoPregs=$this->conexion->query($otraQuery);
					if($rowPregs = mysqli_fetch_array($resultadoPregs)){
						$cont=$cont+1;
						$resultadoPregs=$this->conexion->query($otraQuery);
						while($rowPregs = mysqli_fetch_array($resultadoPregs)){
							echo $rowPregs['mensaje'];//******Poner en un recuadro e imprimir publicacion original*****
						}
					}
					if($cont=0){
						echo '<script language="javascript">';
					echo 'window.alert("Usted no tiene publicaciones con preguntas");';
					echo "location.href='conf_usr.php';";
					echo '</script>';
					}
				}
				
			}
			else{
				echo '<script language="javascript">';
				echo 'window.alert("Usted no tiene publicaciones");';
				echo "location.href='conf_usr.php';";
				echo '</script>';
			}

		}
		
		
}
?></html>