<?php 

$necessario = array('cardapio');
include('../template/iniciarDados.php');

/// buscar os hoteis para mostar no slect
$hotelVo = new HotelVo();
$hotelBpm = new HotelBpm();
$hotelVo = $hotelBpm -> buscar('hotel');

$servicoVo = new ServicoVo();
if(!empty($_GET['servico'])){
	$servicoBpm = new ServicoBpm();
	$servicoVo ->setServicoId($_GET['servico']);
	$servicoVo = $servicoBpm ->exibir($servicoVo, 'servico');
	
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
						<form action="servicoController.php" method="post" onsubmit="return verificarCampos();" >
							<input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarServico" />
							<input type="hidden" name="servicoId" id="servicoId" value="<?php echo $servicoVo ->getServicoId();?>" />			
							
							
							<div id="servico" >
								<!-- usuario -->
								Selecione o hotel:<br />
								<select name="hotelId" id="hotelId" class="obrigatorio" >
									<option value=""> Selecione o hotel: </option>
									<?php 
									for ( $i = 0; $i < count($hotelVo); $i++ ) { ?>
										<option value="<?php echo $hotelVo[$i]->getHotelId();?>"<?php echo $servicoVo->getHotelId() == $hotelVo[$i]->getHotelId() ? 'selected=\'selected\'':'';?>>
											<?php echo $hotelVo[$i]->getHotelNome();?>
										</option>
										
									<?php
									}?>

								</select><br />
								
								<label>Nome do serviço:</label><br />
								</label><input type="text" name="servicoNome" id="servicoNome" value="<?php echo $servicoVo->getServicoNome();?>" maxlength="50" class="obrigatorio"  /><br />
								Valor:<br />
								<input type="text" name="servicoValor" id="servicoValor" value="<?php echo $servicoVo->getServicoValor();?>" maxlength="50" class="obrigatorio"  /><br />
								
								Observação: 	<br />
								<textarea id="servicoObservacao" name="servicoObservacao" rows="10" cols="50" wrap="off"><?php echo $servicoVo->getServicoObservacao();?></textarea><br />
									
													
							<input type="submit" name="cmdSalvar" value="<?php echo(empty($_GET)?'Cadastrar':'Alterar');?>" />
						</form>
					</div>
				</div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
	<script type="text/javascript" src="../../_js/usuario.js"></script>
</html>