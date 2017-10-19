<?php
	require_once 'conexionPub.php';
	session_start();
	$titulo=$_POST['titulo'];
	$descrip= $_POST['descripcion'];
	$th=$_POST['th'];
	//echo $_POST['th'];
	$direc= $_POST['direccion'];
	$direc = strtolower($direc);$titulo = strtolower($titulo);$descrip = strtolower($descrip);
	$tmpimagen= $_FILES['alex']['tmp_name'];
	$nameimagen= $_FILES['alex']['name'];
	$capacidad= $_POST['capacidad'];
	$extimagen= pathinfo($nameimagen);
	$ext = array ("png","gif","jpg");
	$pub = new conexionPub;
	$idP = $_POST['idP'];
	echo $idP;
	$urlnueva = "bs/img/".$nameimagen;
	if(is_uploaded_file($tmpimagen)){
		if(array_search($extimagen['extension'], $ext)){
			copy($tmpimagen,$urlnueva);
			echo '<script language="javascript">';
            echo 'window.alert("La Creacion de la Publicacion fue exitosa");';
            if($_SESSION['adm'] == 1){
				echo "location.href='form_adm/form6.php';";
			}else{
				echo "location.href='form_usr/form6.php';";
			}
            echo '</script>';
			$pub->mod_pub($titulo,$descrip,$th,$direc,$nameimagen,$capacidad,$idP);
		}else{
			echo '<script language="javascript">';
            echo 'window.alert("Error: solo imagenes con formato (jpg, png o gif)");';
            if($_SESSION['adm'] == 1){
				echo "location.href='form_adm/form6.php';";
			}else{
				echo "location.href='form_usr/form6.php';";
			}
            echo '</script>';
		}
	}else
	{
		echo '<script language="javascript">';
        echo 'window.alert("Ingrese una Imagen Por favor!!!");';
        if($_SESSION['adm'] == 1){
			echo "location.href='form_adm/form6.php';";
		}else{
			echo "location.href='form_usr/form6.php';";
		}
        echo '</script>';
	}
?>