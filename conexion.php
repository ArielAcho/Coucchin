<?php
class conexion{
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
	
	public function mod_perf_usr($email){
		  	$existe= "SELECT * from persona where emailp='$email'";
		  	$resultado = $this->conexion->query($existe);
			if ($email == $_SESSION['email']){
				echo '<script language="javascript">';
	            	echo "window.location='form8.php';";
	            	echo 'window.alert("Operacion realizada con exito");';
					echo '</script>';
			}else{
			if($row = mysqli_fetch_array($resultado)){
		  		$_SESSION['premiumParaMod']= $row['premiunp'];#usar unset()despues
		  		$_SESSION['passwordParaMod']= $row['passwp'];
		  		$_SESSION['fechaNacParaMod']= $row['fec_nacp'];
		  		$_SESSION['emailParaMod']= $row['emailp'];
		  		$_SESSION['apellidoParaMod']=$row['apellidop'];# preguntar si se va a usar
		  		$_SESSION['nombreParaMod']=$row['nombrep'];
		  		$_SESSION['modificarUsuario']=0;
		  		$_SESSION['idMod']=$row['idpersona'];
		  		echo '<script language="javascript">';
	            echo "window.location='form8.php';";                
	            echo 'window.alert("Se encontró el email");';
	            echo '</script>';
		  	}else{
		  		echo '<script language="javascript">';
	            echo "window.location='form8.php';";                
	            echo 'window.alert("Su email no existe en el sistema");';
	            echo '</script>';
		  		}
		  	}
		}
						
	public function mod_perf_usr_adm($email,$pass,$nom,$ape,$fecha,$id){				#Modifica un perfil de usuario desde el lado del administrador
				$query= "UPDATE persona SET nombrep='$nom',apellidop='$ape',fec_nacp='$fecha',emailp='$email' WHERE idpersona='$id'";
				$this->conexion->query($query);
				$_SESSION['modificarUsuario']=1;
            	echo '<script language="javascript">';
            	echo "window.location='form8.php';";
            	echo 'window.alert("Operacion realizada con exito");';
				echo '</script>';
					
            }
		    
	public function registrar($passr,$nomr,$aper,$emailr,$fec_nac){

			$query="INSERT INTO persona(nombrep,apellidop,emailp,fec_nacp,passwp,premiunp,baneadop,adminp)VALUES('$nomr','$aper','$emailr','$fec_nac','$passr','0','0','0')";
			$this->email=$emailr;
			$this->password=$passr;
           // $this->fec_nac=$fec_nac;
			
			$existe= "SELECT emailp from persona where emailp='$emailr'";
			
			$resultado = $this->conexion->query($existe);

			if($row = mysqli_fetch_array($resultado)){
				if($row['emailp'] == $this->email){
                    echo '<script language="javascript">';
                    echo 'window.alert("El email ya esta siendo utilizado, por favor ingrese otro");';
                    echo "window.location='registrar.php';";
                    echo '</script>';
					//header("Location: /my-site/registrar.php");
				}
                if ($this->fec_nac == 0){
                    echo '<script language="javascript">';
                    echo 'window.alert("Debe ingresar una fecha de nacimiento);';
                    echo "window.location='registrar.php';";
                    echo '</script>';
                }
			}
			else{ 
				$this->conexion->query($query);
				$_SESSION['id'] = $row['idpersona'];
				$_SESSION['nom'] = $row['nombrep'];							
				$_SESSION['email'] = $row['emailp'];
				$_SESSION['pass'] = $row['passwp'];
				$_SESSION['adm'] = $row['adminp'];	
				$_SESSION['premium'] = 0;
                echo '<script language="javascript">';
                echo 'window.alert("Registro exitoso");';
                echo "window.location='home.php';";
                echo '</script>';
                //header("Location: /my-site/home.php");
			}
		}
		
	public function mod_perf($nom,$ape,$fecha,$id){				
			$query= "UPDATE persona SET nombrep='$nom',apellidop='$ape',fec_nacp='$fecha' WHERE idpersona='$id'";
			$existe= "SELECT nombrep,apellidop,fec_nacp FROM persona WHERE idpersona='$id'";
			$resultado= $this->conexion->query($existe);
			$this->conexion->query($query);
			if($row = mysqli_fetch_array($resultado)){
				$this->conexion->query($query);
				$_SESSION['nom'] = $nom;							
				if ($_SESSION['adm'] == 0){
				    echo '<script language="javascript">';
                    echo "window.location='form1.php';";
                    echo 'window.alert("Operacion realizada con exito");';
                    echo '</script>';
                    //header("Location: /my-site/form_usr/form1.php");	
				}else{
                    echo '<script language="javascript">';
                    echo "window.location='form1.php';";
                    echo 'window.alert("Operacion realizada con exito");';
                    echo '</script>';
					//header("Location: /my-site/form_adm/form1.php");
				}		
			}
			if ($_SESSION['premium'] == 0){
                echo '<script language="javascript">';
                echo "window.location='form1.php';";
                echo 'window.alert("Operacion fallida por favot vuelva a intentarlo");';
                echo '</script>';
                //header("Location: /my-site/form_usr/form1.php");	
			}else{
                echo '<script language="javascript">';
                echo "window.location='form1.php';";                
                echo 'window.alert("Operacion fallida por favor vuelva a intentarlo");';
                echo '</script>';
				//header("Location: /my-site/form_adm/form1.php");
            }
		}

    public function cambiar_pass($usr,$pass1,$pass2,$pass3){
		$existe="SELECT * FROM persona WHERE idpersona='$usr'";
		$mod_pass="UPDATE persona SET passwp='$pass2' WHERE idpersona='$usr'";
		$resultado = $this->conexion->query($existe);
	  	if($row = mysqli_fetch_array($resultado)){
	  			if($row['5']==$pass1){				#compara si la contraseña guardada es igual a la contraseña ingresada
	  				if($pass2==$pass3){				#compara si la 1ra nueva contraseña es igual a 2da nueva contraseña
	  					$this->conexion->query($mod_pass);
	  					echo '<script language="javascript">';
		                echo "window.location='form2.php';";                
		                echo 'window.alert("Operacion exitosa");'; 	#contraseñas distintas
		                echo '</script>';
	  				}else{
	  					echo '<script language="javascript">';
		                echo "window.location='form2.php';";                
		                echo 'window.alert("Las nuevas contraseñas no son iguales");'; 	#contraseñas distintas
		                echo '</script>';
	  				}
	  			}else{
	  				echo '<script language="javascript">';
		        	echo "window.location='form2.php';";                
		            echo 'window.alert("Tu contraseña es erronea");'; #contraseña erronea
		            echo '</script>';        
	  			}
	  	}else{
	  		echo '<script language="javascript">';
		    echo "window.location='form2.php';";                
		    echo 'window.alert("usuario no existente");';	#usuario no existente
		    echo '</script>';
	  	}
	}
      	
	public function recuperar($email){
	  	$existe= "SELECT emailp from persona where emailp='$email'";
	  	$resultado = $this->conexion->query($existe);
	  	if($row = mysqli_fetch_array($resultado)){
	  			echo '<script language="javascript">';
                echo "window.location='olvidepass.php';";                
                echo 'window.alert("Se le envio un mensaje a su email con su nueva contraseña");';
                echo '</script>';
		}else{
				echo '<script language="javascript">';
                echo "window.location='olvidepass.php';";                
                echo 'window.alert("Su email no existe en el sistema");';
                echo '</script>';
		}

		}
	
	public function login($emailc, $passc){  //07-julio modifique el login
			$this->email = strtolower($emailc);
			$this->password = strtolower($passc);

			$query = "SELECT idpersona,nombrep, emailp, passwp, adminp, premiunp, baneadop from persona where emailp='$this->email' AND passwp='$this->password'";

			$resultado = $this->conexion->query($query); // Si Encuentra un registro es almacenado en esa variable consulta
			
			if($row = mysqli_fetch_array($resultado)){
				if(($row['emailp'] == $this->email)&&($row['passwp']==$this->password)&&($row['baneadop']==0)){
					if(($row['emailp'] == $this->email)&&($row['passwp']==$this->password)){
								$_SESSION['id'] = $row['idpersona'];
								$_SESSION['nom'] = $row['nombrep'];							
								$_SESSION['email'] = $row['emailp'];
								$_SESSION['pass'] = $row['passwp'];
								$_SESSION['adm'] = $row['adminp'];
								$_SESSION['premium']=$row['premiunp'];
					}
					if($row['adminp'] == 0){
	                    echo '<script language="javascript">';
	                    echo 'window.alert("Bienvenido");';
	                    echo "window.location='form_usr/conf_usr.php';";
	                    echo '</script>';
	                    //header("Location: /my-site/form_usr/conf_usr.php");
					}else{
	                    echo '<script language="javascript">';
	                    echo 'window.alert("Bienvenido");';
	                    echo "window.location='form_adm/conf_adm.php';";
	                    echo '</script>';
						//header("Location: /my-site/form_adm/conf_adm.php");
					}
				}else{
					echo '<script language="javascript">';
	                echo 'window.alert("Su cuenta de Usuario se Encuentra Baneada");';
	                echo "window.location='iniciar_sesion.php';";
	                echo '</script>';
				}			
			}else{
                echo '<script language="javascript">';
                echo 'window.alert("Datos ingresados invalidos, porfavor intentelo nuevamente");';
                echo "window.location='iniciar_sesion.php';";
                echo '</script>';
				//header("Location: /my-site/iniciar_sesion.php");
			}
		}
	
	public function obtener_premium($desde,$hasta){ # modifique este modulo enviar
			$inicio= strlen($desde);
			$fin= strlen($hasta);
			if(($inicio > 0)and($fin > 0)){
				$query="SELECT p.nombrep,p.apellidop,p.emailp,pa.fecha,pa.saldo from persona p inner join pago pa on (p.idpersona=pa.idpersona1)where pa.fecha between '$desde' and '$hasta' order by pa.fecha";
			}else if(($inicio > 0)and($fin == 0)){
				$query="SELECT p.nombrep,p.apellidop,p.emailp,pa.fecha,pa.saldo from persona p inner join pago pa on (p.idpersona=pa.idpersona1)where pa.fecha >= '$desde' order by pa.fecha";
			}else if(($inicio == 0)and($fin > 0)){
				$query="SELECT p.nombrep,p.apellidop,p.emailp,pa.fecha,pa.saldo from persona p inner join pago pa on (p.idpersona=pa.idpersona1)where pa.fecha <= '$hasta' order by pa.fecha";
			}else if(($inicio == 0)and($fin == 0)){
				$query="SELECT p.nombrep,p.apellidop,p.emailp,pa.fecha,pa.saldo from persona p inner join pago pa on (p.idpersona=pa.idpersona1) order by pa.fecha";
			}
			$resultado = $this->conexion->query($query);
			return $resultado;
		}
	
	public function habilitados(){
	  	$existe= "SELECT p.emailp,p.nombrep,p.baneadop,p.idpersona FROM persona p WHERE (p.baneadop='0') and (p.adminp='0')";
	  	$resultado = $this->conexion->query($existe);
	  	return $resultado;
	}
	
	public function inhabilitados(){
	  	$existe= "SELECT p.emailp,p.nombrep,p.baneadop,p.idpersona FROM persona p WHERE (p.baneadop='1') and (p.adminp='0')";
	  	$resultado = $this->conexion->query($existe);
	  	return $resultado;
	}

	public function modificarEstado($email,$estado){ # modifique este modulo enviar
	  	$existe= "UPDATE persona p SET p.baneadop='$estado' WHERE p.emailp='$email'";
	  	$usuario= "SELECT p.idpersona from persona p where p.emailp='$email'";
	  /*	echo $existe;
	  	echo "<br>";
	  	echo $usuario;*/
	  	$res = $this->conexion->query($usuario);
	  	if ($row= mysqli_fetch_array($res)){
	  		$id = $row['0'];
	  		$modpub="UPDATE publicacion p SET p.Estado='$estado' WHERE p.idpersona3='$id'";
	  		/*echo "<br>";
	  		echo $modpub;*/
	  		$this->conexion->query($modpub);

	  	}
	  	$resultado = $this->conexion->query($existe);
	  	
	}
	
	public function mostrarMiPuntaje($id){
		$query="SELECT valor FROM califica WHERE idp2 = '$id'";
		$ext=$this->conexion->query($query);
		$res=$this->conexion->query($query);
		$cant= 1; $prom=0;
		if ($ex=mysqli_fetch_array($ext)){
			$cant=0;
		}
		while ($row = mysqli_fetch_row($res)){
			$prom=$prom + $row['0']; 
			$cant++;
		}
		$prom=$prom/$cant;
		echo "<label class='list-group-item active'>Puntaje: ".$prom."</label>";
	}
	
	public function mostrarMiPuntuacion($idper){
		$query = "SELECT * from califica c INNER JOIN persona p on (c.idp1 = p.idpersona) WHERE idp2 = '$idper'";
		$res = $this->conexion->query($query);
			?><div class = 'row' id='usuarios'>
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
				$nombre = $row['6'];
				$valor = $row['2'];
				$descripcion = $row['4'];
				echo "<tr><td>".$nombre."</td>";
				echo "<td>".$valor."</td>";
				echo "<td>".$descripcion."</td>";

			}
			?>
				</tbody>
			</table>
	<?php require_once '../contr_mostrarMiPuntaje.php'; ?>
		</div><?php
	}
	

}?>