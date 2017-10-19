function valido_numeros(texto){
	var numeros = "0123456789";
	for(i = 0; i < texto.length; i++){
		if (numeros.indexOf(texto.charAt(i), 0) != -1){
			return 1;
		}
	}
	return 0;
}

function tiene_minusculas(texto){
	var letras="abcdefghyjklmnñopqrstuvwxyz";
	for(i=0; i<texto.length; i++){
		if (letras.indexOf(texto.charAt(i),0)!=-1){
			return 1;
		}
	}
	return 0;
}

function tiene_mayusculas(texto){
	var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
	for(i=0; i<texto.length; i++){
		if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
			return 1;
		}
	}
	return 0;
}
extArray = new Array(".png", ".jpg", ".gif"); 


function archivo(file) { 
allowSubmit = false; 
if (!file){ return 1}
while (file.indexOf("\\") != -1) 
	file = file.slice(file.indexOf("\\") + 1); 
	ext = file.slice(file.indexOf(".")).toLowerCase(); 
	for (var i = 0; i < extArray.length; i++) { 
		if (extArray[i] == ext){ 
			allowSubmit = true; break; 
		} 
	} 
if (allowSubmit) 
	return 0; 
else 
	return 2;
} 


function validarCrearPub(file){
	/*titulo*/
	if (document.crear_pub.titulo.value.length==0){
		window.alert("Ingresa un Titulo");
		document.crear_pub.titulo.focus();
		return false;
	}else if (document.crear_pub.titulo.value.length < 6){
		window.alert("El titulo tiene menos de 6 caracteres de longitud");
		document.crear_pub.titulo.focus();
		return false;
	/*descripcion*/
	}else if (document.crear_pub.descripcion.value.length==0){
		window.alert("Ingresa una descripcion");
		document.crear_pub.titulo.focus();
		return false;
	}else if (document.crear_pub.descripcion.value.length > 500){
		window.alert("El titulo tiene mas de 500 caracteres de longitud");
		document.crear_pub.titulo.focus();
		return false;
	/*imagen*/
	}else if (archivo(file) == 1){
		window.alert("Ingrese un imagen");
		document.crear_pub.alex.focus();
		return false;
	}else if (archivo(file) == 2){
		window.alert("Error: solo imagenes con formato (jpg, png o gif)");
		document.crear_pub.alex.focus();
		return false;
	/*tipo*/
	}else if (document.crear_pub.th.value.length==0){
		window.alert("Ingrese un Tipo de Hospedaje");
		document.crear_pub.th.focus();
		return false;
	/*diireccion*/
	}else if (document.crear_pub.direccion.value.length==0){
		window.alert("Ingrese una Direccion");
		document.crear_pub.direccion.focus();
		return false;
	}else if (document.crear_pub.direccion.value.length > 100){
		window.alert("La Direccion tiene mas de 100 caracteres de longitud");
		document.crear_pub.direccion.focus();
		return false;
	}
	/*capacidad*/
	else if (document.crear_pub.capacidad.value.length==0){
		window.alert("Debe ingresar una capacidad");
		document.crear_pub.capacidad.focus();
		return false;
	}
	else if (tiene_minusculas(document.crear_pub.capacidad.value) == 1){
		window.alert("La capacidad solo debe contener numeros");
		document.crear_pub.capacidad.focus();
		return false;
	}
	else if (tiene_mayusculas(document.crear_pub.capacidad.value) == 1){
		window.alert("la capacidad solo debe contener numeros");
		document.crear_pub.capacidad.focus();
		return false;
	}
	document.crear_pub.submit();
	return true;
}