<?php
$necessario = array('hotel', 'quarto', 'quartoTipo');
include('../template/iniciarDados.php');

// buscar os hoteis para mostar no slect
$hotelVo = new HotelVo();
$hotelBpm = new HotelBpm();
$arrayHotelVo = $hotelBpm->buscar('hotel');

// buscar os Tipo Quarto para mostar no slect
$quartoTipoVo = new QuartoTipoVo();
$quartoTipoBpm = new QuartoTipoBpm();
$arrayQuartoTipoVo = $quartoTipoBpm->buscar('quartoTipo');

$quartoVo = new QuartoVo();
if (!empty($_GET['quarto'])) {
    $quartoBpm = new QuartoBpm();
    $quartoVo->setQuartoId($_GET['quarto']);
    $quartoVo = $quartoBpm->exibir($quartoVo, 'quarto');
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
                    <!-- conteudo -->	
                    <div class="cadastro_titulo"><p> <?php echo $hotelVo->getHotelId() != null ? 'Editar' : 'Cadastrar'; ?> Pacote </p></div>	
                    <div id="formulario">
                        <?php
                        if (count($arrayHotelVo) == 0) {
                            echo 'Voce precisa cadastar algum hotel antes.';
                            $ERRO = true;
                        }
                        if (count($arrayQuartoTipoVo) == 0) {
                            echo 'Voce precisa cadastar algum tipo de quarto antes.';
                            $ERRO = true;
                        }
                        if (!$ERRO) {
                            ?>								
                            <form id="cadastrarQuarto" action="cadastrarFinanceiro.php" method="post" onsubmit="return verificarCampos('cadastrarQuarto');" >
                                <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarQuarto" />
                                <div id="quarto" >
                                    <!-- Quarto -->
                                    Selecione o hotel:<br />
                                    <select name="hotelId" id="hotelId" class="obrigatorio" >
                                        <option value=""> Selecione o hotel: </option>
                                        <?php for ($i = 0; $i < count($arrayHotelVo); $i++) { ?>
                                            <option value="<?php echo $arrayHotelVo[$i]->getHotelId(); ?>"<?php echo $quartoVo->getHotelId() == $arrayHotelVo[$i]->getHotelId() ? 'selected=\'selected\'' : ''; ?>>
                                                <?php echo $arrayHotelVo[$i]->getHotelNome(); ?>
                                            </option>

                                        <?php }
                                        ?>
                                    </select><br />
                                    <br />
                                    <input type="reset" value="Limpar" name="B1" />
                                    <span style=" padding-left: 10px" />
                                    <input type="submit" value="Voltar" name="B2" onClick="this.form.action='index.php'"/>  
                                    <span style=" padding-left: 10px" />
                                    <input type="submit" name="cmdSalvar" value="Continuar Cadastro" />
                                </div>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
    <script type="text/javascript" src="../../_js/servico.js"></script>
</html>