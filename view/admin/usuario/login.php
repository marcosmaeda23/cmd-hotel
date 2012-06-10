<?php
$necessario = array('usuario');
include('../template/iniciarDados.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
    <head>
        <title><?php echo $nome_site_Title; ?></title>
        <!-- css gerais-->
        <?php include('../template/css.php'); ?>
    </head>
    <body>	
        <?php include('../template/topoAdmin.php') ?>
        <div class="content cf">
            <div class="container">
                <div class="middle">

                    <!-- conteudo -->	
                    <div id="id">
						<form action="usuarioController.php" method="post" onsubmit="">
							<input type="hidden" name="acao" id="acao" value="alterarSenha" />
							<input type="hidden" name="usuarioLogin" id="usuarioLogin" value="" />
							
							<label for="usuarioLogin">Senha</label>
							<input type="password" name="usuarioSenha" id="usuarioSenha" /><br />
							<label for="usuarioLogin">Confirmação senha</label>
							<input type="password" name="usuarioLogin" id="usuarioLogin" /><br />
							<input type="submit" value="Enviar" />
						</form>
					</div>

                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
</html>
