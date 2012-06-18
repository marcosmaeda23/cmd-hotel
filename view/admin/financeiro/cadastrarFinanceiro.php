<?php
$necessario = array('hotel', 'financeiro', 'financeiroTipo');
include('../template/iniciarDados.php');

// buscar os hoteis para mostar no slect
$hotelVo = new HotelVo();
$hotelBpm = new HotelBpm();
$arrayHotelVo = $hotelBpm->buscar('hotel');

// buscar os Tipo Financeiro para mostar no slect
$financeiroTipoVo = new FinanceiroTipoVo();
$financeiroTipoBpm = new FinanceiroTipoBpm();
$arrayFinanceiroTipoVo = $financeiroTipoBpm->buscar('financeiroTipo');

$financeiroVo = new FinanceiroVo();
if (!empty($_GET['financeiro'])) {
    $financeiroBpm = new FinanceiroBpm();
    $financeiroVo->setFinanceiroId($_GET['financeiro']);
    $financeiroVo = $financeiroBpm->exibir($financeiroVo, 'financeiro');
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
                    <div class="cadastro_titulo"><p> <?php echo $hotelVo->getHotelId() != null ? 'Editar' : 'Cadastrar'; ?> Financeiro </p></div>	
                    <div id="formulario">
                        <?php
                        if (count($arrayHotelVo) == 0) {
                            echo 'Voce precisa cadastar algum hotel antes.';
                            $ERRO = true;
                        }
                        if (count($arrayFinanceiroTipoVo) == 0) {
                            echo 'Voce precisa cadastar algum tipo de financeiro antes.';
                            $ERRO = true;
                        }
                        if (!$ERRO) {
                            ?>								
                            <form id="cadastrarFinanceiro" action="financeiroController.php" method="post" onsubmit="return verificarCampos('cadastrarFinanceiro');" >
                                <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarFinanceiro" />
                                <input type="hidden" name="financeiroId" id="financeiroId" value="<?php echo $financeiroVo->getFinanceiroId(); ?>" />			
                                <input type="hidden" name="statusId" id="statusFinanceiroId" value="1" />			
                                <div id="financeiro" >
                                    <!-- Financeiro -->
                                    Selecione o hotel:<br />
                                    <select name="hotelId" id="hotelId" class="obrigatorio" >
                                        <option value=""> Selecione o hotel: </option>
                                        <?php for ($i = 0; $i < count($arrayHotelVo); $i++) { ?>
                                            <option value="<?php echo $arrayHotelVo[$i]->getHotelId(); ?>"<?php echo $financeiroVo->getHotelId() == $arrayHotelVo[$i]->getHotelId() ? 'selected=\'selected\'' : ''; ?>>
                                                <?php echo $arrayHotelVo[$i]->getHotelNome(); ?>
                                            </option>

                                        <?php }
                                        ?>

                                    </select><br />

                                    Selecione um Tipo Financeiro :<br />
                                    <select name="financeiroTipoId" id="financeiroTipoId" class="obrigatorio" >
                                        <option value=""> Selecione o financeiro: </option>
                                        <?php for ($i = 0; $i < count($arrayFinanceiroTipoVo); $i++) { ?>
                                            <option value="<?php echo $arrayFinanceiroTipoVo[$i]->getFinanceiroTipoId(); ?>"<?php echo $financeiroVo->getFinanceiroTipoId() == $arrayFinanceiroTipoVo[$i]->getFinanceiroTipoId() ? 'selected=\'selected\'' : ''; ?>>
                                                <?php echo $arrayFinanceiroTipoVo[$i]->getFinanceiroTipoDescricao(); ?>
                                            </option>

                                        <?php }
                                        ?>

                                    </select><br />

                                    <label>Número do Financeiro:</label>
                                    <input type="text" name="financeiroNumero" id="financeiroNumero" value="<?php echo $financeiroVo->getFinanceiroNumero(); ?>" maxlength="50" 
                                           class="obrigatorio" onblur="verificaCamposUnicos('financeiro', 'financeiroNome', this.value);" /><br />

                                    Valor:<br />
                                    <input type="text" name="financeiroValor" id="financeiroValor" value="<?php echo $financeiroVo->getFinanceiroValor(); ?>" maxlength="50" class="obrigatorio preco"  /><br />

                                    Descrição: 	<br />
                                    <textarea id="financeiroDescricao" name="financeiroDescricao" rows="10" cols="50" wrap="off"><?php echo $financeiroVo->getFinanceiroDescricao(); ?></textarea><br />

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