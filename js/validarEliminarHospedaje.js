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

function validarEliminarHospedaje(){
	if (document.eliminarHospedaje.nom_th1.value.length == 0){
		window.alert("No ingreso el tipo de hospedaje que desea eliminar");
		document.eliminarHospedaje.nom_th1.focus();
		return false;
	}
	else if (valido_numeros(document.eliminarHospedaje.nom_th1.value) == 1){
		window.alert("El tipo no debe contener numeros");
		document.eliminarHospedaje.nom_th1.focus();
		return false;
	}
    else if(valido_caracteres(document.eliminarHospedaje.nom_th1.value) == 1){
        window.alert("El tipo no debe contener caracteres especiales");
        document.eliminarHospedaje.nom_th1.focus();
        return false;
    }
	document.eliminarHospedaje.submit();
	return true;
}
