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

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 

if ($_POST['acao'] == 'cadastrarUsuario') {
    $usuarioVo = new UsuarioVo();
    $usuarioBpm = new UsuarioBpm();
    $telefoneVo = new TelefoneVo();
    $cepXedicaoVo = new CepXedicaoVo();
    $cepCadastroVo = new CepCadastroVo();
    
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
	// verifica se os campos do telefone estao vazios na posicao 0		
	foreach ( $telefoneVo->telefoneObrigatorio as $chave => $valor ) {
		// faz a validacao dos campos obrigatorios, setados na classe
		if ($valor == 'obrigatorio') {
			if (empty($_POST[$chave][0])){
				$erro_nome = 'do formulário.';
				$ERRO = true;
			}
		} 	
	}
	
 	// verifica se os campos do cadastro do cep estao vazios
 	if (isset($_POST['cepCadastroLogradouro'])){
		foreach ( $cepCadastroVo->cepCadastroObrigatorio as $chave => $valor ) {		
			// faz a validacao dos campos obrigatorios, setados na classe
			if ($valor == 'obrigatorio') {
				if (empty($_POST[$chave])){
					$erro_nome = 'Preencha todos os campos do formulário.';
					$ERRO = true;
				} 	
			} 	
		} 		
 	}
	// verifica se os campos do CepXedicao estao completos
	foreach ( $cepXedicao->$cepXedicaoObrigatorio as $chave => $valor ) {		
		// faz a validacao dos campos obrigatorios, setados na classe
		if ($valor == 'obrigatorio') {
			if (empty($_POST[$chave])){
				$erro_nome = 'Preencha todos os campos do formulário.';
				$ERRO = true;
			} 	
		} 	
	} 	

	// se não teve enhum erro de campos obrigatorios
	if (!$ERRO){	
		// loop para fazer as validacoes do post inteiro
	
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
		        if ($resposta == false) {
		            $ERRO = true;
		            $erro_nome .= 'A data não é válida.';
		            break;
		        }
		        else {
		        	$_POST[$chave] = $resposta;
		        }
			}
			if ($chave == 'usuarioSenha') {
				// insere \ para evitar o injection e md5
				$_POST[$chave] = md5(addcslashes($valor));
			}
		}		
	}
	// aqui insere dentro dos objetos respectivos
	if (!$ERRO){
		for ( $j = 0; $j < count($_POST['telefoneTipo']); $j++ ) {
	    	eval('$telefoneVo'.$j.' = new TelefoneVo();');
	    }
		// loop so para inserir os valores dentro dos objetos
		foreach ( $_POST as $chave => $valor ) {      			
			//var_dump($chave);
			// verifica os atributos do ususario e insere dentro dele
			if (array_key_exists($chave, $usuarioVo->usuarioObrigatorio)) {
				eval('$usuarioVo->set'.ucfirst($chave).'("'.$valor.'");');	
			}
			// verifica os atributos do cep edicao
			if (array_key_exists($chave, $cepXedicaoVo->cepXedicaoObrigatorio)) {
				eval('$cepXedicaoVo->set'.ucfirst($chave).'("'.$valor.'");');	
			}
			// verifica os atributos do cepCadastro
			if (array_key_exists($chave, $cepCadastroVo->cepCadastroObrigatorio)) {
				eval('$cepCadastroVo->set'.ucfirst($chave).'("'.$valor.'");');	
			}				
			// inserindo manualmente pois não rolou colocar dinamico, telefone é array
			for ( $j = 0; $j < count($_POST['telefoneTipo']); $j++ ) {	
				eval('$telefoneVo'.$j.' ->setTelefoneTipo('.$_POST["telefoneTipo"][$j].');');
				eval('$telefoneVo'.$j.' ->setTelefoneDdd('.$_POST["telefoneDdd"][$j].');');
				eval('$telefoneVo'.$j.' ->setTelefoneDdi('.$_POST["telefoneDdi"][$j].');');
				eval('$telefoneVo'.$j.' ->setTelefoneNumero('.$_POST["telefoneNumero"][$j].');');
				eval('$telefoneVo'.$j.' ->setTelefoneRamal('.$_POST["telefoneRamal"][$j].');');
				eval('$telefoneVo'.$j.' ->setTelefoneTipo('.$_POST["telefoneTipo"][$j].');');
				eval('$telefoneVo'.$j.' ->setTelefoneRecado('.$_POST["telefoneRecado"][$j].');');				
			}
		}
		// coloca o objeto dantro do array
		$telefone = array();
		for ( $i = 0; $i < count($_POST['telefoneTipo']); $i++ ) {
			 eval('$telefone[] = $telefoneVo'.$i.';');
		}
		$usuarioVo->setTelefoneVo($telefone);	
		$usuarioVo->setCepXedicaoVo($cepXedicaoVo);	
		$usuarioVo->setCepCadastroVo($cepCadastroVo);
	}
	if (!$ERRO) { 		
		$sucesso = $usuarioBpm->cadastrarAlterar($usuarioVo, 'usuario');
        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'O ocorreu um erro ao cadastrar o usuario';
    	} else {
    		// envia o email para o usuario
    		
    		
    	}
	}
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
