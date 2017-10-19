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
function validarCambioContraseña(){
	/*PASSWORD*/
	if (document.camb_pass.pass1.value.length==0){
		window.alert("ingresa una contraseña");
		document.camb_pass.pass1.focus();
		return false;
	}
	else if (document.camb_pass.pass1.value.length < 6){
		window.alert("la contraseña tiene que tener 6 caracteres de longitud");
		document.camb_pass.pass1.focus();
		return false;
	}
	else if (valido_numeros(document.camb_pass.pass1.value)== 0){
		window.alert("La contraseña debe contener al menos un numero");
		document.camb_pass.pass1.focus();
		return false;
	}
	else if (tiene_minusculas(document.camb_pass.pass1.value) == 0){
		window.alert("La contraseña debe contener letras minusculas");
		document.camb_pass.pass1.focus();
		return false;
	}
	else if (tiene_mayusculas(document.camb_pass.pass1.value) == 1){
		window.alert("La contraseña no debe contener letras mayuscula");
		document.camb_pass.pass1.focus();
		return false;//comentario
	}else if (document.camb_pass.pass2.value.length==0){
		window.alert("ingresa la nueva contraseña");
		document.camb_pass.pass2.focus();
		return false;
	}
	else if (document.camb_pass.pass2.value.length < 6){
		window.alert("La nueva contraseña tiene que tener 6 caracteres de longitud");
		document.camb_pass.pass2.focus();
		return false;
	}
	else if (valido_numeros(document.camb_pass.pass2.value)== 0){
		window.alert("La nueva contraseña debe contener al menos un numero");
		document.camb_pass.pass2.focus();
		return false;
	}
	else if (tiene_minusculas(document.camb_pass.pass2.value) == 0){
		window.alert("La nueva contraseña debe contener letras minusculas");
		document.camb_pass.pass2.focus();
		return false;
	}
	else if (tiene_mayusculas(document.camb_pass.pass2.value) == 1){
		window.alert("La nueva contraseña no debe contener letras mayuscula");
		document.camb_pass.pass2.focus();
		return false;
	}if (document.camb_pass.pass3.value.length==0){
		window.alert("vuelve a ingresar la contraseña");
		document.camb_pass.pass3.focus();
		return false;
	}
	else if (document.camb_pass.pass3.value!=document.camb_pass.pass2.value){
		window.alert("las contraseñas ingresadas no coinciden");
		document.camb_pass.pass3.focus();
		return false;
	}
	document.camb_pass.submit();
	return true;
}