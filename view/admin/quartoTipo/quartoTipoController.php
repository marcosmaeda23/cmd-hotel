<?php

$necessario = array('quartoTipo');
include('../template/iniciarDados.php');

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 
if ($_POST['acao'] == 'cadastrarQuartoTipo') {
    $quartoTipoVo = new QuartoTipoVo();
    $quartoTipoBpm = new QuartoTipoBpm();

    if (!empty($_POST['quartoTipoId'])) {
        $verificarUnicos = false;
    }
    // verifica se os campos do usuario estao vazios		
    foreach ($quartoTipoVo->quartoTipoObrigatorio as $chave => $valor) {
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
            // verifica os atributos do quartoTipo e insere dentro dele
            if (array_key_exists($chave, $quartoTipoVo->quartoTipoObrigatorio)) {
                eval('$quartoTipoVo->set' . ucfirst($chave) . '("' . $valor . '");');
            }
        }
    }

    if (!$ERRO) {
        $sucesso = $quartoTipoBpm->cadastrarAlterar($quartoTipoVo, 'quartoTipo');

        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'O ocorreu um erro ao cadastrar o tipo de quarto';
        }
    }
    if (!$ERRO) {
        echo '<script language="JavaScript">';
        echo 'alert("Tipo de quarto cadastrado com sucesso.");';
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