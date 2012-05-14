<?php
include('../../biblioteca/inicializacao_pagina.php');

if(($_POST['acao'] == 'logar')){
	// verifica se os campos estao vazios
	foreach($_POST AS $chave => $valor){
		if(empty($valor)){
			$erro_nome = 'Você tem que preencher todos os campos obrigatórios';
			$ERRO = true;
		}
	}
	if(!$ERRO){
		// coloca em caixa baixa e \ de escape
		foreach($_POST AS $chave => $valor){
			$_POST[$chave] = strtolower(addslashes($valor));
		}
		
		$UsuarioVo = new UsuarioVo();
		$usuarioBpm = new UsuarioBpm();		
	
		$UsuarioVo -> setUsuarioLogin($_POST['usuario_login']) ;
		$UsuarioVo -> setUsuarioSenha($_POST['usuario_senha']) ;
		$sucesso = $usuarioBpm -> logar($UsuarioVo);
		if(!$sucesso){
			$erro_nome = 'Usuário e senha incorretos';
			$ERRO = true;
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
		echo 'location.href="index.php";';
		echo '</script>';
	}

}
if(($_POST['acao'] == 'logar_lembrete')){
	// verifica se os campos estao vazios
	foreach($_POST AS $chave => $valor){
		if(empty($valor)){
			$erro_nome = 'Você tem que preencher todos os campos obrigatórios';
			$ERRO = true;
		}
	}
	if(!$ERRO){
		foreach($_POST AS $chave => $valor){
			$_POST[$chave] = strtolower(addslashes($valor));
		}
		
		$UsuarioVo = new UsuarioVo();
		$usuarioBpm = new UsuarioBpm();
		
		$UsuarioVo ->setUsuarioEmail($_POST['usuario_email']);
		$UsuarioVo ->setUsuarioLembrete($_POST['usuario_lembrete']);
		$sucesso = $usuarioBpm -> logarComLembrete($UsuarioVo);
		$sucesso = $usuarioBpm -> logar($UsuarioVo);
		if(!$sucesso){
			$erro_nome = 'Usuário e senha incorretos';
			$ERRO = true;
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