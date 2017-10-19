function validarMensaje(){
	if (document.registro.descr.value == 0){
		window.alert("Debe ingresar un Mensaje");
		document.registro.descr.focus();
		return false;
	}
	document.registro.submit();
	return true;
}