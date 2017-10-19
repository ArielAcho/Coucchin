function PuntajePub(){
	
	if (document.registro.puntos.value == 0){
		window.alert("Debe ingresar un valor");
		document.registro.puntos.focus();
		return false;
	}
	else if (document.registro.descr.value == 0){
		window.alert("Debe ingresar un Comentario");
		document.registro.descr.focus();
		return false;
	}
	document.registro.submit();
	return true;
}