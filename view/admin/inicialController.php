<?php

require_once '../../dao/UsuarioDao.php';
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

        // o logar precisa ser como login e senha e nao como usuarioLogin e usuarioSenha
        $usuarioVo->setUsuarioLogin($_POST['login']);
        $usuarioVo->setUsuarioSenha(md5($_POST['senha']));
        
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
// -------------------------------
// para cadastrar
// ------------------------------- 
if ($_POST['acao'] == 'cadastrarUsuario') {
	$_POST['nivelId'] = 4;
    $usuarioVo = new UsuarioVo();
    $telefoneVo = new TelefoneVo();
    $usuarioBpm = new UsuarioBpm();
   
	// verifica se os campos do usuario estao vazios		
	foreach ( $usuarioVo->usuarioObrigatorio as $chave => $valor ) {
		// faz a validacao dos campos obrigatorios, setados na classe
		if ($valor == 'obrigatorio') {
			if (empty($_POST[$chave])){
				$erro_nome = 'Preencha todos os campos do formulário.';
				$ERRO = true;
			}
		} 	
	}
	// verifica se os campos do telefone estao vazios
	foreach ( $usuarioVo->telefoneObrigatorio as $chave => $valor ) {		
		// faz a validacao dos campos obrigatorios, setados na classe
		if ($valor == 'obrigatorio') {
			if (empty($_POST[$chave])){
				$erro_nome = 'Preencha todos os campos do formulário.';
				$ERRO = true;
			} 	
		} 	
	}
 	// verifica se os campos do cep estao vazios
 	
 	
	if (!$ERRO){		
		foreach ($_POST as $chave => $valor) {	
			// validacoes
			if ($chave == 'usuarioConfirmacaoSenha') {
				// verifica se a senha eh igual a verifirmacao da senha
				$sucesso = verificarConfirmacaoSenha($_POST['senha'], $_POST['confirmacaoSenha']);
			    if (!$sucesso) {
			        $ERRO = true;
			        $erro_nome .= 'A senha está diferente da confirmação da senha.';
			    	break;
			    }
			}
			if ($chave == 'usuarioLogin') {
				// verifica se o login ja existe no banco
				$usuarioVo->setUsuarioLogin($valor);
		        $sucesso = $usuarioBpm->verificarLogin($usuarioVo);
			    if (!$sucesso) {
			        $ERRO = true;
			        $erro_nome .= 'O login já está cadastado no banco.';
			    	break;
			    }
			}
			if ($chave == 'usuarioDocumento') {
				// verifica o documento do usuario
		        $sucesso = validarDocumento($_POST['usuarioDocumentoTipo'], $_POST['usuarioDocumento']);
			    if (!$sucesso) {
			        $ERRO = true;
			        $erro_nome .= 'O documento não é válido.';
			    	break;
			    }
			}
			if ($chave == 'usuarioEmail') {
				// verifica se o email esta no formato valido
				$sucesso = validarEmail($valor);
		        if (!$sucesso) {
		            $ERRO = true;
		            $erro_nome .= 'O email não é válido.';
		            break;
		        }
		        
		        // verificar se email ja existe no banco	        
		        $usuarioVo->setUsuarioEmail($valor);
		        $sucesso = $usuarioBpm->verificarExistenciaEmail($usuarioVo);
		        if (!$sucesso) {
		            $ERRO = true;
		            $erro_nome .= 'O email já está cadastrado na base de dados.';
		            break;
		        }
			}
			
			if ($chave == 'usuarioDataNascimento') {
				// verifica se a data eh invalida, se for muda para a data do banco
				$resposta = validarData($valor);
		        if (!$resposta) {
		            $ERRO = true;
		            $erro_nome .= 'A data não é válida.';
		            break;
		        }
		        else {
		        	$valor = $resposta;
		        }
			}
			if ($chave == 'usuarioSenha') {
				// insere \ para evitar o injection e md5
				$valor = md5(addcslashes($valor));
			}
			
			// verifica qual o objeto e coloca nele
			if (array_key_exists($chave, $usuarioVo->usuarioObrigatorio)) {
				eval('$usuarioVo->set'.ucfirst($chave).'('.$valor.');');	
			}
			if (array_key_exists($chave, $telefoneVo->telefoneObrigatorio)) {
				eval('$telefoneVo->set'.ucfirst($chave).'('.$valor.');');
			}
		}		
	}
	echo $erro_nome;
	if (!$ERRO) { 		
		$usuarioVo->setTelefoneVo($telefoneVo);	
	//var_dump($usuarioVo);
		$sucesso = $usuarioBpm->cadastrarAlterar($usuarioVo, 'usuario');
        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'O ocorreu um erro ao cadastrar o usuario';
    	}
	}
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