
function aplicarMascara(pais){
	
	alert(pais);
	if (pais == 'brasil'){
		$('.cep').mask('99.999-999');
		$('.data').mask('99/99/9999');
		$('.telefone').mask('9999-9999');	
	}
	else if (pais == 'argentina'){
		//(+54 3757) 425-777 
	} 
	else 	if (pais == 'japao'){
		$('.data').mask('9999/99/99');
	}
}

function  verificarCampos(_form){
	alert(_form);
	
	alert('sdfa');
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
