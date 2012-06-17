<?php

$necessario = array('ambiente');
include('../template/iniciarDados.php');

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 

if ($_POST['acao'] == 'cadastrarAmbiente') {
    $ambienteVo = new AmbienteVo();
    $ambienteBpm = new AmbienteBpm();

    if (!empty($_POST['ambienteId'])) {
        $verificarUnicos = false;
    }
    $ERRO = false;
    // verifica se os campos do usuario estao vazios		
    foreach ($ambienteVo->ambienteObrigatorio as $chave => $valor) {
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
            if (array_key_exists($chave, $ambienteVo->ambienteObrigatorio)) {
                eval('$ambienteVo->set' . ucfirst($chave) . '("' . $valor . '");');
            }
        }
    }
    if (!$ERRO) {
        $sucesso = $ambienteBpm->cadastrarAlterar($ambienteVo, 'ambiente');

        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'O ocorreu um erro ao cadastrar o Ambiente';
        }
    }

    if (!$ERRO) {
        echo '<script language="JavaScript">';
        echo 'alert("Ambiente cadastrado com sucesso.");';
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