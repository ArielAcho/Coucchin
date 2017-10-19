<?php
class solicitud{
		private $servidor = "localhost";
		private $usuario = "root";
		private $clave = "";
		private $base = "couchinn";
		private $conexion;
		private $email;
		private $password;		

		public function __construct(){

		 	$this->conexion = new mysqli($this->servidor, $this->usuario, $this->clave,$this->base);

			if ($this->conexion->connect_error){
				die("Fallo la conexion a la base de datos");
			}

		}
    
		public function cerrar(){

			$this->conexion->close();

		}
	
		public function misSolicitudesAceptadas($idper,$desde,$hasta){ #modifique los criterios de la busqueda
			$inicio= strlen($desde);
			$fin= strlen($hasta);
			if(($inicio > 0)and($fin > 0)){ # busca un listado entre los parametros desde y hasta , no impreme las solicitudes de los usuarios baneados 
				$query="SELECT pu.titulo, s.fecha_confirmacion, pers.nombrep, pers.emailp, s.cant_dias from persona p inner join solicita s on(p.idpersona=s.idpersona7) inner join publicacion pu on(pu.idpublicacion = s.idpublicacion4) inner join persona pers on(pu.idpersona3=pers.idpersona) where p.idpersona='$idper' and s.estado = '1' and (pers.baneadop='0') and (s.fecha_confirmacion between '$desde'and'$hasta') order by s.fecha_confirmacion";
			}if(($inicio > 0)and($fin == 0)){ # busca un listado entre los parametros desde y hasta , no impreme las solicitudes de los usuarios baneados , busca desde una fecha
				$query="SELECT pu.titulo, s.fecha_confirmacion, pers.nombrep, pers.emailp, s.cant_dias from persona p inner join solicita s on(p.idpersona=s.idpersona7) inner join publicacion pu on(pu.idpublicacion = s.idpublicacion4) inner join persona pers on(pu.idpersona3=pers.idpersona) where p.idpersona='$idper' and s.estado = '1' and (pers.baneadop='0') and (s.fecha_confirmacion >= '$desde') order by s.fecha_confirmacion";
			}if(($inicio == 0)and($fin > 0)){ # busca un listado entre los parametros desde y hasta , no impreme las solicitudes de los usuarios baneados , busca hasta una fecha
				$query="SELECT pu.titulo, s.fecha_confirmacion, pers.nombrep, pers.emailp, s.cant_dias from persona p inner join solicita s on(p.idpersona=s.idpersona7) inner join publicacion pu on(pu.idpublicacion = s.idpublicacion4) inner join persona pers on(pu.idpersona3=pers.idpersona) where p.idpersona='$idper' and s.estado = '1' and (pers.baneadop='0') and (s.fecha_confirmacion <= '$hasta') order by s.fecha_confirmacion";
			}if(($inicio == 0)and($fin == 0)){ # busca un listado entre los parametros desde y hasta , no impreme las solicitudes de los usuarios baneados , muestra todas las solicitudes
				$query="SELECT pu.titulo, s.fecha_confirmacion, pers.nombrep, pers.emailp, s.cant_dias from persona p inner join solicita s on(p.idpersona=s.idpersona7) inner join publicacion pu on(pu.idpublicacion = s.idpublicacion4) inner join persona pers on(pu.idpersona3=pers.idpersona) where p.idpersona='$idper' and s.estado = '1' and (pers.baneadop='0') order by s.fecha_confirmacion";
			}

			$resultado = $this->conexion->query($query);
			return $resultado;
		}
	
		public function obtenerSolicitud($desde,$hasta){ #modifique los criterios de la busqueda
			$inicio= strlen($desde);
			$fin= strlen($hasta);
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$hoy=date('Y-m-d'); # fecha de hoy
			
			if(($inicio > 0)and($fin > 0)){ # busca un listado entre los parametros desde y hasta , no impreme las solicitudes de los usuarios baneados 
				$query = "SELECT p.emailp as emailsolicitante,p.nombrep as nombresolicitante,s.fecha_solicitud as fechaconfirmacion,pu.titulo as titulopublicado,pers.emailp as emailpublica,pers.nombrep as nombrepublica, s.estado as estado FROM solicita s inner join persona p on (s.idpersona7=p.idpersona) inner join publicacion pu on (s.idpublicacion4 = pu.idpublicacion) inner join persona pers on(pu.idpersona3=pers.idpersona) where (s.estado = '1') and (s.fecha_solicitud between '$desde' and '$hasta')and (p.baneadop = '0') and (pers.baneadop='0')";	
			}
			else if(($inicio > 0)and($fin == 0)){ # busca desde esa fecha en adelante , no impreme las solicitudes de los usuarios baneados 
				$query ="SELECT p.emailp as emailsolicitante,p.nombrep as nombresolicitante,s.fecha_solicitud as fechaconfirmacion,pu.titulo as titulopublicado,pers.emailp as emailpublica,pers.nombrep as nombrepublica, s.estado as estado FROM solicita s inner join persona p on (s.idpersona7=p.idpersona) inner join publicacion pu on (s.idpublicacion4 = pu.idpublicacion) inner join persona pers on(pu.idpersona3=pers.idpersona) where (s.estado = '1') and (s.fecha_solicitud >= '$desde') and (p.baneadop = '0') and (pers.baneadop='0')";		
			}
			else if(($inicio == 0)and($fin > 0)){ # busca todos hasta una fecha , no impreme las solicitudes de los usuarios baneados 
				$query ="SELECT p.emailp as emailsolicitante,p.nombrep as nombresolicitante,s.fecha_solicitud as fechaconfirmacion,pu.titulo as titulopublicado,pers.emailp as emailpublica,pers.nombrep as nombrepublica, s.estado as estado FROM solicita s inner join persona p on (s.idpersona7=p.idpersona) inner join publicacion pu on (s.idpublicacion4 = pu.idpublicacion) inner join persona pers on(pu.idpersona3=pers.idpersona) where (s.estado = '1') and (s.fecha_solicitud <= '$hasta') and (p.baneadop = '0') and (pers.baneadop='0')";		
			}
			else if(($inicio == 0)and($fin == 0)){ # Muestra Todo el listado , no impreme las solicitudes de los usuarios baneados 
				$query="SELECT p.emailp as emailsolicitante,p.nombrep as nombresolicitante,s.fecha_solicitud as fechaconfirmacion,pu.titulo as titulopublicado,pers.emailp as emailpublica,pers.nombrep as nombrepublica, s.estado as estado FROM solicita s inner join persona p on (s.idpersona7=p.idpersona) inner join publicacion pu on (s.idpublicacion4 = pu.idpublicacion) inner join persona pers on(pu.idpersona3=pers.idpersona) where (s.estado = '1') and (p.baneadop = '0') and (pers.baneadop='0')";
			}
			$resultado = $this->conexion->query($query);
			return $resultado;
		}
		
		public function enviar_solicitud($id, $idpub, $fecha, $cant){
			$query="INSERT INTO solicita(estado,fecha_solicitud,fecha_confirmacion,cant_dias,idpublicacion4,idpersona7)VALUES('0','$fecha','$fecha','$cant','$idpub','$id')";
			$existe="SELECT idsolicita from solicita where fecha_solicitud='$fecha' and idpublicacion4='$idpub' and idpersona7='$id'";
			$resultado = $this->conexion->query($existe);
			
			if($fecha == 0){
				echo '<script language="javascript">';
                echo 'window.alert("Debe ingresar una fecha");';
                echo "window.location='formEnviarSol.php?idpub=$idpub';";
                echo '</script>';
				return false;
			}
			
			if($row = mysqli_fetch_array($resultado)){
				echo '<script language="javascript">';
                echo 'window.alert("Usted ya envio una solicitud con esa fecha");';
                echo "window.location='formEnviarSol.php?idpub=$idpub';";
                echo '</script>';
				return false;
			}else {
				$this->conexion->query($query);
				echo '<script language="javascript">';
                echo 'window.alert("operacion realizada con exito");';
                if ($_SESSION['adm'] == 0){
					echo "window.location='conf_usr.php';";
				}else{
					echo "window.location='conf_adm.php';";
				}
                echo '</script>';
				return true;
			}
		}
		
		public function verSolicitudesDe($id){
			$consult ="SELECT * from publicacion where idpersona3 = '$id'";
			#$consult ="SELECT idpublicacion from publicacion where idpersona3 = '$id'";
			$resultado = $this->conexion->query($consult);
			$fila=mysqli_fetch_row($resultado);
			if (count($fila) == 0){
    			echo '<script language="javascript">';
                echo 'window.alert("Usted no tiene Publicaciones");';
                echo "location.href='conf_usr.php';";
                echo '</script>';
			}
			else{
				#echo "<li class='list-group-item active btn btn-primary'><label for='sel1'>Solicitudes de Mis Hospedajes</label></li>";
				echo "<legend>Listado de Mis Solicitudes</legend>";
				$resultado = $this->conexion->query($consult);
    			while($filaPublis=mysqli_fetch_row($resultado)){
    				$idPu=$filaPublis['0'];
    				$consultB="SELECT * from solicita s inner join persona p on(s.idpersona7 = p.idpersona) where s.idpublicacion4='$idPu'";
    				$resultadoB = $this->conexion->query($consultB);
    				?><div class="text-center">
						<?php
					while($solis=mysqli_fetch_row($resultadoB)){
    					$fechaPub=date("d-m-Y", strtotime($filaPublis['5']));
						$fechaSol=date("d-m-Y", strtotime($solis['2']));
						if($solis['1']==0){
							echo "<div class='row-fluid' style='width: 800px; height: 500px;'>
									<div class='col-sm-6 col-md-4'>
										<div class='thumbnail'>
											<div class='caption'>
												<h3>".$filaPublis['3']."</h3>
												<p>Solicitante: ".$solis['8']."</p>
												<p>Fecha Publicacion: ".$fechaPub."</p>
												<p>Fecha Solicitud: ".$fechaSol."</p>
												<p>Cantidad de dias: ".$solis['4']."</p><br><br>
											</div>
											<a href='../contr_gest_solicit.php?idsol=".$solis['0']."&acept=1' class='btn btn-success' role='button'>Aceptar</a>
											<a href='../contr_gest_solicit.php?idsol=".$solis['0']."&acept=0' class='btn btn-danger' size='10' role='button'>Rechazar</a>
										</div>
									</div>";
						}
						else{
							echo"<div class='row-fluid' style='width: 800px; height: 500px;'>
									<div class='col-sm-6 col-md-4'>
										<div class='caption'>
											<div class='thumbnail'>
												<h3>".$filaPublis['3']."</h3> <p class='alert alert-info'>Solicitud aceptada</p>
												<p>Solicitante: ".$solis['8']."</p>
												<p>Fecha Publicacion: ".$fechaPub."</p>
												<p>Fecha Solicitud: ".$fechaSol."</p>
												<p>Cantidad de dias: ".$solis['4']."</p><br>
											</div>
										</div>
									</div>";
						}
    				} 
    			}
			}
		}	
		
		public function aceptarSolicitud($idS){
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha=date('Y-m-d');
			$upd="UPDATE solicita SET estado='1', fecha_confirmacion ='$fecha' WHERE idsolicita='$idS'";#borrar las otras solicitudes
			$resul=$this->conexion->query($upd);
			$busq="SELECT * FROM solicita WHERE idsolicita='$idS'";
			$idPubBor=$this->conexion->query($busq);
			$so=mysqli_fetch_row($idPubBor);
			$busc="DELETE FROM solicita WHERE estado='0' and idsolicita!='$idS' and idpublicacion4='".$so['4']."' and fecha_solicitud='".$so['2']."'";
			$this->conexion->query($busc);
			echo '<script language="javascript">';
            echo "window.location='form_usr/gestionar_solicitudes.php';";
            echo 'window.alert("Operacion realizada con exito");';
            echo '</script>';
		}
	
		public function rechazarSolicitud($idS){
			$existe="SELECT * FROM solicita WHERE idsolicita='$idS'";
			$query="DELETE FROM solicita WHERE idsolicita='$idS'";
			$resultado = $this->conexion->query($existe);
			if($row = mysqli_fetch_array($resultado)){
				if($row['idsolicita']==$idS){
						$this->conexion->query($query);
				        echo '<script language="javascript">';
                        echo 'window.alert("Operacion realizada con exito");';
                        echo "location.href='form_usr/gestionar_solicitudes.php';";
                        echo '</script>';
					
				}else{
				    echo '<script language="javascript">';
                    echo 'window.alert("La publicacion no existe");';
                    echo "location.href='form_usr/gestionar_solicitudes';";
                    echo '</script>';
				}
			}
            echo '<script language="javascript">';
            echo 'window.alert("ERROR EN BASE DE DATOS");';
            echo "location.href='form_usr/gestionar_solicitudes';";
            echo '</script>';
		}
}
?>