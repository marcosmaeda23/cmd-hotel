<?php
$necessario = array('hotel', 'servico');
include('../template/iniciarDados.php');

/// buscar os hoteis para mostar no slect
$hotelVo = new HotelVo();
$hotelBpm = new HotelBpm();
$arrayHotelVo = $hotelBpm->buscar('hotel');

$servicoVo = new ServicoVo();
if (!empty($_GET['servico'])) {
    $servicoBpm = new ServicoBpm();
    $servicoVo->setServicoId($_GET['servico']);
    $servicoVo = $servicoBpm->exibir($servicoVo, 'servico');
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
                    <div class="cadastro_titulo"><p> <?php echo $hotelVo->getHotelId() != null ? 'Editar' : 'Cadastrar'; ?> Hotel </p></div>	
                    <div id="formulario">
                        <?php if (count($arrayHotelVo) > 0) { ?>								
                            <form id="cadastrarServico" action="servicoController.php" method="post" onsubmit="return verificarCampos('cadastrarServico');" >
                                <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarServico" />
                                <input type="hidden" name="servicoId" id="servicoId" value="<?php echo $servicoVo->getServicoId(); ?>" />			
                                <div id="servico" >
                                    <!-- servico -->
                                    Selecione o hotel:<br />
                                    <select name="hotelId" id="hotelId" class="obrigatorio" >
                                        <option value=""> Selecione o hotel: </option>
                                        <?php for ($i = 0; $i < count($arrayHotelVo); $i++) { ?>
                                            <option value="<?php echo $arrayHotelVo[$i]->getHotelId(); ?>"<?php echo $servicoVo->getHotelId() == $arrayHotelVo[$i]->getHotelId() ? 'selected=\'selected\'' : ''; ?>>
                                                <?php echo $arrayHotelVo[$i]->getHotelNome(); ?>
                                            </option>

                                        <?php }
                                        ?>

                                    </select><br />
                                    <label>Nome do servi�o:</label>
                                    <input type="text" name="servicoNome" id="servicoNome" value="<?php echo $servicoVo->getServicoNome(); ?>" maxlength="50" 
                                           class="obrigatorio" onblur="verificaCamposUnicos('servico', 'servicoNome', this.value);" /><br />
                                    Valor:<br />
                                    <input type="text" name="servicoValor" id="servicoValor" value="<?php echo $servicoVo->getServicoValor(); ?>" maxlength="50" class="obrigatorio preco"  /><br />

                                    Observa��o: 	<br />
                                    <textarea id="servicoObservacao" name="servicoObservacao" rows="10" cols="50" wrap="off"><?php echo $servicoVo->getServicoObservacao(); ?></textarea><br />


                                    <br />
                                    <input type="reset" value="Limpar" name="B1" />
                                    <span style=" padding-left: 10px" />
                                    <input type="submit" value="Voltar" name="B2" onClick="this.form.action='index.php'"/>  
                                    <span style=" padding-left: 10px" />
                                    <input type="submit" name="cmdSalvar" value="<?php echo(empty($_GET) ? 'Cadastrar' : 'Alterar'); ?>" />
                                </div>
                            </form>
                            <?php
                        } else {
                            echo 'Voce precisa cadastar algum hotel antes.';
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