<?php
$necessario = array('hotel', 'pacote', 'quarto', 'quartoTipo', 'ambiente', 'servico', 'cardapio');
include('../template/iniciarDados.php');

$hotelEscolhido = $_POST['hotelId'];


// buscar os hoteis para mostar no slect
$hotelVo = new HotelVo();
$hotelBpm = new HotelBpm();
$arrayHotelVo = $hotelBpm->buscar('hotel');

// buscar os Tipo Quarto para mostar no slect
$quartoVo = new QuartoVo();
$quartoBpm = new QuartoBpm();
$arrayQuartoVo = $quartoBpm->buscarPoHotel('quarto', $hotelEscolhido);

// buscar os ambiente para mostar no slect
$ambienteVo = new AmbienteVo();
$ambienteBpm = new AmbienteBpm();
$arrayAmbienteVo = $ambienteBpm->buscarPoHotel('ambiente', $hotelEscolhido);

// buscar os Tipo Quarto para mostar no slect
$servicoVo = new ServicoVo();
$servicoBpm = new ServicoBpm();
$arrayServicoVo = $servicoBpm->buscarPoHotel('servico', $hotelEscolhido);

// buscar os Tipo Quarto para mostar no slect
$cardapioVo = new CardapioVo();
$cardapioBpm = new CardapioBpm();
$arrayCardapioVo = $cardapioBpm->buscarPoHotel('cardapio', $hotelEscolhido);

$pacoteVo = new PacoteVo();
if (!empty($_GET['quarto'])) {
    $quartoBpm = new QuartoBpm();
    $quartoVo->setQuartoId($_GET['quarto']);
    $quartoVo = $quartoBpm->exibir($quartoVo, 'quarto');
}

$hotelEscolhido = $_POST['hotelId'];
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
                        if (!$ERRO) {
                            ?>
                            <form id="cadastrarPacote" action="pacoteController.php" method="post" onsubmit="return verificarCampos('cadastrarPacote');" >
                                <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarPacote" />
                                <div id="Pacote" >
                                    <!-- Pacote -->
                                    Hotel Selecionado:<span style="padding-left:20px">
                                        <?php
                                        $hotelEscolhido = $hotelEscolhido - 1;
                                        for ($i = 0; $i < count($arrayHotelVo); $i++) {
                                            if ($i == $hotelEscolhido) {
                                                echo $arrayHotelVo[$i]->getHotelNome();
                                            }
                                        }
                                        ?>

                                        <br />
                                        <br />
                                        Selecione um Quarto :<br />
                                        <select name="quartoId" id="quartoId" class="" >
                                            <option value=""> Selecione o quarto: </option>
                                            <?php for ($i = 0; $i < count($arrayQuartoVo); $i++) { ?>
                                                <option value="<?php echo $arrayQuartoVo[$i]->getQuartoId(); ?>"<?php echo $quartoVo->getQuartoId() == $arrayQuartoVo[$i]->getQuartoId() ? 'selected=\'selected\'' : ''; ?>>
                                                    <?php echo $arrayQuartoVo[$i]->getQuartoDescricao(); ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />

                                        Selecione um ambiente :<br />
                                        <select name="ambienteId" id="ambienteId" class="" >
                                            <option value=""> Selecione o ambiente: </option>
                                            <?php for ($i = 0; $i < count($arrayAmbienteVo); $i++) { ?>
                                                <option value="<?php echo $arrayAmbienteVo[$i]->getAmbienteId(); ?>"<?php echo $ambienteVo->getAmbienteId() == $arrayAmbienteVo[$i]->getAmbienteId() ? 'selected=\'selected\'' : ''; ?>>
                                                    <?php echo $arrayAmbienteVo[$i]->getAmbienteNome(); ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />

                                        Selecione um servico:<br />
                                        <select name="servicoId" id="servicoId" class="" >
                                            <option value=""> Selecione o servico: </option>
                                            <?php for ($i = 0; $i < count($arrayServicoVo); $i++) { ?>
                                                <option value="<?php echo $arrayServicoVo[$i]->getServicoId(); ?>"<?php echo $servicoVo->getServicoId() == $arrayServicoVo[$i]->getServicoId() ? 'selected=\'selected\'' : ''; ?>>
                                                    <?php echo $arrayServicoVo[$i]->getServicoNome(); ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />

                                        Selecione um cardapio :<br />
                                        <select name="cardapioId" id="cardapioId" class="" >
                                            <option value=""> Selecione o cardapio: </option>
                                            <?php for ($i = 0; $i < count($arrayCardapioVo); $i++) { ?>
                                                <option value="<?php echo $arrayCardapioVo[$i]->getCardapioId(); ?>"<?php echo $cardapioVo->getCardapioId() == $arrayCardapioVo[$i]->getCardapioId() ? 'selected=\'selected\'' : ''; ?>>
                                                    <?php echo $arrayCardapioVo[$i]->getCardapioNome(); ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />

                                        <label>Nome do Pacote:</label>
                                        <input type="text" name="pacoteNome" id="pacoteNome" value="<?php echo $pacoteVo->getPacoteNome(); ?>" maxlength="50" 
                                               class="obrigatorio" onblur="verificaCamposUnicos('pacote', 'pacoteNome', this.value);" /><br />

                                        <label>Data Inicial:</label>
                                        <input type="text" name="pacoteDataInicial" id="data_inicial" value="<?php echo $pacoteVo->getPacoteDataInicial(); ?>" maxlength="50" 
                                               class="data" onblur="verificaCamposUnicos('pacote', 'pacotePeriodo', this.value);" /><br />

                                        <label>Data Final:</label>
                                        <input type="text" name="pacoteDataFinal" id="data_final" value="<?php echo $pacoteVo->getPacoteDataFinal(); ?>" maxlength="50" 
                                               class="data" onblur="verificaCamposUnicos('pacote', 'pacotePeriodo', this.value);" /><br />

                                        <label>Periodo:</label>
                                        <input type="text" name="pacotePeriodo" id="pacotePeriodo" value="<?php echo $pacoteVo->getPacotePeriodo(); ?>" maxlength="50" 
                                               class="" onblur="verificaCamposUnicos('pacote', 'pacotePeriodo', this.value);" /><br />

                                        <label>Quantidade de pessoas:</label>
                                        <input type="text" name="pacotePessoas" id="pacotePessoas" value="<?php echo $pacoteVo->getPacotePessoas(); ?>" maxlength="50" 
                                               class="obrigatorio" onblur="verificaCamposUnicos('pacote', 'pacotePessoas', this.value);" /><br />


                                        Desconto:<br />
                                        <input type="text" name="pacoteDesconto" id="pacoteDesconto" 
                                               value="<?php echo $pacoteVo->getPacoteDesconto(); ?>" maxlength="50" class="obrigatorio preco"  /><br />


                                        <br />
                                        <input type="reset" value="Limpar" name="B1" />
                                        <span style=" padding-left: 10px" />
                                        <input type="submit" value="Voltar" name="B2" onClick="this.form.action='index.php'"/>  
                                        <span style=" padding-left: 10px" />
                                        <input type="submit" name="cmdSalvar" value="<?php echo(empty($_GET) ? 'Cadastrar' : 'Alterar'); ?>" />
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