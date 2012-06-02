<?php
session_start();
if (!empty($_SESSION['NOME'])) {
    echo '<script language="JavaScript">' .
    'alert("Bem vindo");' .
    'location.href="home/index.php";' .
    '</script>';
}
?>
<html>
    <head>
        <title>Trabalho N1 - Programa��o para Internet</title>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="../_css/A90.css">
        <link rel="stylesheet" type="text/css" href="../_css/estilo.css">
        <!-- javascript -->
        <script type="text/javascript" charset="UTF-8" src="../_js/plugin/jquery.min.js"></script>
        <script type="text/javascript" charset="UTF-8" src="../_js/_index.js"></script>
    <head>
    <body>
        <div class='login radius10' >
            <h2 class="borderTop BgAzulClaro">Entrar no Sistema</h2>
            <div class='login_normal'>
                <form name='logar' id='logar' action='inicialController.php' 
                      onsubmit='return verificarCampos("logar")' method='post'>
                    <input type='hidden' name='acao' id='acao' value='logar' />
                    <label for='usuario_login' class='label'>Login</label>
                    <input type='text' name='login' id='login' value='' 
                           class='input obrigatorio usuario_login'><br />
                    <label for='usuario_senha' class='label'>Senha</label>
                    <input type='password' name='senha' id='senha' value='' 
                           class='input obrigatorio usuario_senha'><br /><br />
                    <a href='JavaScript:;' onclick='mostrarLembrete();'>
                        Esqueci meu login e senha</a><br />
                    <a href='usuario/'>N�o sou cadastrado</a>
                    <br />
                    <input type='submit' value='enviar' class='botao'>
                </form>
            </div>

            <div id='lembrete'>
                <form name='logar_lembrete' id='logar_lembrete' action='inicialController.php' onsubmit='return verificarCampos("logar_lembrete")' method='post'>
                    <input type='hidden' name='acao' id='acao' value='logar_lembrete' />
                    <label for='usuario_email'>Email do usu�rio</label><br />
                    <input type='text' name='usuario_email' id='usuario_email' value='' class='input obrigatorio'><br />
                    <label for='usuario_lembrete'>Lembrete de senha</label><br />
                    <textarea name='usuario_lembrete' id='usuario_lembrete' value='' class='textArea obrigatorio'></textarea><br />
                    Preencha seu email e o lembrete da senha
                    <br />
                    <input type='submit' value='enviar' class='botao'>
                </form>
            </div>
        </div>
    </body>
</html>
<!--         <div id='login'>
            <h2>Entrar no Sistema</h2>
            <div id='login_normal'>
                <form name='logar' id='logar' action='inicialController.php' onsubmit='return verificarCampos("logar")' method='post'>
                    <input type='hidden' name='acao' id='acao' value='logar' />
                    <label for='usuario_login' class='label'>Login</label><br />
                    <input type='text' name='login' id='usuario_login' value='' 
                           class='input obrigatorio'><br />
                    <label for='usuario_senha' class='label'>Senha</label><br />
                    <input type='password' name='senha' id='usuario_senha' value='' 
                           class='input obrigatorio'><br /><br />
                    <a href='JavaScript:;' onclick='mostrarLembrete();'>Esqueci meu login e senha</a><br />
                    <a href='cadastro_login.php'>N�o sou cadastrado</a>
                    <br />
                    <input type='submit' value='enviar' class='botao'>
                </form>
            </div>

            <div id='lembrete'>
                <form name='logar_lembrete' id='logar_lembrete' action='inicialController.php' onsubmit='return verificarCampos("logar_lembrete")' method='post'>
                    <input type='hidden' name='acao' id='acao' value='logar_lembrete' />
                    <label for='usuario_email'>Email do usu�rio</label><br />
                    <input type='text' name='usuario_email' id='usuario_email' value='' class='input obrigatorio'><br />
                    <label for='usuario_lembrete'>Lembrete de senha</label><br />
                    <textarea name='usuario_lembrete' id='usuario_lembrete' value='' class='textArea obrigatorio'></textarea><br />
                    Preencha seu email e o lembrete da senha
                    <br />
                    <input type='submit' value='enviar' class='botao'>
                </form>
            </div>
        </div>
    </body>
</html> -->