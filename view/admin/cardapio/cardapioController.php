<?php
$necessario = array('servico');
include('../template/iniciarDados.php');

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 

if ($_POST['acao'] == 'cadastrarServico') {
    $servicoVo = new ServicoVo();
    $servicoBpm = new ServicoBpm();
    
    if(!empty($_POST['servicoId'])){
    	$verificarUnicos = false;    	
    }
	// verifica se os campos do usuario estao vazios		
	foreach ( $servicoVo->servicoObrigatorio as $chave => $valor ) {
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
			//var_dump($chave);
			// verifica os atributos do ususario e insere dentro dele
			if (array_key_exists($chave, $servicoVo->servicoObrigatorio)) {
				eval('$servicoVo->set'.ucfirst($chave).'("'.$valor.'");');	
			}
		}
	}
	
	if (!$ERRO) { 		
		$sucesso = $servicoBpm->cadastrarAlterar($servicoVo, 'servico');
		
        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'O ocorreu um erro ao cadastrar o serviço';
    	}
	}
	
    if (!$ERRO) {
        echo '<script language="JavaScript">';
        echo 'alert("Bem vindo");';
        echo 'location.href="../home/index.php";';
        echo '</script>';
    } else {
        echo '<script language="JavaScript">';
        echo 'alert("' . $erro_nome . '");';
		echo 'location.href="index.php";';
        echo '</script>';

    }
}


?>