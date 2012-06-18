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
No mundo todo, o Brasil é conhecido pelo carinho com que recebe seus visitantes. Isso fica ainda mais evidente quando você se hospeda nos empreendimentos da Rede  <?php echo $nome_site; ?>  Hotéis & Resorts. Além da classe que nossos empreendimentos oferecem, a  <?php echo $nome_site; ?>  tem um jeito único de tratar seus hóspedes.
Nossa Missão
Garantir a plena satisfação de
clientes, funcionários e investidores
com lucratividade. 	Nossa Visão
Ser reconhecida pela
excelência em serviços
hoteleiros. 	Nossos Fundamentos
- Atendimento
- Entregar o que foi prometido
- Gestão
Palavra do Presidente
 <?php echo $nome_site; ?>  Hotéis & Resorts: 100% brasileira.
O jeito brasileiro de hospedar. Muito mais que um conceito, esta é a principal filosofia da rede  <?php echo $nome_site; ?>  de Hotéis & Resorts. Com mais de quarenta anos de história a rede  <?php echo $nome_site; ?>  tem orgulho ser líder em sua categoria. Tal reconhecimento só pôde se concretizar graças à visão empreendedora de seus fundadores, que sempre zelaram pela constante atualização de seus produtos e serviços, bem como a capacitação de seus profissionais.

O crescimento da empresa não aconteceu ao acaso. Durante toda a sua existência a  <?php echo $nome_site; ?>  provou que é possível realizar uma expansão de qualidade e com solidez. Das sementes de café  <?php echo $nome_site; ?>  que originaram os negócios da família (e deram o nome aos seus empreendimentos), até os onze hotéis espalhados por diversas cidades do país, a rede  <?php echo $nome_site; ?>  Hotéis & Resorts continua oferecendo serviços que atendem aos mais altos padrões internacionais, desenvolvendo e consolidando parcerias vitoriosas, para oferecer sempre o melhor aos seus hóspedes sem nunca esquecer sua missão principal: vender satisfação para os seus clientes através da hospedagem no melhor estilo brasileiro.

Cristiano Zillmann
Presidente

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

