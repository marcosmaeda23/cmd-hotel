<?php

require_once '../../dao/UsuarioDao.php';
require_once '../../bpm/UsuarioBpm.php';
require_once '../../vo/UsuarioVo.php';

if($_POST['acao'] == 'sair'){
	$sucesso = deslogar();
	if($sucesso){
		echo 'sucesso';
	} else {
		echo 'fracasso';
	}
}
if($_POST['acao'] == 'excluir'){
	$fotoBpm = new FotoBpm();
	if(!empty($_POST['foto_tipo'])){
		$param = ' WHERE foto_tipo = "' .$_POST['foto_tipo'].'"';
	}

	$sucesso = $fotoBpm ->excluir($param);
	if(!$sucesso){
		$ERRO = true;
	}
	if(!$ERRO){
		echo 'sucesso';
	} else {
		echo 'fracasso';
	}
}

if($_POST['acao'] == 'cadastrar_mensagem'){
	foreach ($_POST as $chave => $valor){
		if(empty($valor)){
			$erro_nome = 'preencha todos os campos obrigatorios';
			$ERRO = true;
		}
	}
	if(!$ERRO){
		foreach ($_POST as $chave => $valor){
			$_POST[$chave] = trim($valor);
		}
		$mensagemBpm = new MensagemBpm();
		$camposObrigatorios = $mensagemBpm -> camposObrigatorios();

		foreach ($camposObrigatorios as $chave => $valor){
			if(empty($_POST[ $chave])){
				$ERRO = true;
				$erro_nome = 'O campo '.$valor.' é obrigatório';
			}
		}
	}
	if(!$ERRO){
		$mensagemVo = new MensagemVo();
		$mensagemVo -> setMensagemTexto($_POST['mensagem_texto']);
		$mensagemVo -> setUsuario($_POST['usuario']);
		$sucesso = $mensagemBpm -> cadastrar($mensagemVo);
		if(!$sucesso){
			$ERRO = true;
			$erro_nome = 'Erro ao cadastrar mensagem no banco.';
		}
	}
	if(!$ERRO){
		echo '<script language="JavaScript">';
		echo 'alert("Mensagem cadastrada com sucesso");';
		echo 'location.href="index.php";';
		echo '</script>';
	} else {
		echo '<script language="JavaScript">';
		echo 'alert("'.$erro_nome.'");';
		echo 'location.href="index.php";';
		echo '</script>';
	}

}
if($_POST['acao'] == 'cadastrar_contato'){
	foreach ($_POST as $chave => $valor){
		if(empty($valor)){
			$erro_nome = 'preencha todos os campos obrigatorios';
			$ERRO = true;
		}
	}
	if(!$ERRO){
		foreach ($_POST as $chave => $valor){
			$_POST[$chave] = trim($valor);
		}

		$contatoBpm = new ContatoBpm();
		$camposObrigatorios = $contatoBpm -> camposObrigatorios();

		foreach ($camposObrigatorios as $chave => $valor){
			if(empty($_POST[ $chave])){
				$ERRO = true;
				$erro_nome = 'O campo '.$valor.' é obrigatório';
			}
		}
	}
	if(!$ERRO){
		$contatoVo = new ContatoVo();
		$contatoVo -> setContatoNome($_POST['contato_nome']);
		$contatoVo -> setUsuario($_POST['usuario']);
		$sucesso = $contatoBpm -> cadastrar($contatoVo);
		if(!$sucesso){
			$ERRO = true;
			$erro_nome = 'Erro ao cadastrar contato no banco.';
		}
	}
	if(!$ERRO){
		echo '<script language="JavaScript">';
		echo 'alert("Contato cadastrada com sucesso");';
		echo 'location.href="index.php";';
		echo '</script>';
	} else {
		echo '<script language="JavaScript">';
		echo 'alert("'.$erro_nome.'");';
		echo 'location.href="index.php";';
		echo '</script>';
	}

}
if($_POST['acao'] == 'cadastrar_foto'){
	$fotoBpm = new FotoBpm();

	$fotoVo = new FotoVo();
	$fotoVo-> setFotoNome($_FILES);
	$fotoVo-> setFotoTipo($_POST['foto_tipo']);
	$fotoVo-> setUsuario($_POST['usuario']);

	$sucesso = $fotoBpm ->cadastrar($fotoVo);
	if(!$sucesso){
		$ERRO = true;
		$erro_nome = 'Erro ao cadastrar foto no banco.';
	}
	if(!$ERRO){
		echo '<script language="JavaScript">';
		echo 'alert("foto cadastrada com sucesso");';
		echo 'location.href="index.php";';
		echo '</script>';
	} else {
		echo '<script language="JavaScript">';
		echo 'alert("'.$erro_nome.'");';
		echo 'location.href="index.php";';
		echo '</script>';
	}
}


?>