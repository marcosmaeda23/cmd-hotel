<?php
include('../../biblioteca/inicializacao_pagina.php');


if($_POST['acao'] == 'logar'){
	// verifica se os campos estao vazios
	foreach($_POST AS $chave => $valor){
		if(empty($valor)){
			$erro_nome = 'Voc� tem que preencher todos os campos obrigat�rios';
			$ERRO = true;
		}
	}
	
	if(!$ERRO){
	
		// coloca \ de escape
		foreach($_POST AS $chave => $valor){
			$_POST[$chave] = addslashes($valor);
		}
		
		$usuarioVo = new UsuarioVo();
		$usuarioBpm = new UsuarioBpm();
		
		$usuarioVo -> setLogin($_POST['login']) ;
		$usuarioVo -> setSenha(md5($_POST['senha'])) ;
		$resposta = $usuarioBpm -> logar($usuarioVo);
		echo $resposta;
		exit();
		switch ($resposta) {
			case 0 : $ERRO = false;		
					break;
			case 1 : $erro_nome = 'Nome do usu�rio incorreto.';
					$ERRO = true;		
					break;
			case 2 : $erro_nome = 'Senha do usu�rio incorreto';
					$ERRO = true;		
					break;
			default: $erro_nome = 'Usu�rio n�o encontrado.';
					$ERRO = true;		
					break;		
		}
	}

	if(!$ERRO){
		echo '<script language="JavaScript">';
		echo 'alert("Bem vindo");';
		echo 'location.href="galeria/index.php";';
		echo '</script>';
	} else {
		echo '<script language="JavaScript">';
		echo 'alert("'.$erro_nome.'");';
		echo 'location.href="index.php";';
		echo '</script>';
	}
}

// para cadastrar
if($_POST['acao'] == 'cadastrar_usuario'){
	$usuarioVo = new UsuarioVo();

	// verificar confirmacao da senha
	$sucesso = verificarConfirmacaoSenha($_POST['usuario_senha'],  $_POST['confirmacao_senha']);
	if(!$sucesso){
		$ERRO = true;
		$erro_nome = 'A senha está diferente da confirmação de senha';
	}

	// validar se o email e valido
	if(!$ERRO){
		$sucesso = validaEmail($_POST['usuario_email']);
		if(!$sucesso){
			$ERRO = true;
			$erro_nome = 'O email não é válido';
		}
	}
	if(!$ERRO){
		// verificar se email ja existe no banco
		$usuarioBpm = new UsuarioBpm();
		$usuarioVo -> setUsuarioEmail($_POST['usuario_email']);
		$sucesso = $usuarioBpm -> verificarExistenciaEmail($usuarioVo);
		if(!$sucesso){
			$ERRO = true;
			$erro_nome = 'O email ja esta cadastrado na base de dados.\Tente fazer o login com o lembrete da senha';
		}
	}
	if(!$ERRO){
		// coloca nas veriaveis e depois faz o insert

		$usuarioVo -> setUsuarioNome($_POST['usuario_nome']);
		$usuarioVo -> setUsuarioLogin($_POST['usuario_login']);
		$usuarioVo -> setUsuarioSenha($_POST['usuario_senha']);
		$usuarioVo -> setUsuarioLembrete($_POST['usuario_lembrete']);
		$sucesso = $usuarioBpm -> cadastrar($usuarioVo);
		if(!$sucesso){
			$ERRO = true;
			$erro_nome = 'O ocorreu um erro ao cadastrar o usuario';
		}
	}
	if(!$ERRO){
		echo '<script language="JavaScript">';
		echo 'alert("Bem vindo");';
		echo 'location.href="../galeria/index.php";';
		echo '</script>';

	} else {
		echo '<script language="JavaScript">';
		echo 'alert("'.$erro_nome.'");';

		echo '</script>';
		include('cadastro_login.php');
	}
}




?>