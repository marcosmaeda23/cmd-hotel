/*
funcao de modulo de telefone, cep
depois da funcao ser chamada executa a mascara
dependencia jquery.maskedinput
*/

/**
 * funcao que preenche os campos do telefone
 * @param array associativo do telefone
 */
function preencheCamposTelefone(telefoneArray){
	// verifica se o array esta vazio
	if(telefoneArray != null){	
		$('#documentoNumero').show();
		
		for ( var i = 0; i < telefoneArray.length; i++) {
			// mosta o campo do telefone e insere os valores
			mostrarTelefone();
			var qtde = $('#qtdeTelefone').val();
			for ( var description in telefoneArray[i]) {
				$('#'+description+(qtde-1)).val(telefoneArray[i][description]);
			}
		}		
	} else {
		mostrarTelefone();		
	}	
}
/**
 * funcao que verifica qual o cep e mostra os campos
 * @param array associativo do cep, e o tipo que é para mostrar
 */
function preencheCamposCep(cepComplementoArray, cepArray, cepTipo){
	if(cepComplementoArray != null) {
		if (cepTipo == 1){
			mostrarCepCadastro();
			for ( var description in cepArray) {
				$('#'+description).val(cepArray[description]);
			}
			$('#cepPesquisa').val(cepArray['cepCadastroCep']);
		} else {
			mostrarCepPreenchido();
		}
		mostrarCepComplemento();
		for ( var description in cepComplementoArray) {
			$('#'+description).val(cepComplementoArray[description]);
		}
		aplicarMascara();
	}
}

/**
 * verifica os campos unicos da tabela, cpf, cnpj, login, email
 * @param entidade, campo, valor
 * @returns boolean
 */
function verificaCamposUnicos(entidade, campo, valor) {
	if(valor == ''){
		return;
	}
	if ($('#'+entidade+'Id').val() != ''){
		return;
	}
	var parametros = '';
	parametros += '&entidade=' + entidade;
	parametros += '&campo=' + campo;
	parametros += '&valor=' + valor;
	$.ajax({
		// definimos a url
		url : '../../modulos/modulosController.php',
		// definimos o tipo de requisiï¿½ï¿½o, post ou get
		type : 'post',
		// definimos o tipo de retorno, xml, html, json, sjonp, script e text
		dataType : 'text',
		// colocamos os valores a serem enviados
		data : "acao=verificaCamposUnicos" + parametros,
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
			if(resposta == 'sucesso'){
				alert('Este campo já está cadastrado no banco.');
				$('#'+campo).addClass('obrigatorio_forte');
			} else {
				$('#'+campo).removeClass('obrigatorio_forte');
			}
			
		}
	});
}

/**
 * funcao que excluir 
 * @param entidade
 * @param id
 * return boolean
 */
function excluir(entidade, id){
	var parametros = '';
	if(entidade == ''){
		return;
	}
	if(id == ''){
		return;
	}	
	if(!confirm('Deseja excluir este ' + entidade + '?')){
		return;
	}
	parametros += '&entidade=' + entidade;
	parametros += '&id=' + id;
	alert('sdf');
	$.ajax({
		// definimos a url
		url : '../../modulos/modulosController.php',
		// definimos o tipo de requisiï¿½ï¿½o, post ou get
		type : 'post',
		// definimos o tipo de retorno, xml, html, json, sjonp, script e text
		dataType : 'text',
		// colocamos os valores a serem enviados
		data : "acao=excluir" + parametros,
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
			alert(resposta)
			if(resposta == 'sucesso'){
				alert('Exclusão efetuada');
			} else {
				alert('Ocorreu um erro ao excluir o hotel.\nTente novamente mais tarde.');
			}
			
		}
	});
}

/**
 * pesquisa o cep na base de dados
 * mostra o resultado no campo 'resposta' caso nao ache 
 */
function cepPesquisar(){
	// antes de qualquer chamada apaga todos os campos menos o mostrarCep();
	var cep;
	// pega o cep digitado
	cep = $('#cepPesquisa').val();
	if(cep.indexOf('_') != -1){
		return;
	}
	if (cep == '__ ___-___' || cep == '') {
		return;
	}
	$('#cep').empty();

	$.ajax({
		//definimos a url
		url : '../../modulos/modulosController.php',
		//definimos o tipo de requisicao, post ou get
		type: 'post',
		//definimos o tipo de retorno, xml, html, json, sjonp, script e text
		dataType : 'text',
		//colocamos os valores a serem enviados
		data: "acao=pesquisarCep&cep="+cep,
		//beforeSend : function(){},
		//ao completar a requisicao tira o sinal de carregando
		//complete : function(){},
		//aqui colocamos o callback na div #retorno
		
		//veja se teve erros
		error: function(jqXHR, exception) {
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
		//colocamos o retorno na tela
		success : function(resposta){
			if(resposta == 'fracasso'){
				alert('Cep não encontrado');
				// mostra o botao para cadastrar o cep 
				mostrarCepComplemento();
				mostrarCepCadastro();
				// seta o valor com 1 para cadastrar 
				$('#cepXedicaoNumero').focus();
				$('#cepXedicaoTipo').val(1);
				// seta p campo cepCadastroCep para cadastrar no banco
				$('#cepCadastroCep').val($('#cepPesquisa').val());
				
			} else {
				mostrarCepPreenchido();
				alert('Cep encontrado');
				// mostra os campos do cep com os valores preenchidos
				$('#cepId').val();
				$('#logradouro').val();
				$('#bairro').val();
				$('#cidade').val();
				$('#estado').val();
				$('#pais').val();
				// seta o valor como 2 para nao gravar o cepCadastro no banco
				$('#cepXedicaoTipo').val(2);
				mostrarCepComplemento();
				// seta o focus
				$('#cepXedicaoNumero').focus();		
			}		    	
		}
	 });
	// caso ache mostra a formulario 'mostrarCepPreenchido' com os campos preenchidos e o formulario 'cepComplemento' setado o focus
	// e coloca o cep da pesquisa no campo hidden 'cepId' e coloca o valor no campo 'cepXedicaoTipo' 2 - nao cadastrar novo cep	
	
	// caso nao ache mostra uma mensagem no campo de resposta perguntando de deseja cadastrar o endereco
	// caso clicar mostra o formulario 'cepCadastro' setado o focus e o formulario 'cepComplemento'
	// e coloca o cep da pesquisa no campo hidden 'cepCadastroCep' e coloca o valor no campo 'cepXedicaoTipo' 1 - cadastrar novo cep
	
}

/**
 * mostra os campos de login
 */
function mostrarCampoLogin(){
	var _login = '';
	_login += 'Usuário: 	<br />';
	_login += '<input type="text" name="usuarioLogin" id="usuarioLogin" value="" onblur="verificaCamposUnicos(\'usuario\', \'usuarioLogin\', this.value);" maxlength="50" class="obrigatorio"/><br />';
	_login += 'Senha: 	<br />';
	_login += '<input type="password" name="usuarioSenha" id="usuarioSenha" value="" maxlength="50" class="obrigatorio senha" onblur="verificaSenha(\'usuarioSenha\',\'usuarioConfirmacaoSenha\');" /><br />';
	_login += 'Confirmacao de senha: 	<br />';
	_login += '<input type="password" name="usuarioConfirmacaoSenha" id="usuarioConfirmacaoSenha" value="" maxlength="50" class="obrigatorio senha" onblur="verificaSenha(\'usuarioSenha\',\'usuarioConfirmacaoSenha\');" /><br />';
	_login += 'Lembrete:<br />';
	_login += '<input type="text" name="usuarioLembrete" id="usuarioLembrete" value="" maxlength="50" /><br />';
	
	$('#login').append(_login);
}

/**
 * mostra a parte da pergunta caso nao ache o cep
 * 
 */
function mostrarPerguntaCep(){
	var _cep = '';
	_cep += '<a href="" onclick="mostrarCepCadastro();" >Cadastrar Cep</a>'
	$('#resposta').append(_cep);
}

/**
 * mostra o formulario de busca 
 * chama a funcao cepPesquisar
 */
function mostrarCep(){
	var _cep = '';
	_cep += '<label for="cepPesquisa">Cep</label><br>';
	_cep += '<input type="text" 	name="cepPesquisa" 		id="cepPesquisa"    class="cep" onblur="cepPesquisar();" /><br />';
	_cep += '<input type="hidden" 	name="cepCadastroPais" 	id="cepCadastroPais" 	value="" />	<br />';
	_cep += '<input type="hidden" 	name="cepXedicaoTipo" 	id="cepXedicaoTipo" 	value="" />		<br />';
	_cep += '<div id="resposta"></div>';	
	$('#cep').append(_cep);
}
/**
 * mostra o formulario preenchido quando se faz a busca do cep e acha o endereco
 */
function mostrarCepPreenchido(){
	var _cep = '';					 	
	_cep += '				<input type="hidden" 	name="cepId" 		id="cepId" 		value="" />	<br />';
	_cep += 'Logradouro: 	<input type="text" 		name="logradouro" 	id="logradouro" value="" />	<br />';
	_cep += 'Bairro: 		<input type="text" 		name="bairro" 		id="cepbairro" 	value="" />	<br />';
	_cep += 'Cidade: 		<input type="text" 		name="cidade" 		id="cidade" 	value="" />	<br />';
	_cep += 'Estado: 		<input type="text" 		name="estado" 		id="estado" 	value="" />	<br />';
	_cep += 'Pais: 			<input type="text" 		name="pais" 		id="pais" 		value="" />	<br />';
	$('#cep').append(_cep);
}
/**
 * mostra a parte do cadastro do cep, para salvar no banco
 */
function mostrarCepCadastro(){
	var _cep = '';
	_cep += '				<input type="hidden" 	name="cepCadastroId" 			id="cepCadastroId" 				value="" />	<br />';
	_cep += '				<input type="hidden" 	name="cepCadastroCep" 			id="cepCadastroCep" 				value="" />	<br />';
	_cep += 'Logradouro: 	<input type="text" 		name="cepCadastroLogradouro"	id="cepCadastroLogradouro" 	class="obrigatorio" /><br />';
	_cep += 'Bairro: 		<input type="text" 		name="cepCadastroBairro" 		id="cepCadastroBairro" 		class="obrigatorio" /><br />';
	_cep += 'Cidade: 		<input type="text" 		name="cepCadastroCidade" 		id="cepCadastroCidade" 		class="obrigatorio" /><br />';
	_cep += 'Estado: 		<input type="text" 		name="cepCadastroEstado" 		id="cepCadastroEstado" 		class="obrigatorio" /><br />';
	_cep += 'Pais:	 		<input type="text" 		name="cepCadastroPais"	 		id="cepCadastroPais" 		class="obrigatorio" /><br />';
	$('#cep').append(_cep);
}
/**
 * mostra a parte do complemento do cep
 */
function mostrarCepComplemento(){
	var _cep = '';
	_cep += 'Número: 		<input type="text" name="cepXedicaoNumero" 		id="cepXedicaoNumero" 		maxlength="50" class="obrigatorio" /><br />';
	_cep += 'Complemento: 	<input type="text" name="cepXedicaoComplemento" id="cepXedicaoComplemento" 	maxlength="50" class="" /><br />';
	$('#cep').append(_cep);
}
/**
 * mostra o formulario do telefone
 */
function mostrarTelefone(){
	// pega o valor do campo que ira ficar setado a qtde de telefone
	var i = $('#qtdeTelefone').val();
	var _telefone = '';
	_telefone += '<div id="telefone'+i+'">';
	_telefone += 'Telefone tipo: <br />';
	_telefone += '<select name="telefoneTipo[]" id="telefoneTipo'+i+'" class="" >';
	_telefone += '	<option value=""> Selecione o tipo do telefone </option>';
	_telefone += '	<option value="residencial"> 	Residencial </option>';
	_telefone += '	<option value="celular"> 		Celular 	</option>';
	_telefone += '	<option value="comercial"> 		Comercial 	</option>';
	_telefone += '</select><br />';
	_telefone += 'Ddi:		<input type="text" name="telefoneDdi[]" 	id="telefoneDdi'+i+'" 		maxlength="5" 	class="" /><br />';
	_telefone += 'Ddd:		<input type="text" name="telefoneDdd[]" 	id="telefoneDdd'+i+'" 		maxlength="5" 	class="" /><br />';
	_telefone += 'Telefone:	<input type="text" name="telefoneNumero[]" 	id="telefoneNumero'+i+'" 	maxlength="15" 	class="telefone" /><br />';
	_telefone += 'ramal:	<input type="text" name="telefoneRamal[]" 	id="telefoneRamal'+i+'" 	maxlength="5" 	class="" /><br />';
	_telefone += 'recado:	<input type="text" name="telefoneRecado[]" 	id="telefoneRecado'+i+'" 	maxlength="100" />					  <br />';		
	_telefone += '		<input type="hidden" name="telefoneId[]" 	id="telefoneId'+i+'" 	maxlength="100" />					  <br />';	
	_telefone += '</div>';
		
	$('#telefone').append(_telefone);
	// soma e insere o valor de volta no campo
	aplicarMascara();
	// se for o primeiro tel deixa ele como obrigatorio
	if(i == 0){
		$('#telefoneTipo'+i).addClass('obrigatorio');
		$('#telefoneDdd'+i).addClass('obrigatorio');
		$('#telefoneNumero'+i).addClass('obrigatorio');
	}
	i++
	$('#qtdeTelefone').val(i);

}