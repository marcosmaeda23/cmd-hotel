<?php


$necessario = array('usuario');
include('template/iniciarDados.php');

if ($_POST['acao'] == 'logar') {
    // verifica se os campos estao vazios
    foreach ($_POST AS $chave => $valor) {
        if (empty($valor)) {
            $erro_nome = 'Você tem que preencher todos os campos obrigatórios.';
            $ERRO = true;
        }
    }
    if (!$ERRO) {
       
        $usuarioVo = new UsuarioVo();
        $usuarioBpm = new UsuarioBpm();

		// o logar precisa ser como login e senha e nao como usuarioLogin e usuarioSenha
        $usuarioVo->setUsuarioLogin($_POST['login']);
        $usuarioVo->setUsuarioSenha(md5(($_POST['senha'])));
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
if ($_POST['acao'] == 'enviarEmail') {
	
	
	
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
?>