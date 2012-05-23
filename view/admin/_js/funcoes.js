
function aplicarMascara(){
	var pais = $('#paisPesquisa').val();
	alert(pais);
	if (pais == 'brasil'){
		$('.cep').mask('99.999-999');
		$('.data').mask('99/99/9999');
		$('.telefone').mask('9999-9999');	
	}
	if (pais == 'argentina'){
		//(+54 3757) 425-777 
	} 
	if (pais == 'japão'){
		$('.data').mask('9999/99/99');

	}
}