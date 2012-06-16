<?php

$necessario = array('quarto');
include('../template/iniciarDados.php');

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 

if ($_POST['acao'] == 'cadastrarQuarto') {
    $quartoVo = new QuartoVo();
    $quartoBpm = new QuartoBpm();

    if (!empty($_POST['quartoId'])) {
        $verificarUnicos = false;
    }
    $ERRO = false;
    // verifica se os campos do usuario estao vazios		
    foreach ($quartoVo->quartoObrigatorio as $chave => $valor) {
        // faz a validacao dos campos obrigatorios, setados na classe
        if ($valor == 'obrigatorio') {
            if (empty($_POST[$chave])) {
                $erro_nome = 'Preencha todos os campos do formulário.';
                $ERRO = true;
            }
        }
    }
    // aqui insere dentro dos objetos respectivos
//var_dump($_POST);
//echo '<br>';
//echo '<br>';
//echo '<br>';
    if (!$ERRO) {
        // loop so para inserir os valores dentro dos objetos
        foreach ($_POST as $chave => $valor) {
            //var_dump($chave);
            // verifica os atributos do ususario e insere dentro dele
            if (array_key_exists($chave, $quartoVo->quartoObrigatorio)) {
                eval('$quartoVo->set' . ucfirst($chave) . '("' . $valor . '");');
            }
        }
    }
    if (!$ERRO) {
        $sucesso = $quartoBpm->cadastrarAlterar($quartoVo, 'quarto');

        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'O ocorreu um erro ao cadastrar o Quarto';
        }
    }

    if (!$ERRO) {
        echo '<script language="JavaScript">';
        echo 'alert("Quarto cadastrado com sucesso.");';
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