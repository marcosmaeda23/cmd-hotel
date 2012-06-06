<?php
include('../template/iniciarDados.php');
if (!empty($_SESSION['NOME'])) {
    echo '<script language="JavaScript">' .
    'alert("Bem vindo");' .
    'location.href="home/index.php";' .
    '</script>';
}
?>
<html>
    <head>
        <title><?php echo $nome_site_Title; ?></title>
        <!-- css gerais-->
        <?php include('../template/css.php'); ?>
    <head>
    <body>
		
        <div class='login radius10' >
            <h2 class="borderTop BgAzulClaro">Entrar no Sistema</h2>
            <div class='loginNormal'>
                <form name='logar' id='logar' action='inicialController.php' 
                      onsubmit='return verificarCampos("logar")' method='post'>
                    <input type='hidden' name='acao' id='acao' value='logar' />
                    <label for='login' class='label'>Login</label>
                    <input type='text' name='login' id='login' value='' class='input obrigatorio usuario_login'><br />
                    <label for='usuario_senha' class='label'>Senha</label>
                    <input type='password' name='senha' id='senha' value='' class='input obrigatorio usuario_senha'><br /><br />
                    <a href='JavaScript:;' onclick='mostrarLembrete();'>
                        Esqueci meu login e senha</a><br />
                    <a href='usuario/'>Não sou cadastrado</a>
                    <br />
                    <input type='submit' value='enviar' class='botao'>
                </form>
            </div>

            <div id='campoEmail'>
                <form name='enviarEmail' id='enviarEmail' action='inicialController.php' onsubmit='return verificarCampos("enviarEmail")' method='post'>
                    <input type='hidden' name='acao' id='acao' value='enviarEmail' />
                    <label for='email'>Email do usuário</label><br />
                    <input type='text' name='email' id='email' value='' class='input obrigatorio'><br />
                    <label for='nome'>Nome</label><br />
                    <input type='text' name='nome' id='nome' value='' class='input obrigatorio'><br />
                    Preencha seu nome e o seu email
                    <br />
                    <input type='submit' value='enviar' class='botao'>
                </form>
            </div>
        </div>
    </body>
    <script type="text/javascript" charset="UTF-8" src="../_js/plugin/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" charset="UTF-8" src="../_js/index.js"></script>
</html>
