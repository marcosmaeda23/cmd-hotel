<?php
$necessario = array('quartoTipo');
include('../template/iniciarDados.php');


$quartoTipoVo = new QuartoTipoVo();
if (!empty($_GET['quartoTipo'])) {
    $quartoTipoBpm = new QuartoTipoBpm();
    $quartoTipoVo->setQuartoTipoId($_GET['quartoTipo']);
    $quartoTipoVo = $quartoTipoBpm->exibir($quartoTipoVo, 'quartoTipo');
}
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
                    <div id="formulario">
                        <div class="cadastro_titulo"><p> <?php echo $quartoTipoVo->getQuartoTipoId() != null ? 'Editar' : 'Cadastrar'; ?> Quarto Tipo </p></div>	
                        <form id="cadastrarQuartoTipo" action="quartoTipoController.php" method="post" onsubmit="return verificarCampos('cadastrarQuartoTipo');" >
                            <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarQuartoTipo" />
                            <input type="hidden" name="quartoTipoId" id="quartoTipoId" value="<?php echo $quartoTipoVo->getQuartoTipoId(); ?>" />			


                            <div id="quartoTipo" >
                                <!-- quartoTipo -->
                                <label>Descricao do Tipo de Quarto :</label><br />
                                </label><input type="text" name="quartoTipoDescricao" id="quartoTipoDescricao" value="<?php echo $quartoTipoVo->getQuartoTipoDescricao(); ?>" maxlength="50" class="obrigatorio"  /><br />
                                <br />
                                <input type="reset" value="Limpar" name="B1" />
                                <span style=" padding-left: 10px" />
                                <input type="submit" value="Voltar" name="B2" onClick="this.form.action='index.php'"/>  
                                <span style=" padding-left: 10px" />
                                <input type="submit" name="cmdSalvar" value="<?php echo(empty($_GET) ? 'Cadastrar' : 'Alterar'); ?>" />

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
    <script type="text/javascript" src="../../_js/quartoTipo.js"></script>
</html>