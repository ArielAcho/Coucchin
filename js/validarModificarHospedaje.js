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
    var carac = "~` !#$%^&*+=-[]\\\';,/{}|\":<>?"
    for (i = 0; i < texto.length; i++){
        if(carac.indexOf(texto.charAt(i), 0) != -1){
            return 1;
        }
    }
    return 0;
}

function validarModificarHospedaje(){
	if (document.modHosp.nom_th1.value.length == 0){
		window.alert("debe ingresar el nombre del hospedaje que desea modificar");
		document.modHosp.nom_th1.focus();
		return false;
	}
	else if (document.modHosp.nom_th2.value.length == 0){
		window.alert("debe ingresar el nuevo tipo de hospedaje");
		document.modHosp.nom_th2.focus();
		return false;
	}
	else if (document.modHosp.nom_th1.value == document.modHosp.nom_th2.value){
		window.alert("Los tipos no deben coincidir");
		document.modHosp.nom_th2.focus();
		return false;
	}
	else if(valido_numeros(document.modHosp.nom_th2.value) == 1){
		window.alert("El nuevo tipo de hosedaje no debe contener numeros");
		document.modHosp.nom_th2.focus();
		return false;
	}
    
    else if(valido_caracteres(document.modHosp.nom_th2.value) == 1){
        window.alert("El nuevo tipo de hospedaje no debe contener caracteres especiales");
       	document.modHosp.nom_th2.focus();
		return false;
    }
	document.modHosp.submit();
	return true;
}