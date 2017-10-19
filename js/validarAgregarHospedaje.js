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

function validarAgregarHospedaje(){
	if (document.agregarHospedaje.nom_th.value.length == 0){
		window.alert("No ingreso el nuevo tipo de hospedaje");
		document.agregarHospedaje.nom_th.focus();
		return false;
	}
	else if (valido_numeros(document.agregarHospedaje.nom_th.value) == 1){
		window.alert("El tipo no debe contener numeros");
		document.agregarHospedaje.nom_th.focus();
		return false;
	}
    else if(valido_caracteres(document.agregarHospedaje.nom_th.value) == 1){
        window.alert("El tipo no debe contener caracteres especiales");
        document.agregarHospedaje.nom_th.focus();
        return false;
    }
	document.sesion.submit();
	return true;
}
