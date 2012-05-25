<?php 
// verificar a sessao

// se for sessao de cliente mostrar o cadastro preenchido botao pra apagar cadastro ou alterar, o campo de senha tbm
// ou sem sessao de cliente cadastro normal , o campo de senha tbm

// sessao de gerente mostrar nivel de acesso, apagar, alterar, cadastrar, nao mostrar campo de senha e sim um botao para enviar email para o cliente

// sessao do recepcionista , cadastrar, alterar, nao mostrar campo de senha e sim um botao para enviar email pro cliente


?>

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
	<title> </title>
</head>
<body>		
	<div id="formulario">
		<form action="usuarioController.php" method="post" id="cadastroUser" onsubmit="return verificarCampos();" >
			<input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarUsuario" />
			<input type="hidden" name="usuarioStatus" id="usuarioStatus" value="1" />			
			
			<input type="text" name="paisOrigem" id="paisOrigem" value="<?php echo $_POST['paisOrigem'] ? $_POST['paisOrigem']: 'brasil'; ?>" />

			
			<div id="usuario" >
				<!-- usuario -->
				<label>Nome completo:</label><br />
				</label><input type="text" name="usuarioNome" id="usuarioNome" value="<?php echo $_POST['usuarioNome'] ? $_POST['usuarioNome']: ''; ?>" maxlength="50" class="obrigatorio"  /><br />
				Seu e-mail:<br />
				<input type="text" name="usuarioEmail" id="usuarioEmail" value="<?php echo $_POST['usuarioEmail'] ? $_POST['usuarioEmail']: ''; ?>" maxlength="50" class="obrigatorio"  /><br />
				Usuário: 	<br />
				<input type="text" name="usuarioLogin" id="usuarioLogin" maxlength="50" class="obrigatorio"  /><br />
				Senha: 	<br />
				<input type="password" name="usuarioSenha"id="usuarioSenha" maxlength="50" class="obrigatorio senha"  /><br />
				Confirmacao de senha: 	<br />
				<input type="password" name="usuarioConfirmacaoSenha" id="usuarioConfirmacaoSenha"  maxlength="50" class="obrigatorio senha"  /><br />
				Lembrete:<br />
				<input type="text" name="usuarioLembrete" id="usuarioLembrete" maxlength="50" /><br />
				Eu Sou:<br />
				<select name="usuarioSexo" id="usuarioSexo" class="obrigatorio" >
					<option value=""> Selecione o gênero: </option>
					<option value="m"> Masculino </option>
					<option value="f"> Feminino </option>
				</select><br />
				Data de nascimento:	<br />
				<input type="text" name="usuarioDataNascimento" id="usuarioDataNascimento" maxlength="50" class="obrigatorio data"  /><br />
				Documento tipo: 	<br />
				<select name="usuarioDocumentoTipo" id="usuarioDocumentoTipo" onchange="mudaMascara(this.value);" class="obrigatorio" >
					<option value=""> Selecione o tipo do documento: </option>
					<option value="cpf"> cpf </option>
					<option value="cnpj"> cnpj </option>
					<option value="passaporte"> passaporte </option>
				</select><br />
	           Documento numero: 	<br />
	           	<input type="text" name="usuarioDocumento" id="usuarioDocumento" maxlength="50" class="obrigatorio"  /><br />
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
	<!-- scripts -->
	<script type="text/javascript" src="../../_js/slider/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../../_js/plugin/jquery.maskedinput-1.3.min.js"></script>
	<script type="text/javascript" src="../../_js/funcoes.js"></script>
	<script type="text/javascript" src="../../_js/modulos.js"></script>
	<script type="text/javascript" src="../../_js/usuario.js"></script>
	<script type="text/javascript">
		<?php if (isset($_POST['paisOrigem'])){ ?>
			aplicarMascara(<?php $_POST['paisOrigem'];?>);
		<?php } ?>
	</script>
</html>
