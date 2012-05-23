<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
<!--
 * Created on 22/05/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
-->
<head>
	<script type="text/javascript" src="../../_js/slider/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../../_js/jquery.maskedinput-1.3.min.js"></script>
	<script type="text/javascript" src="../_js/funcoes.js"></script>
	<script type="text/javascript" src="../_js/modulos.js"></script>
	<script type="text/javascript" src="../_js/cadastroUsuario.js"></script>

	<title> </title>
</head>
<body>
 
 
 
		
	<div id="formulario">
		<form action="admin/inicialController.php" method="post" id="cadastroUser"  >
			<input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarUsuario" /><br />
			<input type="hidden" name="usuarioStatus" id="usuarioStatus" value="1" /><br />
			Pais: <input type="text" name="paisPesquisa" id="paisPesquisa" maxlength="50" onblur="aplicarMascara();" class="required"  /><br />
		
		<div id="usuario">
		<!-- usuario -->
			<label>Nome completo:
			<br />
			</label><input type="text" name="usuarioNome" id="usuarioNome" maxlength="50" class="required"  /><br />
			Seu e-mail:<br />
			<input type="text" name="usuarioEmail" id="usuarioEmail" maxlength="50" class="required"  /><br />
			Usuário: 	<br />
			<input type="text" name="usuarioLogin" id="usuarioLogin" maxlength="50" class="required"  /><br />
			Senha: 	<br />
			<input type="password" name="usuarioSenha"id="usuarioSenha" maxlength="50" class="required senha"  /><br />
			Confirmacao de senha: 	<br />
			<input type="password" name="usuarioConfirmacaoSenha" id="usuarioConfirmacaoSenha"  maxlength="50" class="required senha"  /><br />
			Lembrete:<br />
			<input type="text" name="usuarioLembrete" id="usuarioLembrete" maxlength="50" /><br />
			Eu Sou:<br />
			<select name="usuarioSexo" id="usuarioSexo" class="cadastro_selecao_especial" >
				<option value=""> Selecione o gênero: </option>
				<option value="m"> Masculino </option>
				<option value="f"> Feminino </option>
			</select><br />
			Data de nascimento:	<br />
			<input type="text" name="usuarioDataNascimento" id="usuarioDataNascimento" maxlength="50" class="required data"  /><br />
			Documento tipo: 	<br />
			<select name="usuarioDocumentoTipo" id="usuarioDocumentoTipo" onchange="mudaMascara(this.value);" class="cadastro_selecao_especial" >
				<option value=""> Selecione o tipo do documento: </option>
				<option value="cpf"> cpf </option>
				<option value="cnpj"> cnpj </option>
				<option value="passaporte"> passaporte </option>
			</select><br />
           Documento numero: 	<br />
           	<input type="text" name="usuarioDocumento" id="usuarioDocumento" maxlength="50" class="required"  /><br />
		</div> 
		
		
		        
		<div id='telefone'>
			<!-- telefone -->
		</div>
		           							
		<div id='cep'>
			<!-- cep -->   
		</div>				
		           
		
		
		<input type="submit" name="cmdSalvar" value=" Cadastrar " />
		</form>
	</div>
</body>
</html>
