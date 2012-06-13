<?php

// a variavel necessario eh para inserido os objetos que serao incluidos 
$necessario = array('servico');
include('../template/iniciarDados.php');

if($_SESSION['NIVEL'] == 4){
	header('location:../');
} 
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
	                    	<?php if($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1){ ?> 	
								<a href='cadastrarServico.php?servico=<?php echo $arrayServicoVo[$i]->getServicoId();?>'> 
							<?php } 
							echo $arrayServicoVo[$i]->getServicoId().' - ';
							echo $arrayServicoVo[$i]->getServicoNome();
							
							if($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1){ ?> 						
								</a>	
								<a href="javascript:;" onclick="excluir('servico', <?php echo $arrayServicoVo[$i]->getServicoId();?>);">Excluir</a>
							<?php } ?>
							<br /> 
						<?php
						}	
                    }                
                    ?>

					<br />
					<?php if($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1){ ?> 
                    	<a href="cadastrarServico.php">Cadastrar</a> <br />
                    <?php } ?>

                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>	
</html>