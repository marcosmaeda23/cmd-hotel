/**
 * insere a mascara
 * 
 * @param pais
 */
function aplicarMascara() {
	pais = $('#paisOrigem').val();
	//alert(pais);
	if (pais == 'brasil') {
		$('.cep').mask('99 999-999');
		$('.telefone').mask('9999-9999');
		$('.data').mask('99/99/9999', {
			completed:function(){
				if(!validarData(this.val())){
					this.focus();
					alert('Data inválida.');
				}
			}
		});

		$('#telefoneDdi').val(55);
	} else {
		$('.data').mask('9999/99/99');
	}
}

/**
 * faz a validacao da data
 * 
 * @param data
 * @return boolean
 */
function validarData(data) {
	if(data.length != 10) {
		return false;
	}
	__dia = (data.substring(0,2)); 
	__mes = (data.substring(3,5)); 
	__ano = (data.substring(6,10));

	if(isNaN(__dia) || isNaN(__mes) || isNaN(__ano)) {
		return false;
	}
	if (data == "") { 
		return false; 
	} else if(data.length < 10) { 
		return false; 
	} else if(__dia < 01 || __dia > 31) {
		return false; 
	} else if(__dia == 31 && (  __mes == 4 || __mes == 6 || __mes == 9 || __mes == 11 ) ) { 
		// verifica o __dia valido para cada __mes 
		return false; 
	}else if (__mes < 1 || __mes > 12 ) { 	
		// verifica se o __mes e valido 
		return false; 
	} else if (__mes == 2 && ( __dia < 1 || __dia > 29 || ( __dia > 28 && (parseInt(__ano / 4) != __ano / 4)))) { 
		// verifica se e __ano bissexto 
		return false; 
	} else {
		return true;
	}
}

/**
 * faz a verificacao do tipo do documento
 * @param tipo do documento, numero do documento
 * @returns boolean
 */
function validarDocumento(documento, tipo) {
	if(tipo == 'cpf'){
		//seta o documento na variavel certa
		cpf = documento;
		cpf = cpf.replace(/\./g, '');
		cpf = cpf.replace(/\//g, '');
		cpf = cpf.replace(/-/g, '');
		erro = new String;
		if (cpf.length < 11) erro += "Sao necessarios 11 digitos para verificacao do CPF! \n\n"; 
		var nonNumbers = /\D/;
		if (nonNumbers.test(cpf)) erro += "A verificacao de CPF suporta apenas numeros! \n\n"; 
		if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
			 erro += "Numero de CPF invalido!"
		}
		var a = [];
		var b = new Number;
		var c = 11;
		for (i=0; i<11; i++){
			   a[i] = cpf.charAt(i);
			   if (i < 9) b += (a[i] * --c);
		}
		if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
		b = 0;
		c = 11;
		for (y=0; y<10; y++) b += (a[y] * c--); 
		if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
		if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10])){
			   erro +="Digito verificador com problema!";
		}
		if (erro.length > 0){			   
			return false;
		}
		return true;
	} else if(tipo == 'cnpj'){
		return true;
	}
return false;
}

/**
 * faz a verificacao do formulario
 * 
 * @param nomeformulario
 * @returns {Boolean}
 */
function verificarCampos(_form) {
	var erro = false;
	$('#' + _form).find('.obrigatorio').each(function() {
		if ($(this).val() == '') {
			erro = true;
			$(this).addClass('obrigatorio_forte');
		} else {
			$(this).removeClass('obrigatorio_forte');
			erro = false;
		}
	});
	if (erro) {
		alert('preencha os campos em amarelo');
		return false;
	}
	return true;
}
/**
 * funcao de verificacao da senha e confirmacao da senha
 * @param campos do formulario, 
 * @example senha, confirmacaoSenha
 */
function verificaSenha(senha, confirmacaoSenha){
	if($('#'+senha).val() != '' && $('#'+confirmacaoSenha).val() != ''){
		if($('#'+senha).val() != $('#'+confirmacaoSenha).val()){
			alert('A sua senha está difeente da confirmação da senha');
			$('#'+senha).focus();
		}
	}
}

/**
 * verifica os campos unicos da tabela, cpf, cnpj, login, email
 * @param entidade, campo, tipoCampo
 */
function verificaCamposUnicos(entidade, campo, tipoCampo) {
	$.ajax({
		// definimos a url
		url : 'galeriaController.php',
		// definimos o tipo de requisiï¿½ï¿½o, post ou get
		type : 'post',
		// definimos o tipo de retorno, xml, html, json, sjonp, script e text
		dataType : 'text',
		// colocamos os valores a serem enviados
		data : "acao=verificaCamposUnicos&campo=" + campo,
		// beforeSend : function(){},
		// ao completar a requisição tira o sinal de carregando
		// complete : function(){},
		// aqui colocamos o callback na div #retorno

		// veja se teve erros
		error : function(jqXHR, exception) {
			if (jqXHR.status === 0) {
				alert('Not connect.\n Verify Network.');
			} else if (jqXHR.status == 404) {
				alert('Requested page not found. [404]');
			} else if (jqXHR.status == 500) {
				alert('Internal Server Error [500].');
			} else if (exception === 'parsererror') {
				alert('Requested JSON parse failed.');
			} else if (exception === 'timeout') {
				alert('Time out error.');
			} else if (exception === 'abort') {
				alert('Ajax request aborted.');
			} else {
				alert('Uncaught Error.\n' + jqXHR.responseText);
			}
		},
		// colocamos o retorno na tela
		success : function(resposta) {
			if (resposta == 'sucesso') {
				alert('Ocorreu um erro ao excluir foto');				
			} 
		}
	});
}
function sair() {
	$.ajax({
		// definimos a url
		url : 'galeriaController.php',
		// definimos o tipo de requisiï¿½ï¿½o, post ou get
		type : 'post',
		// definimos o tipo de retorno, xml, html, json, sjonp, script e text
		dataType : 'text',
		// colocamos os valores a serem enviados
		data : "acao=sair",
		// beforeSend : function(){},
		// ao completar a requisiï¿½ï¿½o tira o sinal de carregando
		// complete : function(){},
		// aqui colocamos o callback na div #retorno

		// veja se teve erros
		error : function(jqXHR, exception) {
			if (jqXHR.status === 0) {
				alert('Not connect.\n Verify Network.');
			} else if (jqXHR.status == 404) {
				alert('Requested page not found. [404]');
			} else if (jqXHR.status == 500) {
				alert('Internal Server Error [500].');
			} else if (exception === 'parsererror') {
				alert('Requested JSON parse failed.');
			} else if (exception === 'timeout') {
				alert('Time out error.');
			} else if (exception === 'abort') {
				alert('Ajax request aborted.');
			} else {
				alert('Uncaught Error.\n' + jqXHR.responseText);
			}
		},
		// colocamos o retorno na tela
		success : function(resposta) {
			if (resposta == 'sucesso') {
				alert('Logout efetuado com sucesso. Volte sempre');
				location.href = "../index.php";
			} else {
				alert('Ocorreu um erro ao efetuar o logout');
			}

		}

	});

}