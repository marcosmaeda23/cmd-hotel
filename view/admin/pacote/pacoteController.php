<?php

$necessario = array('pacote');
include('../template/iniciarDados.php');

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 

if ($_POST['acao'] == 'cadastrarPacote') {
    $pacoteVo = new PacoteVo();
    $pacoteBpm = new PacoteBpm();

    if (!empty($_POST['pacoteId'])) {
        $verificarUnicos = false;
    }
    $ERRO = false;
    // verifica se os campos do usuario estao vazios		
    foreach ($pacoteVo->pacoteObrigatorio as $chave => $valor) {
        // faz a validacao dos campos obrigatorios, setados na classe
        if ($valor == 'obrigatorio') {
            if (empty($_POST[$chave])) {
                $erro_nome = 'Preencha todos os campos do formulário.';
                $ERRO = true;
            }
        }
    }
    // aqui insere dentro dos objetos respectivos
    if (!$ERRO) {
        // loop so para inserir os valores dentro dos objetos
        foreach ($_POST as $chave => $valor) {
            // verifica os atributos do ususario e insere dentro dele
            if (array_key_exists($chave, $pacoteVo->pacoteObrigatorio)) {
                eval('$pacoteVo->set' . ucfirst($chave) . '("' . $valor . '");');
            }
        }
    }
    if (!$ERRO) {
        $sucesso = $pacoteBpm->cadastrarAlterar($pacoteVo, 'pacote');
        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'O ocorreu um erro ao cadastrar o pacote';
        }
    }
   
    if (!$ERRO) {
        echo '<script language="JavaScript">';
        echo 'alert("pacote cadastrado com sucesso.");';
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