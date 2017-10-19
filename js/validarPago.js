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

function valido_caracteres(texto){
    var carac = "~`!#$%^&*+=-[]\\\';,/{}|\":<>?"
    for (i = 0; i < texto.length; i++){
        if(carac.indexOf(texto.charAt(i), 0) != -1){
            return 1;
        }
    }
    return 0;
}

function validarPago(){
    /*nro tarjeta*/
    if (document.pago.nro_tarjeta.value == 0){
        window.alert("Debe ingresar un numero de tarjeta");
        pago.nro_tarjeta.focus();
        return false;
    }
    else if (tiene_minusculas(document.pago.nro_tarjeta.value) == 1){
        window.alert("El numero ingresado es incorrecto");
        pago.nro_tarjeta.focus();
        return false;
    }
    else if (tiene_mayusculas(document.pago.nro_tarjeta.value) == 1){
        window.alert("El numero ingresado es invalidos");
        pago.nro_tarjeta.focus();
        return false;
    }
    else if(document.pago.nro_tarjeta.value.length != 16){
        window.alert("El numero ingresado es invalido");
        pago.nro_tarjeta.focus();
        return false;
    }
    else if (valido_caracteres(document.pago.nro_tarjeta.value) == 1){
        window.alert("El numero de tarjeta ingresado es invalido");
        pago.nro_tarjeta.focus();
        return false;
    }
    /*nro seguridad*/
    else if (document.pago.nseg.value == 0){
        window.alert("Debe ingresar su numero de seguridad");
        pago.nseg.focus();
        return false;
    }
    else if (tiene_minusculas(document.pago.nseg.value) == 1){
        window.alert("El numero de seguridad ingresado es incorrecto");
        pago.nseg.focus();
        return false;
    }
    else if (tiene_mayusculas(document.pago.nseg.value) == 1){
        window.alert("El numero de seguridad ingresado es incorrecto");
        pago.nseg.focus();
        return false;
    }
    else if(document.pago.nseg.value.length != 3){
        window.alert("El numero de seguridad ingresado es incorrecto");
        pago.nseg.focus();
        return false;
    }
    else if (valido_caracteres(document.pago.nseg.value) == 1){
        window.alert("El numero de seguridad ingresado es incorrecto");
        pago.nseg.focus();
        return false;
    }
    /*banco*/
    else if (document.pago.banco.value == 0){
        window.alert("Por favor ingrese su banco");
        pago.banco.focus();
        return false;
    }
    else if (valido_numeros(document.pago.banco.value) == 1){
        window.alert("Nombre de banco incorrecto");
        pago.banco.focus();
        return false;
    }
    else if (valido_caracteres(document.pago.banco.value) == 1){
        window.alert("Nombre de banco incorrecto");
        pago.banco.focus();
        return false;
    }
    document.pago.submit();
    return true;
}