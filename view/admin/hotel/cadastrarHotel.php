<?php

?>

<div id="formulario">
		<form action="hotelController.php" method="post" id="cadastroHotel" onsubmit="return verificarCampos();" >
			<input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarUsuario" />
			
			<input type="hidden" name="hotelId" id="hotelId" value="" />

			
			<div id="hotel" >
				<!-- hotel -->
				<label>Nome do hotel:</label><br />
				</label><input type="text" name="hotelNome" id="hotelNome" value="" maxlength="50" class="obrigatorio"  /><br />
				E-mail:<br />
				<input type="text" name="hotelEmail" id="hotelEmail" value="" maxlength="50" class="obrigatorio"  /><br />
				
				Cnpj: 	<br />
				<input type="text" name="hotelCnpj" id="hotelCnpj" value="" maxlength="50" class="obrigatorio"  /><br />
				Inscrição Estadual:	<br />
				<input type="text" name="hotelInscricaoEstadual" id="hotelInscricaoEstadual" value="" maxlength="50" class="obrigatorio"  /><br />
				Confirmacao de senha: 	<br />
				<input type="text" name="hotelGerente" id="hotelGerente" value="" maxlength="50" class="obrigatorio"  /><br />
				Observação:<br />
			
		        
			<div id='telefone'>
				<!-- telefone -->
			</div>
			<a onclick="chamarFuncaoTel()">+ telefone</a><br />
			<input type='hidden' name="qtdeTelefone" id="qtdeTelefone" value="" />
			           			
			           							
			<label for="cepPesquisa">Cep</label>
			<input type="text" 		name="cepPesquisa" 		id="cepPesquisa"    class="cep" />
			<input type="button" 	value="Pesquisar cep" onclick="cepPesquisar();" /><br />
			
			<input type="hidden" 	name="cepXedicaoTipo" 	id="cepXedicaoTipo" 	value="" />		      
			<input type="hidden" 	name="cepXedicaoId" 	id="cepXedicaoId" 	value="" />		  
			<div id='cep'>
				<!-- cep -->   
			</div>
			
									
			<input type="submit" name="cmdSalvar" value=" Cadastrar " />
		</form>
	</div>
