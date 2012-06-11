<?php
$necessario = array('cardapioTipo');
include('../template/iniciarDados.php');

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 
if ($_POST['acao'] == 'cadastrarCardapioTipo') {
    $cardapioTipoVo = new CardapioTipoVo();
    $cardapioTipoBpm = new CardapioTipoBpm();
    
    if(!empty($_POST['cardapioTipoId'])){
    	$verificarUnicos = false;    	
    }
	// verifica se os campos do usuario estao vazios		
	foreach ( $cardapioTipoVo->cardapioTipoObrigatorio as $chave => $valor ) {
		// faz a validacao dos campos obrigatorios, setados na classe
		if ($valor == 'obrigatorio') {
			if (empty($_POST[$chave])){
				$erro_nome = 'Preencha todos os campos do formulário.';
				$ERRO = true;
			}
		} 	
	}		
	// aqui insere dentro dos objetos respectivos
	if (!$ERRO){
		// loop so para inserir os valores dentro dos objetos
		foreach ( $_POST as $chave => $valor ) { 
			// verifica os atributos do cardapioTipo e insere dentro dele
			if (array_key_exists($chave, $cardapioTipoVo->cardapioTipoObrigatorio)) {
				eval('$cardapioTipoVo->set'.ucfirst($chave).'("'.$valor.'");');	
			}
		}
	}

	if (!$ERRO) { 		
		$sucesso = $cardapioTipoBpm->cadastrarAlterar($cardapioTipoVo, 'cardapioTipo');
		
        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'O ocorreu um erro ao cadastrar o tipo de cardapio';
    	}
	}
    if (!$ERRO) {
        echo '<script language="JavaScript">';
        echo 'alert("Tipo de cardápio cadastrado com sucesso.");';
        echo 'location.href="index.php";';
        echo '</script>';
    } else {
        echo '<script language="JavaScript">';
        echo 'alert("' . $erro_nome . '");';
		echo 'location.href="index.php";';
        echo '</script>';

    }
}


?>