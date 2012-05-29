/*
funcao de modulo de telefone, cep
depois da funcao ser chamada executa a mascara
dependencia jquery.maskedinput
*/

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
	if (cep == '__ ___-___') {
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
				mostrarCepCadastro();
				// seta o valor com 1 para cadastrar 
				$('#cepXedicaoTipo').val(1);
				
				$('#cepCadastroCep').val($('#cepPesquisa').val());
				
			} else {
				mostrarCepPreenchido();
				// mostra os campos do cep com os valores preenchidos
				$('#cepId').val();
				$('#logradouro').val();
				$('#bairro').val();
				$('#cidade').val();
				$('#estado').val();
				$('#pais').val();
				// seta o valor como 2 para nao gravar o cepCadastro no banco
				$('#cepXedicaoTipo').val(2);
				
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
	mostrarCepComplemento();
}
/**
 * mostra a parte do cadastro do cep, para salvar no banco
 */
function mostrarCepCadastro(){
	var _cep = '';
	_cep += '				<input type="hidden" 	name="cepCadastroCep" 			id="cepCadastroCep" 				value="" />	<br />';
	_cep += 'Logradouro: 	<input type="text" 		name="cepCadastroLogradouro"	id="cepCadastroLogradouro" 	class="obrigatorio" /><br />';
	_cep += 'Bairro: 		<input type="text" 		name="cepCadastroBairro" 		id="cepCadastroBairro" 		class="obrigatorio" /><br />';
	_cep += 'Cidade: 		<input type="text" 		name="cepCadastroCidade" 		id="cepCadastroCidade" 		class="obrigatorio" /><br />';
	_cep += 'Estado: 		<input type="text" 		name="cepCadastroEstado" 		id="cepCadastroEstado" 		class="obrigatorio" /><br />';
	_cep += 'Pais:	 		<input type="text" 		name="cepCadastroPais"	 		id="cepCadastroPais" 		class="obrigatorio" /><br />';
	$('#cep').append(_cep);
	mostrarCepComplemento();
	$('#cepCadastroLogradouro').focus();
}
/**
 * mostra a parte do complemento do cep
 */
function mostrarCepComplemento(){
	var _cep = '';
	_cep += 'Número: 		<input type="text" name="cepXedicaoNumero" 		id="cepXedicaoNumero" 		maxlength="50" class="obrigatorio" /><br />';
	_cep += 'Complemento: 	<input type="text" name="cepXedicaoComplemento" id="cepXedicaoComplemento" 	maxlength="50" class="obrigatorio" /><br />';
	$('#cep').append(_cep);
}
/**
 * mostra o formulario do telefone
 */
function mostrarTelefone(){
	var _telefone = '';
	_telefone += 'Telefone tipo: <br />';
	_telefone += '<select name="telefoneTipo[]" id="telefoneTipo" class="obrigatorio" >';
	_telefone += '	<option value=""> Selecione o tipo do telefone </option>';
	_telefone += '	<option value="residencial"> 	Residencial </option>';
	_telefone += '	<option value="celular"> 		Celular 	</option>';
	_telefone += '	<option value="comercial"> 		Comercial 	</option>';
	_telefone += '</select><br />';
	_telefone += 'Ddi:		<input type="text" name="telefoneDdi[]" 	id="telefoneDdi" 	maxlength="5" 	class="obrigatorio" /><br />';
	_telefone += 'Ddd:		<input type="text" name="telefoneDdd[]" 	id="telefoneDdd" 	maxlength="5" 	class="obrigatorio" /><br />';
	_telefone += 'Telefone:	<input type="text" name="telefoneNumero[]" 	id="telefoneNumero" maxlength="15" 	class="obrigatorio" /><br />';
	_telefone += 'ramal:	<input type="text" name="telefoneRamal[]" 	id="telefoneRamal" 	maxlength="5" 	class="obrigatorio" /><br />';
	_telefone += 'recado:	<input type="text" name="telefoneRecado[]" 	id="telefoneRecado" maxlength="100" />					  <br />';	
		
	$('#telefone').append(_telefone);

}