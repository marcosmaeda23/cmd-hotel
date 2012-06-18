<?php
$necessario = array('reserva', 'hotel', 'pacote', 'quarto', 'quartoTipo', 'ambiente', 'servico', 'cardapio');
include('../../admin/template/iniciarDados.php');


$idUsuario = $_SESSION['ID'];
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

// buscar os Tipo Quarto para mostar no slect
$pacoteVo = new PacoteVo();
$pacoteBpm = new PacoteBpm();
$arrayPacoteVo = $pacoteBpm->buscarPoHotel('pacote', $hotelEscolhido);



$reservaVo = new ReservaVo();
if (!empty($_GET)) {


    $reservaBpm = new ReservaBpm();
    // buscar reserva para mostrar nos campos
    $reservaVo->setReservaId($_GET['reserva']);
    $reservaVo = $reservaBpm->exibir($reservaVo, 'Reserva');
    var_dump($reservaVo);

    $telefoneArray = $reservaVo->getTelefoneVo();
    $cepXedicaoVo = $reservaVo->getCepXedicaoVo();
    if ($cepXedicaoVo->getCepXedicaoTipo() == 1) {
        $cepCadastro = $reservaVo->getCepCadastroVo();
    } else {
        echo '2343';
    }
}

//var_dump($CepXedicaoVo);
//var_dump($ReservaVo);
// se for sessao de cliente mostrar o cadastro preenchido botao pra apagar cadastro ou alterar, o campo de senha tbm
// ou sem sessao de cliente cadastro normal , o campo de senha tbm
// sessao de gerente mostrar nivel de acesso, apagar, alterar, cadastrar, nao mostrar campo de senha e sim um botao para enviar email para o cliente
// sessao do recepcionista , cadastrar, alterar, nao mostrar campo de senha e sim um botao para enviar email pro cliente
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">

    <head>
        <title><?php echo $nome_site_Title; ?></title>
        <?php include('../template/css.php'); ?>	
    </head>
    <body>	
        <?php
        if (!empty($_SESSION)) {
            include('../template/topoAdmin.php');
        } else {
            include('../../template/topo.php');
            echo "<div  style='padding-top:120px;'>";
        }
        ?>
        <div class="content cf">
            <div class="container">
                <div class="middle">	
                    <div class="cadastro_titulo"><p> Cadastrar Reserva </p></div>	
                    <div id="formulario">
                        <?php
                        if (count($arrayHotelVo) == 0) {
                            echo 'Voce precisa cadastar algum hotel antes.';
                            $ERRO = true;
                        }
                        if (!$ERRO) {
                            ?>
                            <form action="reservaController.php" method="post" id="cadastroReserva" onsubmit="return verificarCampos('cadastroReserva');" >
                                <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarReserva" />
                                <input type="hidden" name="usuarioId" id="usuarioId" maxlength="50" value="<?php echo $idUsuario; ?>" />

                                <div id="reserva" >
                                    <!-- reserva -->
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
                                        <?php
                        if (count($arrayQuartoVo) > 0) { ?>


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
       					<?php
                        } ?>

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

                                        Selecione um pacote :<br />
                                        <select name="pacoteId" id="pacoteId" class="" >
                                            <option value=""> Selecione o pacote: </option>
                                            <?php for ($i = 0; $i < count($arrayPacoteVo); $i++) { ?>
                                                <option value="<?php echo $arrayPacoteVo[$i]->getPacoteId(); ?>"<?php echo $pacoteVo->getPacoteId() == $arrayPacoteVo[$i]->getPacoteId() ? 'selected=\'selected\'' : ''; ?>>
                                                    <?php echo $arrayPacoteVo[$i]->getPacoteNome(); ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />
                                        Data inicial:<br />
                                        <input type="text" name="itemReservaDataInicial" id="data_inicial" size="10" maxlength="10" value="" class="obrigatorio data" />
                                        <br />
                                        Data final:<br />
                                        <input type="text" name="itemReservaDataFinal" id="data_final" size="10" maxlength="10" value="" class="obrigatorio data" />

                                        <br />
                                </div>
                                <input type="reset" value="Limpar" name="B1" />
                                <span style=" padding-left: 10px" />
                                <input type="submit" value="Voltar" name="B2" onClick="this.form.action='index.php'"/>  
                                <span style=" padding-left: 10px" />
                                <input type="submit" name="cmdSalvar" value="<?php echo(empty($_GET) ? 'Cadastrar' : 'Alterar'); ?>" />
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
    <!-- scripts -->
        <?php include('../template/js.php'); ?>
        <script type="text/javascript" src="../../_js/reserva.js"></script>

</html>