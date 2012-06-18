<?php
$necessario = array('ambiente', 'hotel');
include('../template/iniciarDados.php');

// buscar os hoteis para mostar no slect
$hotelVo = new HotelVo();
$hotelBpm = new HotelBpm();
$arrayHotelVo = $hotelBpm->buscar('hotel');

$ambienteVo = new AmbienteVo();
if (!empty($_GET['ambiente'])) {
    $ambienteBpm = new AmbienteBpm();
    $ambienteVo->setAmbienteId($_GET['ambiente']);
    $ambienteVo = $ambienteBpm->exibir($ambienteVo, 'ambiente');
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
                    <div class="cadastro_titulo"><p> <?php echo $hotelVo->getHotelId() != null ? 'Editar' : 'Cadastrar'; ?> Ambiente </p></div>	
                    <div id="formulario">
                        <?php
                        if (count($arrayHotelVo) == 0) {
                            echo 'Voce precisa cadastar algum hotel antes.';
                            $ERRO = true;
                        }
                        if (!$ERRO) {
                            ?>								
                            <form id="cadastrarAmbiente" action="ambienteController.php" method="post" onsubmit="return verificarCampos('cadastrarQuarto');" >
                                <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarAmbiente" />
                                <input type="hidden" name="ambienteId" id="AmbienteId" value="<?php echo $ambienteVo->getAmbienteId(); ?>" />			
                                <input type="hidden" name="ambienteId" id="AmbienteId" value="<?php echo $ambienteVo->getAmbienteId(); ?>" />			
                                <div id="ambiente" >
                                    <!-- ambiente -->
                                    Selecione o hotel:<br />
                                    <select name="hotelId" id="hotelId" class="obrigatorio" >
                                        <option value=""> Selecione o hotel: </option>
                                        <?php for ($i = 0; $i < count($arrayHotelVo); $i++) { ?>
                                            <option value="<?php echo $arrayHotelVo[$i]->getHotelId(); ?>"<?php echo $ambienteVo->getHotelId() == $arrayHotelVo[$i]->getHotelId() ? 'selected=\'selected\'' : ''; ?>>
                                                <?php echo $arrayHotelVo[$i]->getHotelNome(); ?>
                                            </option>

                                        <?php } ?>
                                    </select><br />
                                    <label>Nome do ambiente:</label>
                                    <input type="text" name="ambienteNome" id="ambienteNome" value="<?php echo $ambienteVo->getAmbienteNome(); ?>" maxlength="50" 
                                           class="obrigatorio" onblur="verificaCamposUnicos('ambiente', 'ambienteNome', this.value);" /><br />

                                    Valor:<br />
                                    <input type="text" name="ambienteValor" id="ambienteValor" value="<?php echo $ambienteVo->getAmbienteValor(); ?>" maxlength="50" class="obrigatorio preco"  /><br />

                                    Observacao: 	<br />
                                    <textarea id="ambienteObservacao" name="ambienteObservacao" rows="10" cols="50" wrap="off"><?php echo $ambienteVo->getAmbienteObservacao(); ?></textarea><br />

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