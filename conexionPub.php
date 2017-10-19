<!DOCTYPE html>
<html>
<?php
	/*<a href='detallePub.php?idpub=".$fila['0']."'>*/

class conexionPub{

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
		
		public function puntuarPub($point, $desc, $idpub, $idper){
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha=date('Y-m-d');
			
			$existe="SELECT * FROM da_puntaje WHERE idpublicacion2='$idpub' and idpersona5='$idper'";
			$query="INSERT INTO da_puntaje(descripcion,valor,fecha,idpublicacion2,idpersona5)VALUES('$desc','$point','$fecha','$idpub','$idper')";
			$resultado = $this->conexion->query($existe);
			
			if($row = mysqli_fetch_array($resultado)){
				echo '<script language="javascript">';
				echo 'window.alert("Usted ya puntuo a esta publicacion");';
				echo "location.href='vistaPublicaciones.php';";
				echo '</script>';
			}else{
				$resultado = $this->conexion->query($query);
				$this->UpdtPromedio($idpub);
				echo '<script language="javascript">';
                echo 'window.alert("Operacion realizada con exito");';
                echo "location.href='vistaPublicaciones.php';";
                echo '</script>';
			}
				echo '<script language="javascript">';
				echo 'window.alert("ERROR EN LA BASE DE DATOS");';
				echo "location.href='vistaPublicaciones.php';";
				echo '</script>';
		}
	
		public function fueHuesped($idper, $idpub){
			$query="SELECT * from solicita s INNER JOIN publicacion p on((s.idpublicacion4 = p.idpublicacion)) WHERE idpersona7 = '$idper' and s.estado = 1 and p.idpublicacion = '$idpub'";
			$resultado= $this->conexion->query($query);
			
			if ($row = mysqli_fetch_array($resultado)){
				return 0;
			}
			return 1;
		}
	
		public function UpdtPromedio($idpub){
			$query="SELECT valor FROM da_puntaje WHERE idpublicacion2='$idpub'";
			$res= $this->conexion->query($query);
			$cant= 0; $prom=0;
			while ($row = mysqli_fetch_row($res)){
				$prom=$prom + $row['0']; 
				$cant++;
			}
				$prom=$prom/$cant;
				$updt="UPDATE publicacion SET puntos= '$prom' WHERE idpublicacion = '$idpub'";
				$update = $this->conexion->query($updt);
		}
	
		public function noCalifico($idhue, $idper){
			$query= "SELECT * FROM califica WHERE idp1='$idper' and idp2='$idhue'";
			$res = $this->conexion->query($query);
			
			if ($row = mysqli_fetch_array($res)){
				return 1;
			}
			return 0;
		}
		
		public function listar_huespedes($idper){
			$query = "SELECT idpersona5 from publicacion p INNER JOIN da_puntaje d on((p.idpublicacion = d.idpublicacion2)) WHERE p.idpersona3 = '$idper'";
			$lista= $this->conexion->query($query);
			?>
				<select name= "nom" class="btn btn-default col-xs-9">
					<option value=0>Huespedes</option>
					    <?php 
					    	while($fila=mysqli_fetch_row($lista)){
								$id=$fila['0'];
								if (($this->noCalifico($id, $idper)) == 0){	
									$query2 = "SELECT nombrep FROM persona WHERE idpersona=$id";
									$nom= mysqli_fetch_row($this->conexion->query($query2));
									echo "<option value='$id' name='huesped'>".$nom['0']."</option>";
								}
							}
					    ?>
				</select>
			<?php			
		}
		
		public function puntuar_huesped($idh, $idper, $valor, $descripcion){
			$query = "INSERT INTO califica (idp1, valor, idp2, descripcion) VALUES ('$idper','$valor','$idh', '$descripcion')";
			$resultado=$this->conexion->query($query);
			
				echo '<script language="javascript">';
				echo 'window.alert("Operacion realizada con exito");';
				echo "location.href='vistaPublicaciones.php';";
				echo '</script>';
		}
	
		public function obtener($criterio,$busqueda,$fechaini,$fechahast,$th){
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha=date('Y-m-d'); # fecha de hoy
			$tipo_hospedaje = strlen($th);
			$long_fecha_ini = strlen($fechaini);
			$long_fecha_hast = strlen($fechahast);

			$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0) order by titulo";

			$resultado = $this->conexion->query($query);
			if ($busqueda == 'titulo'){
				if (($long_fecha_ini > 0) and ($long_fecha_hast > 0) and ($tipo_hospedaje >0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0) where (titulo like '%".$criterio."%')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fechaini."' and '".$fechahast."')";
					# consulto por un criterio y por la fecha ini y hasta y el tipo hospedaje
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (titulo like '%".$criterio."%')and(p.fechapubl between '".$fechaini."' and '".$fechahast."')";
					# consulto por un criterio y por la fecha de ini y hasta
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (titulo like '%".$criterio."%')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fechaini."' and '".$fecha."')";
					# consulto por un criterio y por la fecha de ini y la fecha de hoy y el tipo de hospedaje
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (titulo like '%".$criterio."%')and(p.fechapubl between '".$fechaini."' and '".$fecha."')";
					# consulto por un criterio y por la fecha de ini y la fecha de hoy
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (titulo like '%".$criterio."%')and(p.idtipohosp0='".$th."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (titulo like '%".$criterio."%')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fecha."'and'".$fechahast."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (titulo like '%".$criterio."%')and(p.fechapubl between '".$fecha."'and'".$fechahast."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else{
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (titulo like '%".$criterio."%')";
				}
			}
			if ($busqueda == 'descripcion'){
				if (($long_fecha_ini > 0) and ($long_fecha_hast > 0) and ($tipo_hospedaje >0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (descripcion like '%".$criterio."%')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fechaini."' and '".$fechahast."')";
					# consulto por un criterio y por la fecha ini y hasta y el tipo hospedaje
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (descripcion like '%".$criterio."%')and(p.fechapubl between '".$fechaini."' and '".$fechahast."')";
					# consulto por un criterio y por la fecha de ini y hasta
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (descripcion like '%".$criterio."%')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fechaini."' and '".$fecha."')";
					# consulto por un criterio y por la fecha de ini y la fecha de hoy y el tipo de hospedaje
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (descripcion like '%".$criterio."%')and(p.fechapubl between '".$fechaini."' and '".$fecha."')";
					# consulto por un criterio y por la fecha de ini y la fecha de hoy
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (descripcion like '%".$criterio."%')and(p.idtipohosp0='".$th."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (descripcion like '%".$criterio."%')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fecha."'and'".$fechahast."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (descripcion like '%".$criterio."%')and(p.fechapubl between '".$fecha."'and'".$fechahast."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else{
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (descripcion like '%".$criterio."%')";
				}
			}
			if ($busqueda == 'capacidad'){
					if (($long_fecha_ini > 0) and ($long_fecha_hast > 0) and ($tipo_hospedaje >0)){
						$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (capacidad = '".$criterio."')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fechaini."' and '".$fechahast."')";
						# consulto por un criterio y por la fecha ini y hasta y el tipo hospedaje
					}else if(($long_fecha_ini > 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje == 0)){
						$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (capacidad = '".$criterio."')and(p.fechapubl between '".$fechaini."' and '".$fechahast."')";
						# consulto por un criterio y por la fecha de ini y hasta
					}else if(($long_fecha_ini > 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje > 0)){
						$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (capacidad = '".$criterio."')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fechaini."' and '".$fecha."')";
						# consulto por un criterio y por la fecha de ini y la fecha de hoy y el tipo de hospedaje
					}else if(($long_fecha_ini > 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje == 0)){
						$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (capacidad = '".$criterio."')and(p.fechapubl between '".$fechaini."' and '".$fecha."')";
						# consulto por un criterio y por la fecha de ini y la fecha de hoy
					}else if(($long_fecha_ini == 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje > 0)){
						$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (capacidad = '".$criterio."')and(p.idtipohosp0='".$th."')";
						# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
					}else if(($long_fecha_ini == 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje > 0)){
						$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (capacidad = '".$criterio."')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fecha."'and'".$fechahast."')";
						# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
					}else if(($long_fecha_ini == 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje == 0)){
						$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (capacidad = '".$criterio."')and(p.fechapubl between '".$fecha."'and'".$fechahast."')";
						# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
					}else{
						$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (capacidad = '".$criterio."')";
					
				}
			}
			if ($busqueda == 'direccion'){
				if (($long_fecha_ini > 0) and ($long_fecha_hast > 0) and ($tipo_hospedaje >0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (direccion) like '%".$criterio."%')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fechaini."' and '".$fechahast."')";
					# consulto por un criterio y por la fecha ini y hasta y el tipo hospedaje
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (direccion like '%".$criterio."%')and(p.fechapubl between '".$fechaini."' and '".$fechahast."')";
					# consulto por un criterio y por la fecha de ini y hasta
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (direccion like '%".$criterio."%')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fechaini."' and '".$fecha."')";
					# consulto por un criterio y por la fecha de ini y la fecha de hoy y el tipo de hospedaje
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (direccion like '%".$criterio."%')and(p.fechapubl between '".$fechaini."' and '".$fecha."')";
					# consulto por un criterio y por la fecha de ini y la fecha de hoy
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (direccion like '%".$criterio."%')and(p.idtipohosp0='".$th."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (direccion like '%".$criterio."%')and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fecha."'and'".$fechahast."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (direccion like '%".$criterio."%')and(p.fechapubl between '".$fecha."'and'".$fechahast."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else{
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where (direccion like '%".$criterio."%')";
				}
			}
			if($busqueda =='otros'){
				if (($long_fecha_ini > 0) and ($long_fecha_hast > 0) and ($tipo_hospedaje >0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0) where ((direccion like '%".$criterio."%')or(capacidad like '%".$criterio."%')or(descripcion like '%".$criterio."%')or(titulo like '%".$criterio."%')or(th.nombre like '%".$criterio."%'))and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fechaini."' and '".$fechahast."')";
					# consulto por un criterio y por la fecha ini y hasta y el tipo hospedaje
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0) where ((direccion like '%".$criterio."%')or(capacidad like '%".$criterio."%')or(descripcion like '%".$criterio."%')or(titulo like '%".$criterio."%')or(th.nombre like '%".$criterio."%'))and(p.fechapubl between '".$fechaini."' and '".$fechahast."')";
					# consulto por un criterio y por la fecha de ini y hasta
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0) where ((direccion like '%".$criterio."%')or(capacidad like '%".$criterio."%')or(descripcion like '%".$criterio."%')or(titulo like '%".$criterio."%')or(th.nombre like '%".$criterio."%'))and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fechaini."' and '".$fecha."')";
					# consulto por un criterio y por la fecha de ini y la fecha de hoy y el tipo de hospedaje
				}else if(($long_fecha_ini > 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0) where ((direccion like '%".$criterio."%')or(capacidad like '%".$criterio."%')or(descripcion like '%".$criterio."%')or(titulo like '%".$criterio."%')or(th.nombre like '%".$criterio."%'))and(p.fechapubl between '".$fechaini."' and '".$fecha."')";
					# consulto por un criterio y por la fecha de ini y la fecha de hoy
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast == 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where ((direccion like '%".$criterio."%')or(capacidad like '%".$criterio."%')or(descripcion like '%".$criterio."%')or(titulo like '%".$criterio."%')or(th.nombre like '%".$criterio."%'))and(p.idtipohosp0='".$th."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje > 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where ((direccion like '%".$criterio."%')or(capacidad like '%".$criterio."%')or(descripcion like '%".$criterio."%')or(titulo like '%".$criterio."%')or(th.nombre like '%".$criterio."%'))and(p.idtipohosp0='".$th."')and(p.fechapubl between '".$fecha."'and'".$fechahast."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else if(($long_fecha_ini == 0)and ($long_fecha_hast > 0) and ($tipo_hospedaje == 0)){
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where ((direccion like '%".$criterio."%')or(capacidad like '%".$criterio."%')or(descripcion like '%".$criterio."%')or(titulo like '%".$criterio."%')or(th.nombre like '%".$criterio."%'))and(p.fechapubl between '".$fecha."'and'".$fechahast."')";
					# consulto por un criterio y por el hospedaje si solo existe el hospedaje y no ingresa la fecha
				}else{
					$query = "SELECT * from publicacion p inner join tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0)where ((direccion like '%".$criterio."%')or(capacidad like '%".$criterio."%')or(descripcion like '%".$criterio."%')or(titulo like '%".$criterio."%')or(th.nombre like '%".$criterio."%'))";
				}
			}

			$resultado = $this->conexion->query($query);
			
			

		?>
			<div class="text-center">
				<ul class="list-group">
	  				<li class="list-group-item btn btn-primary active"><label for="sel1">Publicaciones</label></li>
	  				<br>
						    <?php 
						    while($fila=mysqli_fetch_row($resultado)){  
								$fecha=date("d-m-Y", strtotime($fila['5']));
						     	//echo "<li class='list-group-item' value='".$fila['2']."'>"." ".$fila['4']." Fecha: ".$fila['5']."</li>";
								if(($fila['5'] >= "2016-01-01")&&($fila['5'] <= "2016-12-31") && ($fila['11'] == '0')){
                                	#echo "<br><br><a href='detallePub.php?idpub=".$fila['0']."' ><div class='thumbnail'><img src ='bs/img/".$fila['1']."'></a><div class='caption'><h3>".$fila['3']."</h3><p><li class='list-group-item'>Descripcion: ".$fila['4']."</li></p><p><li class='list-group-item'>Fecha: ".$fila['5']."</li></p><p><li class='list-group-item'>Tipo Hospedaje: ".$fila['12']."</li></p></div></div>";
                                	$rest = substr($fila['4'], 0, 18);
                                	echo "<div class='row-fluid' style='width: 800px; height: 500px;'>
											<div class='col-sm-6 col-md-4'><div class='thumbnail'>
												<a href='detallePub.php?idpub=".$fila['0']."' >
												<img src='bs/img/".$fila['1']."'  style='width: 200px; height: 150px;'></a>
												<div class='caption'>
													<h4 ALIGN=center>".$fila['3']."</h4>
													<p ALIGN=left><b>Descripcion: </b> ".$rest."</p>
													<p ALIGN=left><b>Fecha: </b>".$fecha."</p>
													<p ALIGN=left><b>Tipo Hospedaje: </b> ".$fila['13']."</p>
												</div>
											</div>
										</div>";
                                }
                            }
							?>
				</ul>
			</div>
		<?php

		}
	
		public function yaPuntue($idpub, $idper){
			$query = "SELECT * FROM da_puntaje WHERE idpublicacion2='$idpub' and idpersona5='$idper'";
			$res = $this->conexion->query($query);
			
			if ($row = mysqli_fetch_array($res)){
				return 1;
			}
			return 0;
		}
				
		public function detalle_pub($idpub){
			$query ="SELECT * from publicacion p INNER JOIN tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0) order by titulo";
			$resultado = $this->conexion->query($query);
			?>
				<ul class="list-group">
						<?php 
						    while($fila=mysqli_fetch_row($resultado)){
								$fecha=date("d-m-Y", strtotime($fila['5']));	
						     	if ($fila['0'] == $idpub){
									if(($fila['5'] >= "2016-01-01")&&($fila['5'] <= "2016-12-31")){
										echo "<br><br><br><br>
										<div class='row-fluid'>
											<center>
											<div class='thumbnail col-lg-4'>
												<p class='alert alert-info'>Titulo: ".$fila['3']."</p>
												<img src ='bs/img/".$fila['1']."'> <br>
												<a href='form_verPuntuacionPub.php?idpub=".$fila['0']."' class='btn btn-primary btnfulll' role='button'>Puntuaciones</a>";
											if($_SESSION['id'] != $fila['7']){
												echo "<a href='formEnviarPreg.php?idpub=".$fila['0']."' class='btn btn-primary btnfulll' role='button'>Enviar Pregunta</a>";
												if ($_SESSION['adm'] == 0){
													echo "<a href='form_usr/formEnviarSol.php?idpub=".$fila['0']."' class='btn btn-primary btnfulll' role='button'>Enviar Solicitud</a>";
													if (($this->fueHuesped($_SESSION['id'],$idpub) == 0) and ($this->yaPuntue($idpub, $_SESSION['id']) == 0)){
														echo "<a href='form_puntuarPub.php?idpub=".$fila['0']."' class='btn btn-primary btnfulll' role='button'>Puntuar</a>";
													}
												}else {
													echo "<a href='form_adm/formEnviarSol.php?idpub=".$fila['0']."' class='btn btn-primary btnfulll' role='button'>Enviar Solicitud</a>";
													if (($this->fueHuesped($_SESSION['id'],$idpub)) == 0){
														echo "<a href='form_puntuarPub.php?idpub=".$fila['0']."' class='btn btn-primary btnfulll' role='button'>Puntuar</a>";
													}
												}
											}
									  echo "</div>
											</center>
											<div class='row-fluid col-lg-8'>
												<center> 
												<p class='alert alert-info'>Informacion</p>
												</center>
												<div class='col-lg-6'>
													<div class='caption'>
														<li>Descripcion: ".$fila['4']."</li>
														<br>
														<li>Direccion: ".$fila['8']."</li>
														<br>
														<li>Capacidad: ".$fila['10']."</li>
													</div>
												</div>
												<div class='col-lg-3'>
													<div class='caption'>
														<li>Fecha: ".$fecha."</li>
														<br>
														<li>Puntos: ".$fila['2']."</li>
														<br>
														<li>Tipo Hospedaje: ".$fila['13']."</li>
													</div>
												</div>
											</div>
												<div class='row-fuid col-lg-12'>
													<center><p class='alert alert-info'>Comentarios</p></center>";
													$this->mostrarPreg($idpub);	
									echo		"</div>
											</div>
										</div>";
										
                                }
									
								}
                            }
							?>
				</ul>
		<?php
		}
	
		private function esMiPub($idpub){
			$query="SELECT idpersona3 FROM publicacion WHERE idpublicacion = '$idpub'";
			$res= $this->conexion->query($query);
			if ($row = mysqli_fetch_array($res)){
				if ($row['0'] == $_SESSION['id']){
					return 0;
				}
			}
			return 1;
		}
	
		private function mostrarPreg($idpub){
			$query="SELECT * FROM pregunta pr INNER JOIN persona p on (pr.idpersona4 = p.idpersona)  WHERE idpublicacion1 = '$idpub'";
			$lista= $this->conexion->query($query);
			$traje = 0;
			while($fila=mysqli_fetch_row($lista)){
				$fecha=date("d-m-Y", strtotime($fila['2']));
				?>
				<div class='col-sm-12 col-md-12'>
					<div class='thumbnail'>	
						<div class='caption'>
							<p>Mensaje de <?php echo $fila['6'] ?>  /  Fecha:<?php echo $fecha ?></p>
							<center>
							<p><?php echo $fila['1'] ?></p>
						</div>
							</center>	
					<?php
					$this->traerResp($fila['0'], $traje);
					if (($traje == 0) and ($this->esMiPub($idpub)) == 0){
						?>
						<center><button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Responder</button></center>
  							<div id="demo" class="collapse">
							<form id="registro" name="registro"  class="form-horizontal" action = "contrl_enviarResp.php?idpub=<?php echo $_GET['idpub'];?>&idpreg=<?php echo $fila['0'] ?>" method = "post">	
				    			<div class="form-group"> <!-- Selecciona fecha -->
									<div class="col-xs-12">
										<label>respuesta:</label> 
										<textarea class="form-control" rows="4" id="comment" name="descr"></textarea>
									</div>
								</div>
				    			<div class="form-group">
									<div class="col-xs-12">
										<center>
										<input id="registrar" type="button" class="btn btn-primary" value="Enviar" onclick="validarMensaje()"> <!-- Envia el Formulario con los datos ingresados-->
										<input type="reset" class="btn btn-primary" value="Limpiar"> <!-- Resetea el Formulario -->
										</center>
									</div>
				    			</div>
							</form>
							</div>
							</div>
						<?php
					}?>
					</div>
				</div> <?php
			}
				
		}
	
		private function traerResp($idpreg, &$traje){
			$query="SELECT * FROM responde r INNER JOIN persona p on (r.idpersona2 = p.idpersona) WHERE idpregunta1='$idpreg' order by fecha_resp";
			$lista= $this->conexion->query($query);
			while ($resp=mysqli_fetch_row($lista)){
					$fecha=date("d-m-Y", strtotime($resp['2']));
					?>
					<div class='thumbnail'>	
						<div class='caption'>
							<p>Respuesta de <?php echo $resp['7'] ?>  /  Fecha:<?php echo $fecha ?></p>
							<center>
							<p><?php echo $resp['1'] ?></p>
							</center>
						</div>
					</div>
			<?php
			$traje = 1;
			}
		}
	
		public function mostrarMisPub($idper){
			$query ="SELECT * from publicacion p INNER JOIN tipohospedaje th on(th.idtipohospedaje = p.idtipohosp0) order by titulo";
			$resultado = $this->conexion->query($query);
			$no = 0;
			?>
			<div class="text-center">
				<ul class="list-group">
						<?php
						    while($fila=mysqli_fetch_row($resultado)){
						     	if ($fila['7'] == $idper){
									if(($fila['5'] >= "2016-01-01")&&($fila['5'] <= "2016-12-31")){
										$fecha=date("d-m-Y", strtotime($fila['5']));
										if ($fila['11'] == '0'){ 
                                			$rest = substr($fila['4'], 0, 18);
                                			echo "<div class='row-fluid' style='width: 800px; height: 500px;'>
													<div class='col-sm-6 col-md-4'>
														<div class='thumbnail'>
															<a href='../detallePub.php?idpub=".$fila['0']."' ><img src='../bs/img/".$fila['1']."'  style='width: 200px; height: 150px;'></a>
															<div class='caption'>
																<h4 ALIGN=center>".$fila['3']."</h4>
																<p ALIGN=left><b>Descripcion: </b> ".$rest."</p>
																<p ALIGN=left><b>Fecha: </b>".$fecha."</p>
																<p ALIGN=left><b>Puntos: </b> ".$fila['2']."</p>
																<p ALIGN=left><b>Tipo Hospedaje: </b> ".$fila['13']."</p>
																<p ALIGN=left><b>Capacidad: </b>".$fila['10']."</p>
																<a href='contr_borrarPub.php?idpub=".$fila['0']."'class='btn btn-danger btnfull' role='button'>Despublicar</a><a href='modPub.php?".http_build_query(array('publi'=>$fila))."' class='btn btn-primary' role='button'>Modificar</a>
															</div>
														</div>
													</div>";
										}else{
											$rest = substr($fila['4'], 0, 18);
                                			echo "<div class='row-fluid' style='width: 800px; height: 500px;'>
													<div class='col-sm-6 col-md-4'>
														<div class='thumbnail'>
															<a href='../detallePub.php?idpub=".$fila['0']."' ><img src='../bs/img/".$fila['1']."'  style='width: 200px; height: 150px;'></a>
															<div class='caption'>
																<h4 ALIGN=center>".$fila['3']."</h4>
																<p ALIGN=left><b>Descripcion: </b> ".$rest."</p>
																<p ALIGN=left><b>Fecha: </b>".$fecha."</p>
																<p ALIGN=left><b>Puntos: </b> ".$fila['2']."</p>
																<p ALIGN=left><b>Tipo Hospedaje: </b> ".$fila['13']."</p>
																<p ALIGN=left><b>Capacidad: </b>".$fila['10']."</p>
																<a href='contr_actPub.php?idpub=".$fila['0']."' class='btn btn-success' role='button'>Publicar</a>
																<a href='modPub.php?".http_build_query(array('publi'=>$fila))."' class='btn btn-primary' role='button'>Modificar</a>																
															</div>
														</div>
													</div>";
										}
										$no = 1;
									}	
								}
                          	}
							if ($no == 0) {
								echo "<div class='alert alert-info'>
									Usted no tiene publicaciones.
									</div>";
							}
						?>
				</ul>
			</div>
		<?php	
		}
	
		public function crear_pub($titulo,$descrip,$th,$direc,$url,$capacidad){
			$idper= $_SESSION['id'];
			$adm= $_SESSION['premium'];
			$puntos= '0';
			$resp='imagen00.png';
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha=date('Y-m-d');
			if($adm == 0){
				$query ="INSERT INTO Publicacion(imagen,puntos,titulo,descripcion,fechapubl,idtipohosp0,idpersona3,direccion,respaldo,capacidad) VALUES('$resp','$puntos','$titulo','$descrip','$fecha','$th','$idper','$direc','$url','$capacidad')";
			}else{
				$query ="INSERT INTO Publicacion(imagen,puntos,titulo,descripcion,fechapubl,idtipohosp0,idpersona3,direccion,respaldo,capacidad) VALUES('$url','$puntos','$titulo','$descrip','$fecha','$th','$idper','$direc','$url','$capacidad')";
			}
			$this->conexion->query($query);
		}
	
		public function mod_pub($titulo,$descrip,$th,$direc,$url,$capacidad,$idP){
			$idper= $_SESSION['id'];
			$adm= $_SESSION['premium'];
			$resp='imagen00.png';
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha=date('Y-m-d');
			if($adm == 0){
				$query ="UPDATE publicacion SET imagen = '$resp',titulo = '$titulo', descripcion = '$descrip', direccion = '$direc',capacidad='$capacidad' WHERE idpublicacion='$idP'";
			}else{
				$query ="UPDATE publicacion SET imagen = '$url',titulo = '$titulo', descripcion = '$descrip', direccion = '$direc',capacidad='$capacidad'WHERE idpublicacion='$idP'";
			}
			
			$this->conexion->query($query);
		}
	
	    public function borrarPub($idpub){
			$existe="SELECT * from publicacion where idpublicacion='$idpub'";
			$query= "UPDATE publicacion SET Estado = '1' WHERE idpublicacion = '$idpub'";
			$resultado = $this->conexion->query($existe);
			

			if($row = mysqli_fetch_array($resultado)){
				if($row['idpublicacion']==$idpub){
						$resultado = $this->conexion->query($query);
				        echo '<script language="javascript">';
                        echo 'window.alert("Operacion realizada con exito");';
                        echo "location.href='form5.php';";
                        echo '</script>';
					
				}else{
				    echo '<script language="javascript">';
                    echo 'window.alert("La publicacion no existe");';
                    echo "location.href='form5.php';";
                    echo '</script>';
				}
			}
            echo '<script language="javascript">';
            echo 'window.alert("ERROR EN BASE DE DATOS");';
            echo "location.href='form5.php';";
            echo '</script>';
		}
	
		public function activarPub($idpub){
			$existe="SELECT * from publicacion where idpublicacion='$idpub'";
			$query= "UPDATE publicacion SET Estado = '0' WHERE idpublicacion = '$idpub'";
			$resultado = $this->conexion->query($existe);
			

			if($row = mysqli_fetch_array($resultado)){
				if($row['idpublicacion']==$idpub){
						$resultado = $this->conexion->query($query);
				        echo '<script language="javascript">';
                        echo 'window.alert("Operacion realizada con exito");';
                        echo "location.href='form5.php';";
                        echo '</script>';
					
				}else{
				    echo '<script language="javascript">';
                    echo 'window.alert("La publicacion no existe");';
                    echo "location.href='form5.php';";
                    echo '</script>';
				}
			}
            echo '<script language="javascript">';
            echo 'window.alert("ERROR EN BASE DE DATOS");';
            echo "location.href='form5.php';";
            echo '</script>';
		}
		
		public function enviarPreg($desc, $idpub, $idper){
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha = date('Y-m-d');
			$query="INSERT INTO pregunta (mensaje, fecha, idpersona4, idpublicacion1) VALUES ('$desc', '$fecha', '$idper', '$idpub')";
			$this->conexion->query($query);
			echo '<script language="javascript">';
			echo 'window.alert("Operacion realizada con exito");';
			echo "location.href='detallePub.php?idpub=".$idpub."';";
			echo '</script>';
			
		}
	
		public function enviarResp($desc, $idpub, $idpreg, $idper){
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha = date('Y-m-d');
			$query="INSERT INTO responde (mensaje, fecha_resp, idpublicacion0, idpersona2, idpregunta1) VALUES ('$desc', '$fecha', '$idpub', '$idper', '$idpreg')";
			if ($desc != ''){	
				$this->conexion->query($query);
				echo '<script language="javascript">';
				echo 'window.alert("Operacion realizada con exito");';
				echo "location.href='detallePub.php?idpub=".$idpub."';";
				echo '</script>';
			}else {
				echo '<script language="javascript">';
				echo 'window.alert("Debe ingresar un mensaje");';
				echo "location.href='detallePub.php?idpub=".$idpub."';";
				echo '</script>';
			}
		}
		
		public function mostrarPuntajePub($idpub){
			$query = "SELECT * from da_puntaje c INNER JOIN persona p on (c.idpersona5 = p.idpersona) WHERE idpublicacion2 = '$idpub'";
			$res = $this->conexion->query($query);
				?> <br><br><br><br><br>
				<div class = 'row' id='usuarios'>
	  				<table class="table table-bordered" style="text-align: center;">
					<thead>
						<tr>
							<th style="text-align: center;">Nombre</th>
							<th style="text-align: center;">valor</th>
							<th style="text-align: center;">Descripcion</th>
						</tr>
						</thead>
						<tbody>
				<?php	
				while($row = mysqli_fetch_array($res)){
					$nombre = $row['7'];
					$valor = $row['2'];
					$descripcion = $row['1'];
					echo "<tr><td>".$nombre."</td>";
					echo "<td>".$valor."</td>";
					echo "<td>".$descripcion."</td>";

				}
				?>
					</tbody>
				</table>
			<?php
			}
	
		public function mostrarDondeHospede($idPer){
			$consulta="SELECT idpublicacion4 from solicita WHERE idpersona7 ='$idPer' AND estado= 1";
			$resultado = $this->conexion->query($consulta);
			if($row = mysqli_fetch_array($resultado)){
				$resultado = $this->conexion->query($consulta);
				while($row = mysqli_fetch_array($resultado)){
					$obtPub = "SELECT * from publicacion where idpublicacion=".$row['0']."";
					$idPub = $this->conexion->query($obtPub);
					if ($fila = mysqli_fetch_array($idPub)){
						$rest = substr($fila['4'], 0, 18);
						$fecha=date("d-m-Y", strtotime($fila['5']));
						echo "<div class='row-fluid' style='width: 800px; height: 500px;'>
								<div class='col-sm-6 col-md-4'>
									<div class='thumbnail'>
										<a href='../detallePub.php?idpub=".$fila['0']."' ><img src='../bs/img/".$fila['1']."'  style='width: 200px; height: 150px;'></a>
										<div class='caption'>
											<h4 ALIGN=center>".$fila['3']."</h4>
											<p ALIGN=left><b>Descripcion: </b> ".$rest."</p>
											<p ALIGN=left><b>Fecha: </b>".$fecha."</p>
											<p ALIGN=left><b>Puntos: </b> ".$fila['2']."</p>
											<p ALIGN=left><b>Capacidad: </b>".$fila['10']."</p>
										</div>
									</div>
								</div>";
					}
				}
			}else{
				echo '<script language="javascript">';
                echo 'window.alert("Usted no se hospedo en ningun couch");';
                echo "location.href='form5.php';";
                echo '</script>';
			}

		}
	
}
?></html>










