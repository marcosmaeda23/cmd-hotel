<?php
$necessario = array('cardapio', 'foto');
include('../template/iniciarDados.php');

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 

if ($_POST['acao'] == 'cadastrarCardapio') {
    $cardapioVo = new CardapioVo();
    $fotoVo = new FotoVo();
    $cardapioBpm = new CardapioBpm();
    if(!empty($_POST['cardapioId'])){
    	$verificarUnicos = false;    	
    }
	// verifica se os campos do usuario estao vazios		
	foreach ( $cardapioObrigatorio->cardapioObrigatorio as $chave => $valor ) {
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
			// verifica os atributos do ususario e insere dentro dele
			if (array_key_exists($chave, $cardapioVo->cardapioObrigatorio)) {
				eval('$cardapioVo->set'.ucfirst($chave).'("'.$valor.'");');	
			}
		}
		$fotoVo ->setFotoNome($_FILES['imagem']['name']);
		$cardapioVo -> setFotoVo($fotoVo);

    
	}
	
	if (!$ERRO) { 		
		$sucesso = $cardapioBpm->cadastrarAlterar($cardapioVo, 'cardapio');		
        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'Ocorreu um erro ao cadastrar o cardapio';
    	}
	}
	if (!$ERRO) { 	
		$sucesso = salvarFoto($_FILES, 'cardapio');		
        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'Ocorreu erro ao salva foto';
    	}
	}
	echo $erro_nome;
	exit();
    if (!$ERRO) {
        echo '<script language="JavaScript">';
        echo 'alert("Cardápio cadastrado com sucesso");';
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