<?php
// a variavel necessario eh para inserido os objetos que serao incluidos 
$necessario = array('cardapio', 'cardapioTipo', 'foto');
include('../template/iniciarDados.php');

if ($_SESSION['NIVEL'] == 4) {
    header('location:../');
}
$cardapioBpm = new CardapioBpm();
$arrayCardapioVo = $cardapioBpm->buscarComFoto('cardapio');
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
                    <div class="cadastro_titulo"><p> Gerenciar Card�pio </p></div>
                    <div class="pesquisarConteiner">
                        <div class="cadastro_pesquisar">
                            <input type="text" style="height: 28px" />
                            <input type="buttom" value="Pesquisar" class="subMenuleft borderAll  <?php echo $cor_principal; ?>" />
                        </div>
                        <?php if ($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?> 
                            <div class="cadastro_novo">
                                <a href="cadastrarCardapio.php" class="subMenuleft borderAll <?php echo $cor_principal; ?>">Cadastrar Novo</a>
                            </div>
                        <?php } ?>
                    </div>
                    <table>
                        <tr class="linhaResultado">
                            <td class="colunaResultados colunaTitulo  <?php echo $cor_principal; ?>" colspan="4">Resultado de pesquisa</td> 
                        </tr>
                        <?php
                        if ($arrayCardapioVo == null) {
                            echo "<tr class ='linhaResultado'>
                                    <td>Sem nenhum servi�o cadastrado</td>
                                  </tr>";
                        }
                        // colocar os campos de pesquisa 
                        for ($i = 0; $i < count($arrayCardapioVo); $i++) {
                        	$foto = $arrayCardapioVo[$i]->getFotoVo();
                            ?>
                            <tr class ="linhaResultado">
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <img src="../upload/cardapio/<?php echo $foto->getFotoNomeThumb();?>" style="width=50px;height:50px;" />    
                                </td>
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href='cadastrarCardapio.php?cardapio=<?php echo $arrayCardapioVo[$i]->getCardapioId(); ?>'> 
                                        <?php
                                        if($_SESSION['NIVEL'] == 1){
                                        echo '| ';
                                        echo $arrayCardapioVo[$i]->getCardapioId();
                                        echo ' | ';
                                        }
                                        echo $arrayCardapioVo[$i]->getCardapioNome();
                                        ?>
                                    </a>
                                </td>
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href='cadastrarCardapio.php?cardapio=<?php echo $arrayCardapioVo[$i]->getCardapioId(); ?>'>Editar</a>
                                </td>
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href="javascript:;" onclick="excluir('cardapio', <?php echo $arrayCardapioVo[$i]->getCardapioId(); ?>);">Excluir</a>
                                </td>
                            </tr>
                            <?php
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
</html>