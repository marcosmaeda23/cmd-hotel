<?php

// a variavel necessario eh para inserido os objetos que serao incluidos 
$necessario = array('cardapioTipo', 'cardapio');
include('../template/iniciarDados.php');
$arrayCardapioTipoVo = new CardapioTipoVo();
$cardapioTipoBpm = new CardapioTipoBpm();
$arrayCardapioTipoVo = $cardapioTipoBpm -> buscar('cardapioTipo');


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
                    <?php 
                    if($arrayCardapioTipoVo < 1){
                    	echo 'Sem nenhum cardápio cadastrado';
                    } else {
	                    for ( $i = 0; $i < count($arrayCardapioTipoVo); $i++ ) {?>
							<a href='cadastrarCardapioTipo.php?cardapioTipo=<?php echo $arrayCardapioTipoVo[$i]->getCardapioTipoId();?>'> 
							<?php
							echo $arrayCardapioTipoVo[$i]->getCardapioTipoId().' - ';
							echo $arrayCardapioTipoVo[$i]->getCardapioTipoNome();
							?>
							</a>
							
							<a href="javascript:;" onclick="alert('excluir');">Excluir</a>
							<br /> 
						<?php
						}	
                    }                
                    ?>

					<br />
					
                    <a href="cadastrarCardapioTipo.php">Cadastrar</a> <br />

                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
</html>