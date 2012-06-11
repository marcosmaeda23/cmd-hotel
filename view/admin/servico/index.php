<?php

// a variavel necessario eh para inserido os objetos que serao incluidos 
$necessario = array('servico');
include('../template/iniciarDados.php');
$servicoBpm = new ServicoBpm();
$arrayServicoVo = $servicoBpm -> buscar('servico');


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
                    if($arrayServicoVo < 1){
                    	echo 'Sem nenhum serviço cadastrado';
                    } else {
	                    for ( $i = 0; $i < count($arrayServicoVo); $i++ ) {?>
							<a href='cadastrarServico.php?servico=<?php echo $arrayServicoVo[$i]->getServicoId();?>'> 
							<?php
							echo $arrayServicoVo[$i]->getServicoId().' - ';
							echo $arrayServicoVo[$i]->getServicoNome();
							?>
							</a>							
							<a href="javascript:;" onclick="excluir('servico', <?php echo $arrayServicoVo[$i]->getServicoId();?>);">Excluir</a>
							<br /> 
						<?php
						}	
                    }                
                    ?>

					<br />
					
                    <a href="cadastrarServico.php">Cadastrar</a> <br />

                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
</html>