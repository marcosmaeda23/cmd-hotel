$(document).ready(function(){
	// busca o campo paisOrigem no formulario do cliente para setar a mascara, default brasil
	var pais = $('#paisOrigem').val();
	
	mostrarTelefone();
	mostrarCep();
	aplicarMascara(pais);
});	


