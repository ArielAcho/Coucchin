<?php
class contr_tipohosp{
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
			<div class="form-group">
  				<label for="sel1"class="">Seleccionar : </label>
				<select name= "th" class="btn btn-default col-xs-9">
					<option value=''>T. de Hospedaje</option>
					    <?php 
					    	while($fila=mysqli_fetch_row($resultado)){  
					     		echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
					     	}
					    ?>
				</select>
			</div>
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
			
			$query ="INSERT INTO tipohospedaje(nombre,estado) VALUES('$nom','0')";
			$this->nom_tip=$nom;
			$existe= "SELECT nombre from tipohospedaje where nombre='$nom'";
			$mod="UPDATE tipohospedaje SET estado='0' WHERE nombre='$nom'";

			$resultado = $this->conexion->query($existe);
			if($row = mysqli_fetch_array($resultado)){
				if($row['nombre']==$this->nom_tip){
					$this->conexion->query($mod);
					header("Location: /my-site/form_adm/form13.php");
				}
			}else{
					header("Location: /my-site/form_adm/form13.php");
					$this->conexion->query($query);
				
			}
		}
		public function mod_th($nom1,$nom2){
			$this->nom_tip=$nom1;
			$existe="SELECT nombre,estado from tipohospedaje where nombre='$nom1'";
			$query="UPDATE tipohospedaje SET nombre='$nom2' WHERE nombre='$nom1'";
			
			$resultado = $this->conexion->query($existe);

			if($row = mysqli_fetch_array($resultado)){
				if($row['nombre']==$this->nom_tip){
					if($row['estado']==0){
						$resultado = $this->conexion->query($query);
					}
					header("Location: /my-site/form_adm/form14.php");
				}else{
					header("Location: /my-site/form_adm/form14.php");
				}
			}else{

					header("Location: /my-site/form_adm/form14.php");
			}
		}
		public function elim_th($nom1){
			$this->nom_tip=$nom1;
			$existe="SELECT nombre from tipohospedaje where nombre='$nom1'";
			$query= "UPDATE tipohospedaje SET estado='1' WHERE nombre='$nom1'";
			$resultado = $this->conexion->query($existe);
			

			if($row = mysqli_fetch_array($resultado)){
				if($row['nombre']==$this->nom_tip){
					if($row['estado']==0){
						$resultado = $this->conexion->query($query);
						header("Location: /my-site/form_adm/form15.php");
					}					
				}else{
					header("Location: /my-site/form_adm/form15.php");
				}
			}

					header("Location: /my-site/form_adm/form15.php");	
		}
}
?>