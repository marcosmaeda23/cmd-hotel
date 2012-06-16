?<php
$necessario = array('cardapioTipo');
include('../template/iniciarDados.php');


$cardapioTipoVo = new CardapioTipoVo();
if (!empty($_GET['cardapioTipo'])) {
    $cardapioTipoBpm = new CardapioTipoBpm();
    $cardapioTipoVo->setCardapioTipoId($_GET['cardapioTipo']);
    $cardapioTipoVo = $cardapioTipoBpm->exibir($cardapioTipoVo, 'cardapioTipo');

//var_dump($cardapioTipoVo);
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
                    <div class="cadastro_titulo"><p> <?php echo $cardapioTipoVo->getCardapioTipoId() != null ? 'Editar':'Cadastrar';?> Cardápio Tipo </p></div>	
                        <form id="cadastrarCardapioTipo" action="cardapioTipoController.php" method="post" onsubmit="return verificarCampos('cadastrarCardapioTipo');" >
                            <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarCardapioTipo" />
                            <input type="hidden" name="cardapioTipoId" id="cardapioTipoId" value="<?php echo $cardapioTipoVo->getCardapioTipoId(); ?>" />			


                            <div id="cardapioTipo" >
                                <!-- cardapioTipo -->


                                <label>Nome do tipo de cardápio:</label><br />
                                </label><input type="text" name="cardapioTipoNome" id="cardapioTipoNome" value="<?php echo $cardapioTipoVo->getCardapioTipoNome(); ?>" maxlength="50" class="obrigatorio"  /><br />


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
    <script type="text/javascript" src="../../_js/cardapioTipo.js"></script>
</html>