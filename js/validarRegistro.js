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

function validarEmail(){
	/*EMAIL*/
	if (document.registro.email.value == 0){
		window.alert("ingresa un e-mail valido");
		document.registro.email.focus();
		return false;
	}
	else if (document.registro.email.value.indexOf('@') == -1){
		window.alert("el e-mail debe contener un @");
		document.registro.email.focus();
		return false;
	}
    else if(document.registro.email.value.indexOf('.') == -1){
        window.alert("El e-mail debe contener un .")
    }
}

function validarRegistro(){
	/*EMAIL*/
	if (document.registro.email.value == 0){
		window.alert("Ingresa un e-mail valido");
		document.registro.email.focus();
		return false;
	}
	else if (document.registro.email.value.indexOf('@') == -1){
		window.alert("El e-mail debe contener un @");
		document.registro.email.focus();
		return false;
	}
    else if(document.registro.email.value.indexOf('.') == -1){
        window.alert("El e-mail debe contener un .")
    }
	/*PASSWORD*/
	else if (document.registro.pass1.value.length==0){
		window.alert("Ingresa una contraseña");
		document.registro.pass1.focus();
		return false;
	}
	else if (document.registro.pass1.value.length < 6){
		window.alert("la contraseña tiene que tener 6 caracteres de longitud");
		document.registro.pass1.focus();
		return false;
	}
	else if (valido_numeros(document.registro.pass1.value) == 0){
		window.alert("La contraseña debe contener al menos un numero");
		document.registro.pass1.focus();
		return false;
	}
	else if (tiene_minusculas(document.registro.pass1.value) == 0){
		window.alert("La contraseña debe contener al menos una letra minuscula");
		document.registro.pass1.focus();
		return false;
	}
	else if (tiene_mayusculas(document.registro.pass1.value) == 1){
		window.alert("La contraseña no debe contener letras mayuscula");
		document.registro.pass1.focus();
		return false;
	}
	else if (document.registro.pass2.value.length==0){
		window.alert("Vuelve a ingresar la contraseña");
		document.registro.pass2.focus();
		return false;
	}
	else if (document.registro.pass1.value!=document.registro.pass2.value){
		window.alert("Las contraseñas ingresadas no coinciden");
		document.registro.pass1.focus();
		return false;
	}
	/*NOMBRE*/
	else if (document.registro.nom.value==0){
		window.alert("Ingresa tu nombre");
		document.registro.nom.focus();
		return false;
	}
	/*APELLIDO*/
	else if (document.registro.ape.value==0){
		window.alert("Ingresa tu apellido");
		document.registro.ape.focus();
		return false;
	}
    /*fecha*/
   else if(!isNaN(document.registro.fecha.value)){
        window.alert("Debe ingresar su fecha de nacimiento");
        document.registro.fecha.focus();
        return false;
    }
	document.registro.submit();
	return true;
}