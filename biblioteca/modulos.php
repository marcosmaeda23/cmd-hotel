<?php
/**
 * funcao que mostra o cadastro de telefone
 * @param qtde de telefone
 */
function mostrarTelefone(){ ?>
	
	<label>Telefone tipo: </label><br />
	<select name="telefoneTipo[]" id="telefoneTipo" class="cadastro_selecao_especial" >
		<option value=""> Selecione o tipo do telefone: </option>
		<option value="residencial"> residencial </option>
		<option value="celular"> celular </option>
		<option value="comercial"> comercial </option>
	</select><br/>
	<label>Ddi:</label>
	<input type="text" name="telefoneDdi[]" id="telefoneDdi" maxlength="5" class="required"  /><br />
	Ddd:<input type="text" name="telefoneDdd[]" id="telefoneDdd" maxlength="5" class="required"  /><br />
	Telefone:<input type="text" name="telefoneNumero[]" id="telefoneNumero" maxlength="15" class="required"  /><br />
	ramal:<input type="text" name="telefoneRamal[]" id="telefoneRamal" maxlength="5" class="required"  /><br />
	recado:<input type="text" name="telefoneRecado[]" id="telefoneRecado" maxlength="100" /><br />
	<a href="" onclick="mostrarTelefone()">+ telefone</a><br />	


<?php
}

?>
