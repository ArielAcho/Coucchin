function validarPuntaje(){
	if (document.registro.nom.value==0){
		window.alert("Debe ingresar un Huesped");
		document.registro.nom.focus();
		return false;
	}
	else if (document.registro.puntos.value == 0){
		window.alert("Debe ingresar un valor");
		document.registro.puntos.focus();
		return false;
	}
	else if (document.registro.descr.value == 0){
		window.alert("Debe ingresar un comentario");
		document.registro.descr.focus();
		return false;
	}
	document.registro.submit();
	return true;
}