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
	var cep;
	
	// pega o cep digitado
		cep = $('#cepPesquisa').val();
		alert(cep);
	// faz a busca ajax
	// caso ache mostra a formulario 'cepVisulizacao' com os campos preenchidos e o formulario 'cepComplemento' setado o focus
	// e coloca o cep da pesquisa no campo hidden 'cepId' e coloca o valor no campo 'cepXedicaoTipo' 1 - nao cadastrar novo cep	
	
	// caso nao ache mostra uma mensagem no campo de resposta perguntando de deseja cadastrar o endereco
	// caso clicar mostra o formulario 'cepCadastro' setado o focus e o formulario 'cepComplemento'
	// e coloca o cep da pesquisa no campo hidden 'cepCadastroCep' e coloca o valor no campo 'cepXedicaoTipo' 0 - cadastrar novo cep
	
	$('#cepCadastro').show();
	$('#cepCadastroLogradouro').focus();
	$('#cepComplemento').hide();
	aplicarMascara();
}
/**
 * mostra o formulario de busca e cadastro do cep
 */
function mostrarCep(){
	var _cep = '';
	_cep += '<input type="hidden" name="cepCadastroPais" id="cepCadastroPais" maxlength="50" class="required"  /><br />';
	_cep += '<label for="cepPesquisa">Cep</label><br><input type="text" name="cepPesquisa" id="cepPesquisa" class="cep" onblur="cepPesquisar();" /><br />';
	_cep += '<input type="hidden" name="cepXedicaoTipo" id="cepXedicaoTipo" value=""  /><br />';
	_cep += '<div id="resposta"></div>';	
	$('#cep').append(_cep);
}
function mostrarCepPreenchido(){
	var _cep = '';					 	
	_cep += '<input type="hidden" name="cepId" id="cepId" maxlength="50" /><br />';
	_cep += 'Logradouro: <input type="text" name="logradouro" id="logradouro" /><br />';
	_cep += 'Bairro: <input type="text" name="bairro" id="cepbairro" /><br />';
	_cep += 'Cidade: <input type="text" name="cidade" id="cidade" /><br />';
	_cep += 'Estado: <input type="text" name="estado" id="estado" /><br />';
	_cep += 'Pais: <input type="text" name="pais" id="pais" /><br />';
	$('#cep').append(_cep);
}
function mostrarCepCadastro(){
	var _cep = '';
	_cep += '<input type="hidden" name="cepCadastroCep" id="cepCadastroCep" value="" /><br />';
	_cep += 'Logradouro: <input type="text" name="cepCadastroLogradouro" id="cepCadastroLogradouro" maxlength="50" class="required"  /><br />';
	_cep += 'Bairro: <input type="text" name="cepCadastroBairro" id="cepCadastroBairro" maxlength="50" class="required"  /><br />';
	_cep += 'Cidade: <input type="text" name="cepCadastroCidade" id="cepCadastroCidade" maxlength="50" class="required"  /><br />';
	_cep += 'Estado: <input type="text" name="cepCadastroEstado" id="cepCadastroEstado" maxlength="50" class="required"  /><br />';
	_cep += '</div>';
	$('#cep').append(_cep);
}
function mostrarCepComplemento(){
	var _cep = '';
	_cep += '<div id="cepComplemento" style="display:none;">';
	_cep += 'Número: <input type="text" name="cepXedicaoNumero" id="cepXedicaoNumero" maxlength="50" class="required"  /><br />';
	_cep += 'Complemento: <input type="text" name="cepXedicaoComplemento" id="cepXedicaoComplemento" maxlength="50" class="required"  /><br />';
	$('#cep').append(_cep);
}
/**
 * mostra o formulario do telefone
 */
function mostrarTelefone(){
	var _telefone = '';
	_telefone += 'Telefone tipo: <select name="telefoneTipo[]" id="telefoneTipo" class="cadastro_selecao_especial" >';
	_telefone += '<option value=""> Selecione o tipo do telefone: </option>';
	_telefone += '<option value="residencial"> residencial </option>';
	_telefone += '<option value="celular"> celular </option>';
	_telefone += '<option value="comercial"> comercial </option>';
	_telefone += '</select><br />';
	_telefone += 'Ddi:<input type="text" name="telefoneDdi[]" id="telefoneDdi" maxlength="5" class="required"  /><br />';
	_telefone += 'Ddd:<input type="text" name="telefoneDdd[]" id="telefoneDdd" maxlength="5" class="required"  /><br />';
	_telefone += 'Telefone:<input type="text" name="telefoneNumero[]" id="telefoneNumero" maxlength="15" class="required"  /><br />';
	_telefone += 'ramal:<input type="text" name="telefoneRamal[]" id="telefoneRamal" maxlength="5" class="required"  /><br />';
	_telefone += 'recado:<input type="text" name="telefoneRecado[]" id="telefoneRecado" maxlength="100" /><br />';	
	_telefone += '<a href="" onclick="mostrarTelefone()">+ telefone</a><br />';	
	$('#telefone').append(_telefone);

}