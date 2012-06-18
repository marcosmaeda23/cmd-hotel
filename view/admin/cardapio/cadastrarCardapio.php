<?php
$necessario = array('cardapio', 'hotel', 'cardapioTipo');
include('../template/iniciarDados.php');

$cardapioVo = new CardapioVo();

/// buscar os hoteis para mostar no slect
$hotelVo = new HotelVo();
$hotelBpm = new HotelBpm();
$hotelVo = $hotelBpm->buscar('hotel');

$cardapioTipoVo = new CardapioTipoVo();
$cardapioTipoBpm = new CardapioTipoBpm();
$cardapioTipoVo = $cardapioTipoBpm->buscar('cardapioTipo');


if (!empty($_GET)) {
    $cardapioVo = new CardapioVo();
    $cardapioBpm = new CardapioBpm();
    // buscar usuario para mostrar nos campos
    $cardapioVo->setCardapioId($_GET['cardapio']);
    $cardapioVo = $cardapioBpm->exibir($cardapioVo, 'cardapio');
    //var_dump($cardapioVo);
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
                        <div class="cadastro_titulo"><p> <?php echo $cardapioVo->getCardapioId() != null ? 'Editar' : 'Cadastrar'; ?> Cardápio </p></div>	
                        <?php
                        if (!empty($hotelVo)) {

                            if (!empty($cardapioTipoVo)) {
                                ?>
                                <form id="cadastrarCardapio" action="cardapioController.php" method="post" onsubmit="return verificarCampos('cadastrarCardapio');" enctype="multipart/form-data" >
                                    <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarCardapio" />
                                    <input type="hidden" name="cardapioId" id="cardapioId" value="" />			


                                    <div id="cardapio" >
                                        <!-- cardapio -->
                                        Selecione o hotel:<br />
                                        <select name="hotelId" id="hotelId" class="obrigatorio" >
                                            <option value=""> Selecione o hotel: </option>
                                            <?php for ($i = 0; $i < count($hotelVo); $i++) { ?>
                                                <option value="<?php echo $hotelVo[$i]->getHotelId(); ?>" 
                                                <?php
                                                if ($hotelVo[$i]->getHotelId() == $cardapioVo->getHotelId()) {
                                                    echo "selected";
                                                }
                                                ?> >
                                                            <?php
                                                            echo $hotelVo[$i]->getHotelNome();
                                                            ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />
                                        Selecione o tipo de cardápio:<br />
                                        <select name="cardapioTipoId" id="cardapioTipoId" class="obrigatorio" >
                                            <option value=""> Selecione o tipo de cardápio: </option>
                                            <?php for ($i = 0; $i < count($cardapioTipoVo); $i++) { ?>
                                                <option value="<?php echo $cardapioTipoVo[$i]->getCardapioTipoId(); ?>"
                                                <?php
                                                if ($cardapioTipoVo[$i]->getCardapioTipoId() == $cardapioVo->getCardapioId()) {
                                                    echo "selected";
                                                }
                                                ?> >
                                                            <?php echo $cardapioTipoVo[$i]->getCardapioTipoNome(); ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />

                                        <label>Nome do cardápio:</label>
                                        <input type="text" name="cardapioNome" id="cardapioNome" value="<?php echo $cardapioVo->getCardapioNome(); ?>" maxlength="50" class="obrigatorio"  /><br />
                                        Tempo de preparo:<br />
                                        <input type="text" name="cardapioTempo" id="cardapioTempo" value="<?php echo $cardapioVo->getCardapioTempo(); ?>" maxlength="50" class=""  /><br />
                                        Valor calórico:<br />
                                        <input type="text" name="cardapioValorCalorico" id="cardapioValorCalorico" value="<?php echo $cardapioVo->getCardapioValorCalorico(); ?>" maxlength="50" class="preco"  /><br />
                                        Valor:<br />
                                        <input type="text" name="cardapioValor" id="cardapioValor" value="<?php echo $cardapioVo->getCardapioValor(); ?>" maxlength="50" class="obrigatorio preco"  /><br />

                                        Observação: 	<br />
                                        <textarea id="cardapioObservacao" name="cardapioObservacao" rows="10" cols="40" wrap="off"><?php echo $cardapioVo->getCardapioObservacao(); ?></textarea><br />
                                        Descrição: 	<br />
                                        <textarea id="cardapioDescricao" name="cardapioDescricao" rows="10" cols="40" wrap="off"><?php echo $cardapioVo->getCardapioDescricao(); ?></textarea><br />

                                        Imagem:<br />
                                        <input type="file" name="imagem" id="imagem" class="obrigatorio"  /><br />

                                        <br />
                                        <input type="reset" value="Limpar" name="B1" />
                                        <span style=" padding-left: 10px" />
                                        <input type="submit" value="Voltar" name="B2" onClick="this.form.action='index.php'"/>  
                                        <span style=" padding-left: 10px" />
                                        <input type="submit" name="cmdSalvar" value="<?php echo(empty($_GET) ? 'Cadastrar' : 'Alterar'); ?>" />
                                    </div>
                                </form>
                            <?php } else { ?>

                                nenhum tipo de cardapio cadastrado <br/>
                                <a href='../cardapioTipo/cadastrarCardapioTipo.php'> cadastrar tipo de cardápio</a>
                            <?php } ?>

                        <?php } else { ?>

                            nenhum Hotel cadastrado <br />
                            <a href='../hotel/cadastrarHotel.php'> cadastrar hotel</a>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
    <script type="text/javascript" src="../../_js/cardapio.js"></script>
</html>