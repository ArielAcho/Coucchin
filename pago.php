<?php
class pago{
		private $servidor = "localhost";
		private $usuario = "root";
		private $clave = "";
		private $base = "couchinn";
		private $conexion;
			

		public function __construct(){

		 	$this->conexion = new mysqli($this->servidor, $this->usuario, $this->clave,$this->base);

			if ($this->conexion->connect_error){
				die("Fallo la conexion a la base de datos");
			}
		}
	
		public function registrar($nro_tarjeta,$marca,$tipo_cuen,$banco,$saldo,$idper){

			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$hoy=date('Y-m-d');
			$query_pago="INSERT INTO pago(fecha,saldo,numtarjeta,idpersona1)VALUES('$hoy','$saldo','$nro_tarjeta','$idper')";
			$query_tarjeta="INSERT INTO tarjeta(numtarjeta,marca,tipo_c,banco,idpersona0)VALUES('$nro_tarjeta','$marca','$tipo_cuen','$banco','$idper')";
			$query_premium="UPDATE persona SET premiunp='1' WHERE idpersona='$idper'";
	
			$this->conexion->query($query_pago);
			$this->conexion->query($query_tarjeta);
			$this->conexion->query($query_premium);

			$direccion = "SELECT p.idpublicacion, p.idpersona3, p.imagen, p.respaldo FROM publicacion p WHERE idpersona3='$idper'";
			$url= $this->conexion->query($direccion);
			
			while($fila=mysqli_fetch_row($url)){
				$idpub=$fila['0'];
				$actualizar=$fila['3'];
				$query_pub="UPDATE publicacion SET imagen='$actualizar' WHERE idpublicacion='$idpub'";
				$this->conexion->query($query_pub);
		}
		}
	
		public function cerrar(){

			$this->conexion->close();

		}
	
}
?>