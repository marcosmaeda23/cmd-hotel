<?php
include('../../biblioteca/inicializacao_pagina.php');
?>
<html>
    <head>
        <title>Trabalho N1 - Programação para Internet</title>
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <!-- javascript -->
        <script type="text/javascript" charset="UTF-8" src="../_js/jquery.min.js"></script>
        <script type="text/javascript" charset="UTF-8" src="_js/index.js"></script>
    <head>
    <body>
        <div id='cadastro_login'>
            <h2>Cadastro de Usuário</h2>
            <form name='cadastro' id='cadastro' action='loginController.php' method='post' onsubmit='return verificarCampos("cadastro");'>
                <input type='hidden' name='acao' id='acao' value='cadastrar_usuario' />
                <label for='usuario_nome'>Usuário</label><br />
                <input type='text' name='usuario_nome' id='usuario_nome' value='' class='input obrigatorio'><br />
                <label for='usuario_login'>Login</label><br />
                <input type='text' name='usuario_login' id='usuario_login' value='' class='input obrigatorio'><br />
                <label for='usuario_email'>Email</label><br />
                <input type='text' name='usuario_email' id='usuario_email' value='' class='input obrigatorio'><br />
                <label for='usuario_senha'>Senha</label><br />
                <input type='password' name='usuario_senha' id='usuario_senha' value='' class='input obrigatorio'><br />
                <label for='confirmacao_senha'>Confirmação de senha</label><br />
                <input type='password' name='confirmacao_senha' id='confirmacao_senha' value='' class='input obrigatorio'><br />
                <label for='confirmacao_senha'>lembrete de senha</label><br />
                <textarea name='usuario_lembrete' id='usuario_lembrete' class='textArea obrigatorio'></textarea><br />
                <input type='submit' value='enviar' class='botao'><br>
            </form>
            <br>
            <a href="index.php">Voltar</a>
        </div>
    </body>
</html>