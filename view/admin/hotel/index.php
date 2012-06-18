<?php
$necessario = array('hotel');
include('../../admin/template/iniciarDados.php');

if (empty($_SESSION['NOME'])) {
    header('location:../');
}

$hotelVo = new HotelVo();
$hotelBpm = new HotelBpm();

$arrayHotelVo = $hotelBpm->buscar('hotel');

//var_dump($arrayHotelVo);
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
                    <div class="cadastro_titulo"><p> Gerenciar Hotel </p></div>
                    <div class="pesquisarConteiner">
                        <div class="cadastro_pesquisar">
                            <input type="text" style="height: 28px" />
                            <input type="buttom" value="Pesquisar" class="subMenuleft borderAll  <?php echo $cor_principal; ?>" />
                        </div>
                        <?php if ($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?> 
                            <div class="cadastro_novo">
                                <a href="cadastrarHotel.php" class="subMenuleft borderAll <?php echo $cor_principal; ?>">Cadastrar Novo</a>
                            </div>
                        <?php } ?>
                    </div>
                    <table>
                        <tr class="linhaResultado">
                            <td class="colunaResultados colunaTitulo  <?php echo $cor_principal; ?>" colspan="3">Resultado de pesquisa</td> 
                        </tr>
                        <?php
                        if ($arrayHotelVo == null) {
                            echo "<tr class ='linhaResultado'>
                                    <td>Sem nenhum serviço cadastrado</td>
                                  </tr>";
                        }
                        // colocar os campos de pesquisa 
                        for ($i = 0; $i < count($arrayHotelVo); $i++) {
                            ?>
                            <tr class ="linhaResultado">
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                <?php if ($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?> 
                                    <a href='cadastrarHotel.php?hotel=<?php echo $arrayHotelVo[$i]->getHotelId(); ?>'> 
                                <?php } else {?>
                                    <a href='exibirHotel.php?hotel=<?php echo $arrayHotelVo[$i]->getHotelId(); ?>'> 
                                <?php } ?>
                                        <?php
                                        if($_SESSION['NIVEL'] == 1){
	                                        echo '| ';

	                                        echo $arrayHotelVo[$i]->getHotelId();
	                                        echo ' | ';
                                        }
    
                                        echo $arrayHotelVo[$i]->getHotelNome();
                                        ?>
                                    </a>
                                </td>
                                <?php if ($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?> 
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href='cadastrarHotel.php?hotel=<?php echo $arrayHotelVo[$i]->getHotelId(); ?>'>Editar</a>
                                </td>
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href="javascript:;" onclick="excluir('hotel', <?php echo $arrayHotelVo[$i]->getHotelId(); ?>);">Excluir</a>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php
                            // colocar aqui um botao para excluir e outro para alterar
                        }
                        echo "</table>";
                        ?>
                        <br />
                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>
    <script type="text/javascript" src="../../_js/hotel.js"></script>	
</html>
</html>