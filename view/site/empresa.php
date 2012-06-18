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
                        <div class="conteudoMenuCompleto <?php echo $cor_principal; ?>">Sobre o <?php echo $nome_site_Title;?></div>
                        <div class=".conteudoConteudoCompleto">
                            A marca hoteleira mais conhecida no mundo conta com um alto padrão de qualidade e serviço personalizado. Independente do seu destino, você conta com o cuidado do Holiday Inn Hotels & Resorts, em ambientes elegantes e acolhedores. Nos mais de 1.500 hotéis ao redor do mundo, encontram-se restaurantes e lounges, serviços de quarto, acedemias e instalações para eventos e reuniões.
                            O Holiday Inn Porto Alegre possui uma atmosfera aconchegante e a garantia de conforto e segurança encontrada nos hotéis da rede ao redor do mundo. A excepcional infraestrutura não se resume aos apartamentos. Restaurante, bar e salas de eventos também irão surpreender as suas expectativas. Seja qual for o motivo da sua viagem, o Holiday Inn Porto Alegre está preparado para receber você com toda a atenção e conforto.
                            Conheça o clube de benefícios da Marca Holiday Inn, o Priority Club.
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

