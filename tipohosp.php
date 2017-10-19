<!DOCTYPE html>
<html>
<?php
class tipohosp{
		private $servidor = "localhost";
		private $usuario = "root";
		private $clave = "";
		private $base = "couchinn";
		private $conexion;
		private $nom_tip;		

		public function __construct(){

		 	$this->conexion = new mysqli($this->servidor, $this->usuario, $this->clave,$this->base);

			if ($this->conexion->connect_error){
				die("Fallo la conexion a la base de datos");
			}
		}
	
		public function tipo(){
			
			$query = 'select * from tipohospedaje order by nombre';

			$resultado = $this->conexion->query($query);
		?>
			
				<select name= "th" class="btn btn-default col-xs-9">
					<option value=''>T. de Hospedaje</option>
					    <?php 
					    	while($fila=mysqli_fetch_row($resultado)){  
					     		if ($fila['2'] == 0){
									echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
								}
							}
					    ?>
				</select>
			
<?php
		}
	
		public function listado(){
			
			$query = "SELECT * from tipohospedaje where estado='0' order by nombre";

			$resultado = $this->conexion->query($query);
		?>
			<div class="text-center">
				<ul class="list-group">
	  				<li class="list-group-item"><label for="sel1">Tipos de Hospedajes</label></li>
						    <?php 
						    	while($fila=mysqli_fetch_row($resultado)){  
						     		echo "<li class='list-group-item' value='".$fila['0']."'>".$fila['1']."</li>";
						     	}
						    ?>
				</ul>
			</div>
<?php			
		}
	
		public function crear_th($nom){
			$this->nom_tip=strtolower($nom);
			$query ="INSERT INTO tipohospedaje(nombre,estado) VALUES('$this->nom_tip','0')";
			$existe= "SELECT nombre,estado from tipohospedaje where nombre='$this->nom_tip'";
			$mod="UPDATE tipohospedaje SET estado='0' WHERE nombre='$this->nom_tip'";
            if($this->nom_tip == ' '){
                echo '<script language="javascript">';
                echo "window.location='form13.php';";
                echo 'window.alert("El tipo no es valido");';
                echo '</script>';
                return 0;
            }
			$resultado = $this->conexion->query($existe);
			if($row = mysqli_fetch_array($resultado)){
				if ($row['estado'] == 0){
                    echo '<script language="javascript">';
                    echo "window.location='form13.php';";
                    echo 'window.alert("El tipo ya existe");';
                    echo '</script>'; 
                }else{
                    if($row['nombre']==$this->nom_tip){
					   $this->conexion->query($mod);
                        echo '<script language="javascript">';
                        echo "window.location='form13.php';";
                        echo 'window.alert("Operacion realizada con exito");';
                        echo '</script>';
				    }
                }
			}else{
					$this->conexion->query($query);
                    echo '<script language="javascript">';
                    echo "window.location='form13.php';";
                    echo 'window.alert("Operacion realizada con exito");';
                    echo '</script>';
			}
		}

		public function mod_th($nom1,$nomnew){
			$this->nom_tip=strtolower ($nom1);
            $nom2=strtolower ($nomnew);
			$existe="SELECT nombre,estado from tipohospedaje where nombre='$this->nom_tip'";// si existe el primer nombre
			$query="UPDATE tipohospedaje SET nombre='$nom2' WHERE nombre='$this->nom_tip'";	// modifica el primer nombre con el segundo nombre
			$consulta1= "UPDATE tipohospedaje SET estado='1' WHERE nombre='$this->nom_tip'";//setea el primer nombre en estado 1
			$consulta2= "UPDATE tipohospedaje SET estado='0' WHERE nombre='$nom2'";//setea el segundo nombre en estado 0
			$resultado = $this->conexion->query($existe);//primera consulta mysql
			$existe="SELECT nombre,estado from tipohospedaje where nombre='$nom2'";//si existe el 2do nombre

			if($row = mysqli_fetch_array($resultado)){
				if ($row['nombre'] == $nomnew){
                    echo '<script language="javascript">';
                    echo "window.location='form14.php';";
                    echo 'window.alert("Operacion realizada con exito");';
                    echo '</script>';
                    return false;
                }
                if($row['nombre']==$this->nom_tip){
                    if ($row['estado'] == 0){
				        $resultado= $this->conexion->query($existe);//segunda consulta mysql
                        if($row2 = mysqli_fetch_array($resultado)){
                            if($row2['nombre'] == $nom2){	
                                $this->conexion->query($consulta1);// actualiza primer hosp
				                $this->conexion->query($consulta2);// actualiza segundo hosp
                                echo '<script language="javascript">';
                                echo "window.location='form14.php';";
                                echo 'window.alert("Operacion realizada con exito");';
                                echo '</script>';
						  }
					   }else{
                            $this->conexion->query($query);// cambia el nombre del primer hospedaje
                            echo '<script language="javascript">';
                            echo 'window.alert("Operacion realizada con exito");';
                            echo "window.location='form14.php';";
                            echo '</script>';
                        }
                    }else {
                        echo '<script language="javascript">';
                        echo 'window.alert("El tipo de hospedaje no existe");';
                        echo "window.location='form14.php';";
                        echo '</script>'; // msj error
                    }
                }else{
                    echo '<script language="javascript">';
                    echo 'window.alert("El tipo de hospedaje no existe");';
                    echo "window.location='form14.php';";
                    echo '</script>'; // msj error
				}
            }else{
                echo '<script language="javascript">';
                echo 'window.alert("El tipo de Hospedaje no existe");';
                echo "window.location='form14.php';";
                echo '</script>';
            }
        echo '<script language="javascript">';
        echo 'window.alert("ERROR");';
        echo "window.location='form14.php';";
        echo '</script>';
    }  
		
    	public function elim_th($nom1){
			$this->nom_tip= strtolower ($nom1);
			$existe="SELECT * from tipohospedaje where nombre='$this->nom_tip'";
			$query= "UPDATE tipohospedaje SET estado='1' WHERE nombre='$this->nom_tip'";
			$resultado = $this->conexion->query($existe);
			

			if($row = mysqli_fetch_array($resultado)){
				if($row['nombre']==$this->nom_tip){
					if($row['estado']==0){
						$resultado = $this->conexion->query($query);
				        echo '<script language="javascript">';
                        echo 'window.alert("Operacion realizada con exito");';
                        echo "window.location='form15.php';";
                        echo '</script>';
					}else{
                        echo '<script language="javascript">';
                        echo 'window.alert("El tipo de hospedaje ingresado no existe");';
                        echo "window.location='form15.php';";
                        echo '</script>';                        
                    }					
				}else{
				    echo '<script language="javascript">';
                    echo 'window.alert("El tipo de hospedaje ingresado no existe");';
                    echo "window.location='form15.php';";
                    echo '</script>';
				}
			}
            echo '<script language="javascript">';
            echo 'window.alert("El tipo de hospedaje ingresado no existe");';
            echo "window.location='form15.php';";
            echo '</script>';
		}
}
?>	
</html>