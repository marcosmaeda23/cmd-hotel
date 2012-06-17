<?php
$necessario = array('reserva', 'hotel', 'pacote', 'quarto', 'quartoTipo', 'ambiente', 'servico', 'cardapio');
include('../../admin/template/iniciarDados.php');


$idUsuario = $_SESSION['ID'];
echo $hotelEscolhido = $_POST['hotelId'];


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

                                <div id="reserva" >
                                    <!-- reserva -->
                                    Hotel Selecionado:<span style="padding-left:20px">
                                        <?php
                                        for ($i = 0; $i < count($arrayHotelVo); $i++) {
                                            $hotelEscolhido = $hotelEscolhido - 1;
                                            if ($i == $hotelEscolhido) {
                                                echo $arrayHotelVo[$i]->getHotelNome();
                                            }
                                        }
                                        ?>

                                        <br />
                                        <br />
                                        Selecione um Quarto :<br />
                                        <select name="quartoId" id="quartoId" class="obrigatorio" >
                                            <option value=""> Selecione o quarto: </option>
                                            <?php for ($i = 0; $i < count($arrayQuartoVo); $i++) { ?>
                                                <option value="<?php echo $arrayQuartoVo[$i]->getQuartoId(); ?>"<?php echo $quartoVo->getQuartoId() == $arrayQuartoVo[$i]->getQuartoId() ? 'selected=\'selected\'' : ''; ?>>
                                                    <?php echo $arrayQuartoVo[$i]->getQuartoDescricao(); ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />

                                        Selecione um ambiente :<br />
                                        <select name="ambienteId" id="ambienteId" class="obrigatorio" >
                                            <option value=""> Selecione o ambiente: </option>
                                            <?php for ($i = 0; $i < count($arrayAmbienteVo); $i++) { ?>
                                                <option value="<?php echo $arrayAmbienteVo[$i]->getAmbienteId(); ?>"<?php echo $ambienteVo->getAmbienteId() == $arrayAmbienteVo[$i]->getAmbienteId() ? 'selected=\'selected\'' : ''; ?>>
                                                    <?php echo $arrayAmbienteVo[$i]->getAmbienteNome(); ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />

                                        Selecione um servico:<br />
                                        <select name="servicoId" id="servicoId" class="obrigatorio" >
                                            <option value=""> Selecione o servico: </option>
                                            <?php for ($i = 0; $i < count($arrayServicoVo); $i++) { ?>
                                                <option value="<?php echo $arrayServicoVo[$i]->getServicoId(); ?>"<?php echo $servicoVo->getServicoId() == $arrayServicoVo[$i]->getServicoId() ? 'selected=\'selected\'' : ''; ?>>
                                                    <?php echo $arrayServicoVo[$i]->getServicoNome(); ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />

                                        Selecione um cardapio :<br />
                                        <select name="cardapioId" id="cardapioId" class="obrigatorio" >
                                            <option value=""> Selecione o cardapio: </option>
                                            <?php for ($i = 0; $i < count($arrayCardapioVo); $i++) { ?>
                                                <option value="<?php echo $arrayCardapioVo[$i]->getCardapioId(); ?>"<?php echo $cardapioVo->getCardapioId() == $arrayCardapioVo[$i]->getCardapioId() ? 'selected=\'selected\'' : ''; ?>>
                                                    <?php echo $arrayCardapioVo[$i]->getCardapioNome(); ?>
                                                </option>

                                            <?php }
                                            ?>

                                        </select><br />

                                        <label>Nome do Pacote:</label>



                                        <label>Nome completo:</label><br />
                                        </label><input type="text" name="reservaNome" id="reservaNome" value="<?php echo $_POST['reservaNome'] ? $_POST['reservaNome'] : $reservaVo->getReservaNome(); ?>" maxlength="50" class="obrigatorio"  /><br />
                                        Seu e-mail:<br />
                                        <input type="text" name="reservaEmail" id="reservaEmail" value="<?php echo $_POST['reservaEmail'] ? $_POST['reservaEmail'] : $reservaVo->getReservaEmail(); ?>" maxlength="50" onblur='verificaCamposUnicos("reserva", "reservaEmail", this.value);' class="obrigatorio"  /><br />

                                        <div id='campoLogin'>

                                        </div>

                                        <?php if ($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?>
                                            Nivel:<br />
                                            <select name="nivelId" id="nivelId" class="obrigatorio" >
                                                <option value=""> Selecione o Nivel: </option>
                                                <option value="2"> Gerente </option>
                                                <option value="3"> Recepcionista </option>
                                            </select><br />
                                        <?php } else if ($_SESSION['NIVEL'] == 3) { ?>
                                            <input type="hidden" name="nivelId" id="nivelId" value="3" />
                                        <?php } else { ?>
                                            <input type="hidden" name="nivelId" id="nivelId" value="4" />
                                        <?php } ?>

                                        Eu Sou:<br />
                                        <select name="reservaSexo" id="reservaSexo" class="obrigatorio" >
                                            <option value=""> Selecione o g&ecirc;nero: </option>
                                            <option value="m" <?php echo $reservaVo->getReservaSexo() == 'm' ? 'selected=\'selected\'' : ''; ?>> Masculino </option>
                                            <option value="f" <?php echo $reservaVo->getReservaSexo() == 'f' ? 'selected=\'selected\'' : ''; ?>> Feminino </option>
                                        </select><br />
                                        Data de nascimento:	<br />
                                        <input type="text" name="reservaDataNascimento" id="reservaDataNascimento" value="<?php echo $reservaVo->getReservaDataNascimento(); ?>" maxlength="50" class="obrigatorio data"  /><br />
                                        Documento tipo: 	<br />
                                        <select name="reservaDocumentoTipo" id="reservaDocumentoTipo" onchange="mudaMascara(this.value);" class="obrigatorio" >
                                            <option value=""> Selecione o tipo do documento: </option>
                                            <option value="cpf" <?php echo $reservaVo->getReservaDocumentoTipo() == 'cpf' ? 'selected=\'selected\'' : ''; ?>> cpf </option>
                                            <option value="cnpj" <?php echo $reservaoVo->getReservaDocumento() == 'cnpj' ? 'selected=\'selected\'' : ''; ?>> cnpj </option>
                                            <option value="passaporte" <?php echo $reservaVo->getReservaDocumentoTipo() == 'passaporte' ? 'selected=\'selected\'' : ''; ?>> passaporte </option>
                                        </select><br />
                                        <div id='documentoNumero' style='display:none;'>
                                            Documento numero: 	<br />
                                            <input type="text" name="reservaDocumento" id="reservaDocumento" value="<?php echo $reservaVo->getReservaDocumento() ?>" maxlength="50" onblur='verificaCamposUnicos("reserva", "reservaDocumento", this.value);' class="obrigatorio"  /><br />
                                        </div>
                                </div> 	



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
</html>