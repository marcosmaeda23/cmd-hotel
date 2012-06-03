<?php 
require_once '../../../dao/Banco.php';
require_once '../../../dao/Entidade.php';
require_once '../../../dao/UsuarioDao.php';
require_once '../../../dao/TelefoneDao.php';
require_once '../../../dao/CepXedicaoDao.php';
require_once '../../../dao/CepCadastroDao.php';

require_once '../../../bpm/BpmGenerico.php';
require_once '../../../bpm/UsuarioBpm.php';
require_once '../../../bpm/CepBpm.php';
require_once '../../../bpm/TelefoneBpm.php';

require_once '../../../vo/UsuarioVo.php';
require_once '../../../vo/CepXedicaoVo.php';
require_once '../../../vo/CepCadastroVo.php';
require_once '../../../vo/TelefoneVo.php';

require_once '../../../biblioteca/funcoes.php';


// verificar a sessao
session_start();
$usuarioVo = new UsuarioVo();
if(!empty($_SESSION['NOME'])){
	if (!empty($_SESSION['ID'])){
		$usuarioBpm = new UsuarioBpm();
		// buscar usuario para mostrar nos campos
		$usuarioVo -> setUsuarioId($_SESSION['ID']);
		$usuarioVo = $usuarioBpm -> exibir($usuarioVo, 'usuario');
		
	}	
}
// array usado para o javascript setar os valores dentro dos campos
$telefoneArray = $usuarioVo->getTelefoneVo();

var_dump($usuarioVo);
//$cepXedicao = $usuarioVo->getCepxedicao();

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
			
			<input type="hidden" name="paisOrigem" id="paisOrigem" value="<?php echo $_POST['paisOrigem'] ? $_POST['paisOrigem']: 'brasil'; ?>" />
			<input type="hidden" name="usuarioId" id="usuarioId" value="<?php echo $usuarioVo->getUsuarioId() ? $_POST['paisOrigem']: 'brasil'; ?>" />

			
			<div id="usuario" >
				<!-- usuario -->
				<label>Nome completo:</label><br />
				</label><input type="text" name="usuarioNome" id="usuarioNome" value="<?php echo $_POST['usuarioNome'] ? $_POST['usuarioNome']: $usuarioVo->getUsuarioNome(); ?>" maxlength="50" class="obrigatorio"  /><br />
				Seu e-mail:<br />
				<input type="text" name="usuarioEmail" id="usuarioEmail" value="<?php echo $_POST['usuarioEmail'] ? $_POST['usuarioEmail']:$usuarioVo->getUsuarioEmail(); ?>" maxlength="50" class="obrigatorio"  /><br />
				
			
					Usuário: 	<br />
					<input type="text" name="usuarioLogin" id="usuarioLogin" value="<?php echo $usuarioVo->getUsuarioLogin(); ?>" maxlength="50" class="obrigatorio"  /><br />
					Senha: 	<br />
					<input type="password" name="usuarioSenha"id="usuarioSenha" value="" maxlength="50" class="obrigatorio senha"  /><br />
					Confirmacao de senha: 	<br />
					<input type="password" name="usuarioConfirmacaoSenha" id="usuarioConfirmacaoSenha" value="" maxlength="50" class="obrigatorio senha"  /><br />
					Lembrete:<br />
					<input type="text" name="usuarioLembrete" id="usuarioLembrete" value="<?php echo $usuarioVo->getUsuarioLembrete(); ?>" maxlength="50" /><br />
				
				
				<?php if($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?>
				Nivel:<br />
				<select name="nivelId" id="nivelId" class="obrigatorio" >
					<option value=""> Selecione o Nivel: </option>
					<option value="2"> Gerente </option>
					<option value="3"> Recepcionista </option>
				</select><br />
				<?php } else if($_SESSION['NIVEL'] == 3 ){ ?>
						<input type="hidden" name="nivelId" id="nivelId" value="3" />
				<?php } else { ?>
						<input type="hidden" name="nivelId" id="nivelId" value="4" />
				<?php } ?>
				
				
				Eu Sou:<br />
				<select name="usuarioSexo" id="usuarioSexo" class="obrigatorio" >
					<option value=""> Selecione o gênero: </option>
					<option value="m" <?php echo $usuarioVo->getUsuarioSexo() == 'm'?'selected=\'selected\'':''; ?>> Masculino </option>
					<option value="f" <?php echo $usuarioVo->getUsuarioSexo() == 'f'?'selected=\'selected\'':''; ?>> Feminino </option>
				</select><br />
				Data de nascimento:	<br />
				<input type="text" name="usuarioDataNascimento" id="usuarioDataNascimento" value="<?php echo $usuarioVo->getUsuarioDataNascimento();?>" maxlength="50" class="obrigatorio data"  /><br />
				Documento tipo: 	<br />
				<select name="usuarioDocumentoTipo" id="usuarioDocumentoTipo" onchange="mudaMascara(this.value);" class="obrigatorio" >
					<option value=""> Selecione o tipo do documento: </option>
					<option value="cpf" <?php echo $usuarioVo->getUsuarioDocumentoTipo() == 'cpf'?'selected=\'selected\'':''; ?>> cpf </option>
					<option value="cnpj" <?php echo $usuarioVo->getUsuarioDocumentoTipo() == 'cnpj'?'selected=\'selected\'':''; ?>> cnpj </option>
					<option value="passaporte" <?php echo $usuarioVo->getUsuarioDocumentoTipo() == 'passaporte'?'selected=\'selected\'':''; ?>> passaporte </option>
				</select><br />
	           Documento numero: 	<br />
	           	<input type="text" name="usuarioDocumento" id="usuarioDocumento" value="<?php echo $usuarioVo->getUsuarioDocumento();?>" maxlength="50" class="obrigatorio"  /><br />
			</div> 	
		
		        
			<div id='telefone'>
				<!-- telefone -->
			</div>
			<input type='hidden' name="qtdeTelefone" id="qtdeTelefone" value="" />
			<a onclick="chamarFuncaoTel()">+ telefone</a><br />
						           							
			<label for="cepPesquisa">Cep</label><br />
			<input type="text" 		name="cepPesquisa" 		id="cepPesquisa"    	value=""	class="cep" onblur="cepPesquisar();" /><br />
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
	$('#qtdeTelefone').val(0);
		// setar os campos do telefone
		telefoneArray = new Array();
		<?php for ( $i = 0; $i < count($telefoneArray); $i++ ) { ?>
		    var telefone = new Object(); 
		    <?php foreach ( $telefoneArray[$i]->telefoneObrigatorio as $chave => $valor) { ?>
       			telefone['<?php echo $chave;?>'] = '<?php eval('echo $telefoneArray['.$i.']->get'.ucfirst($chave).'();'); ?>';
			<?php }	?>
				telefoneArray[<?php echo $i;?>] = telefone;	     
		<?php }?>
      
      
      
		<?php if (isset($_POST['paisOrigem'])){ ?>
			aplicarMascara(<?php $_POST['paisOrigem'];?>);
		<?php } ?>
      
	</script>
</html>
