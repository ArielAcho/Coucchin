function valido_numeros(texto){
	var numeros = "0123456789";
	for(i = 0; i < texto.length; i++){
		if (numeros.indexOf(texto.charAt(i), 0) != -1){
			return 1;
		}
	}
	return 0;
}

function valido_caracteres(texto){
    var carac = "~`!#$%^&*+=-[]\\\';,/{}|\":<>?"
    for (i = 0; i < texto.length; i++){
        if(carac.indexOf(texto.charAt(i), 0) != -1){
            return 1;
        }
    }
    return 0;
}

function validarModPerfil(){
	/*NOMBRE*/
	if (document.mod_perf.nom.value==0){
		window.alert("Ingresa tu nombre");
		document.mod_perf.nom.focus();
		return false;
	}
    else if(valido_numeros(document.mod_perf.nom.value) == 1){
        window.alert("El nombre no debe contener numeros");
        document.mod_perf.nom.focus();
        return false;
    }
    else if(valido_caracteres(document.mod_perf.nom.value) == 1){
        window.alert("El nombre no debe contener caracteres especiales");
        document.mod_perf.nom.focus();
        return false;
    }
	/*APELLIDO*/
    else if(valido_caracteres(document.mod_perf.ape.value) == 1){
        window.alert("El apellido no debe contener caracteres especiales");
        document.mod_perf.nom.focus();
        return false;
    }
	else if (document.mod_perf.ape.value==0){
		window.alert("Ingresa tu apellido");
		document.mod_perf.ape.focus();
		return false;
	}
    else if(valido_numeros(document.mod_perf.ape.value) == 1){
        window.alert("El apellido no debe contener numeros");
        document.mod_perf.ape.focus();
        return false;
    }
    /*fecha*/
    else if (!isNaN(document.mod_perf.fecha.value)){
        window.alert("Debe ingresar una fecha de nacimiento");
        document.mod_perf.fecha.focus();
        return false;
    }
	return true;
	document.mod_perf.submit();
}