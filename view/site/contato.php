<?php
include('../admin/template/iniciarDados.php');
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
        <?php include('../template/topo.php') ?>
        <div class="content cf">
            <div class="container">
                <div class="middle">
                    <div class="cf middleConteudo">
                        <div class="conteudoMenuCompleto <?php echo $cor_principal; ?>">Realize Sua Reserva</div>
                        <div class=".conteudoConteudoCompleto">
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

<?php include('../template/rodape.php'); ?>

    </body>
    <!-- scripts gerais -->
<?php include('../template/js.php') ?>	
</html>

