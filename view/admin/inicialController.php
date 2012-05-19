<?php

require_once '../../dao/Banco.php';
require_once '../../dao/Entidade.php';
require_once '../../dao/UsuarioDao.php';
require_once '../../bpm/BpmGenerico.php';
require_once '../../bpm/UsuarioBpm.php';
require_once '../../vo/UsuarioVo.php';
require_once '../../vo/TelefoneVo.php';
require_once '../../biblioteca/funcoes.php';

if ($_POST['acao'] == 'logar') {
    // verifica se os campos estao vazios
    foreach ($_POST AS $chave => $valor) {
        if (empty($valor)) {
            $erro_nome = 'Você tem que preencher todos os campos obrigatórios.';
            $ERRO = true;
        }
    }
    if (!$ERRO) {
        // coloca \ de escape
        foreach ($_POST AS $chave => $valor) {
            $_POST[$chave] = addslashes($valor);
        }

        $usuarioVo = new UsuarioVo();
        $usuarioBpm = new UsuarioBpm();

        $usuarioVo->setLogin($_POST['usuarioLogin']);
        $usuarioVo->setSenha($_POST['usuarioSenha']);
        $resposta = $usuarioBpm->logar($usuarioVo);
        switch ($resposta) {
            case 0 : $ERRO = false;
                break;
            case 1 : $erro_nome = 'Nome do usuário incorreto.';
                $ERRO = true;
                break;
            case 2 : $erro_nome = 'Senha do usuário incorreto.';
                $ERRO = true;
                break;
            default: $erro_nome = 'Usuário não encontrado.';
                $ERRO = true;
                break;
        }
    }

    if (!$ERRO) {
        echo '<script language="JavaScript">';
        echo 'alert("Bem vindo");';
        echo 'location.href="home/index.php";';
        echo '</script>';
    } else {
        echo '<script language="JavaScript">';
        echo 'alert("' . $erro_nome . '");';
        echo 'location.href="index.php";';
        echo '</script>';
    }
}

// para cadastrar
if ($_POST['acao'] == 'cadastrarUsuario') {
    $usuarioVo = new UsuarioVo();
    $telefoneVo = new TelefoneVo();
    $usuarioBpm = new UsuarioBpm();
    
	$_POST['nome'] = $_POST['nome'].' '. $_POST['sobrenome'];
    var_dump($_POST);

	// verifica se os campos do usuario estao vazios
	for ( $i = 0; $i < count($usuarioVo->usuarioObrigatorio); $i++ ) {		
		// faz a validacao dos campos obrigatorios, setados na classe
		if (empty($_POST[$usuarioVo->usuarioObrigatorio[$i]])){
			$erro_nome = 'Preencha todos os campos do formulário.';
			$ERRO = true;
		} 	
	}
	// verifica se os campos do telefone estao vazios
	for ( $i = 0; $i < count($telefoneVo->telefoneObrigatorio); $i++ ) {		
		// faz a validacao dos campos obrigatorios, setados na classe
		if (empty($_POST[$telefoneVo->telefoneObrigatorio[$i]])){
			$erro_nome = 'Preencha todos os campos do formulário.';
			$ERRO = true;
		} 	
	}
 	
	if (!$ERRO){		
		foreach ($_POST as $chave => $valor) {	
			// validacoes
			if ($chave == 'confirmacaoSenha') {
				// verifica se a senha eh igual a verifirmacao da senha
				$sucesso = verificarConfirmacaoSenha($_POST['senha'], $_POST['confirmacaoSenha']);
			    if (!$sucesso) {
			        $ERRO = true;
			        $erro_nome .= 'A senha está diferente da confirmação da senha.';
			    	break;
			    }
			}
			if ($chave == 'login') {
				// verifica se o login ja existe no banco
				$usuarioVo->setLogin($valor);
		        $sucesso = $usuarioBpm->verificarLogin($usuarioVo);
			    if (!$sucesso) {
			        $ERRO = true;
			        $erro_nome .= 'O login já está cadastado no banco.';
			    	break;
			    }
			}
			if ($chave == 'email') {
				// verifica se o email esta no formato valido
				$sucesso = validarEmail($valor);
		        if (!$sucesso) {
		            $ERRO = true;
		            $erro_nome .= 'O email não é válido.';
		            break;
		        }
		        
		        // verificar se email ja existe no banco	        
		        $usuarioVo->setEmail($valor);
		        $sucesso = $usuarioBpm->verificarExistenciaEmail($usuarioVo);
		        if (!$sucesso) {
		            $ERRO = true;
		            $erro_nome .= 'O email já está cadastrado na base de dados.';
		            break;
		        }
			}
			
			if ($chave == 'dataNascimento') {
				// verifica se a data eh invalida, se for muda para a datado banco
				$resposta = validarData($valor);
		        if (!$resposta) {
		            $ERRO = true;
		            $erro_nome .= 'A data é inválida..';
		            break;
		        }
		        else {
		        	$valor = $resposta;
		        }
			}
			if ($chave == 'senha') {
				// insere \ para evitar o injection e md5
				$valor = md5(addcslashes($valor));
			}					
		}		
	}
	if (!$ERRO) { 
		// coloca o post no objeto
		
			if($chave <> 'sobrenome' && $chave <> 'confirmacaoSenha' &&  $chave <> 'acao') {
				var_dump(ucfirst($chave));
			eval('$usuarioVo->set').ucfirst($chave).'('.$valor.');';	
			}
			var_dump($usuarioVo);
			$sucesso = $usuarioBpm->cadastrarAlterar($usuarioVo, 'usuario');
	        if (!$sucesso) {
	            $ERRO = true;
	            $erro_nome .= 'O ocorreu um erro ao cadastrar o usuario';
	        }
	}
	echo $erro_nome;
	exit(); 
	
    if (!$ERRO) {
        echo '<script language="JavaScript">';
        echo 'alert("Bem vindo");';
        echo 'location.href="../galeria/index.php";';
        echo '</script>';
    } else {
        echo '<script language="JavaScript">';
        echo 'alert("' . $erro_nome . '");';
		echo 'location.href="../index.php";';
        echo '</script>';

    }
}
?>