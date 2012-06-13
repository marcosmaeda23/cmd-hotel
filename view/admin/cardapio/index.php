<?php

// a variavel necessario eh para inserido os objetos que serao incluidos 
$necessario = array('cardapio', 'cardapioTipo');
include('../template/iniciarDados.php');
$arrayCardapioVo = new CardapioVo();


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
                    /*
                    if($arrayCardapioVo < 1){
                    	echo 'Sem nenhum cardápio cadastrado';
                    } else {
	                    for ( $i = 0; $i < count($arrayCardapioVo); $i++ ) {?>
							<a href='cadastrarCardapio.php?cardapio=<?php echo $arrayCardapioVo[$i]->getCardapioId();?>'> 
							<?php
							echo $arrayCardapioVo[$i]->getCardapioId().' - ';
							echo $arrayCardapioVo[$i]->getCardapioNome();
							?>
							</a>
							
							<a href="javascript:;" onclick="alert('excluir');">Excluir</a>
							<br /> 
						<?php
						}	
                    } */               
                    ?>

					<br />
					
                    <a href="cadastrarCardapio.php">Cadastrar</a> <br />
                    <a href="../cardapioTipo/cadastrarCardapioTipo.php">Cadastrar tipo de cardápio</a> <br />


                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
</html>