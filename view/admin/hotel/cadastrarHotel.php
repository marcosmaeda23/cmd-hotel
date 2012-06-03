<?php
session_start();
if(empty($_SESSION)){
	header('location: ../../');
}
if ($_SESSION['NIVEL'] <> 1 || $_SESSION['NIVEL'] <> 2){
	header('location: ../home/');
}



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
			
			<input type="hidden" name="paisOrigem" id="paisOrigem" value="<?php echo $_POST['paisOrigem'] ? $_POST['paisOrigem']: 'brasil'; ?>" />
			<input type="hidden" name="usuarioId" id="usuarioId" value="<?php echo $usuarioVo->getUsuarioId() ? $_POST['paisOrigem']: 'brasil'; ?>" />

			
			<div id="usuario" >
				<!-- usuario -->
				<label>Nome completo:</label><br />
				</label><input type="text" name="usuarioNome" id="usuarioNome" value="<?php echo $_POST['usuarioNome'] ? $_POST['usuarioNome']: $usuarioVo->getUsuarioNome(); ?>" maxlength="50" class="obrigatorio"  /><br />
				Seu e-mail:<br />
				<input type="text" name="usuarioEmail" id="usuarioEmail" value="<?php echo $_POST['usuarioEmail'] ? $_POST['usuarioEmail']:''; ?>" maxlength="50" class="obrigatorio"  /><br />
				Usuário: 	<br />
				<input type="text" name="usuarioLogin" id="usuarioLogin" value="" maxlength="50" class="obrigatorio"  /><br />
				Senha: 	<br />
				<input type="password" name="usuarioSenha"id="usuarioSenha" value="" maxlength="50" class="obrigatorio senha"  /><br />
				Confirmacao de senha: 	<br />
				<input type="password" name="usuarioConfirmacaoSenha" id="usuarioConfirmacaoSenha" value="" maxlength="50" class="obrigatorio senha"  /><br />
				Lembrete:<br />
				<input type="text" name="usuarioLembrete" id="usuarioLembrete" value="<?php  ?>" maxlength="50" /><br />
				
				<?php if($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?>
				Nivel:<br />
				<select name="nivelId" id="nivelId" class="obrigatorio" >
					<option value=""> Selecione o Nivel: </option>
					<option value="2"> Gerente </option>
					<option value="3"> Recepcionista </option>
				</select><br />
				<?php } else { ?>
						<input type="hidden" name="nivelId" id="nivelId" value="4" />
				<?php } ?>
				Eu Sou:<br />
				<select name="usuarioSexo" id="usuarioSexo" class="obrigatorio" >
					<option value=""> Selecione o gênero: </option>
					<option value="m"> Masculino </option>
					<option value="f"> Feminino </option>
				</select><br />
				Data de nascimento:	<br />
				<input type="text" name="usuarioDataNascimento" id="usuarioDataNascimento" value="" maxlength="50" class="obrigatorio data"  /><br />
				Documento tipo: 	<br />
				<select name="usuarioDocumentoTipo" id="usuarioDocumentoTipo" onchange="mudaMascara(this.value);" class="obrigatorio" >
					<option value=""> Selecione o tipo do documento: </option>
					<option value="cpf"> cpf </option>
					<option value="cnpj"> cnpj </option>
					<option value="passaporte"> passaporte </option>
				</select><br />
	           Documento numero: 	<br />
	           	<input type="text" name="usuarioDocumento" id="usuarioDocumento" value="" maxlength="50" class="obrigatorio"  /><br />
			</div> 	
		
		        
			<div id='telefone'>
				<!-- telefone -->
			</div>
			<a onclick="mostrarTelefone()">+ telefone</a><br />
			           							
			<label for="cepPesquisa">Cep</label><br>
			<input type="text" 	name="cepPesquisa" 		id="cepPesquisa"    class="cep" onblur="cepPesquisar();" /><br />
			<input type="hidden" 	name="cepCadastroPais" 	id="cepCadastroPais" 	value="" />	<br />
			<input type="hidden" 	name="cepXedicaoTipo" 	id="cepXedicaoTipo" 	value="" />		<br />       
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
	<script type="text/javascript" src="../../modulos/modulos.js"></script>
	<script type="text/javascript" src="../../_js/usuario.js"></script>
	<script type="text/javascript">
		<?php if (isset($_POST['paisOrigem'])){ ?>
			aplicarMascara(<?php $_POST['paisOrigem'];?>);
		<?php } ?>
	</script>
</html>
