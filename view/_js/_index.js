$(document).ready(function(){
	$('#lembrete').hide();
});	

function  verificarCampos(_form){
	var erro = false;
	$('#'+_form).find('.obrigatorio').each(function(){	
		
		if($(this).val() == ''){
			erro = true;	
			$(this).addClass('obrigatorio_forte');
		}  else {
			$(this).removeClass('obrigatorio_forte');
			erro = false;
			
		}
	});
	if(erro){
		alert('preencha os campos em amarelo');
		return false;
	}
	return true;
}

function mostrarLembrete(){
	$('#login_normal').hide();
	$('#lembrete').show();
}

