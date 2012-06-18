<?php
// a variavel necessario eh para inserido os objetos que serao incluidos 
$necessario = array('quartoTipo');
include('../template/iniciarDados.php');

$quartoTipoVo = new QuartoTipoVo();
$quartoTipoBpm = new QuartoTipoBpm();

$arrayQuartoTipoVo = $quartoTipoBpm->buscar('quartoTipo');
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
                    <div class="cadastro_titulo"><p> Gerenciar Cardapio Tipo </p></div>
                    <div class="pesquisarConteiner">
                        <div class="cadastro_pesquisar">
                            <input type="text" style="height: 28px" />
                            <input type="buttom" value="Pesquisar" class="subMenuleft borderAll  <?php echo $cor_principal; ?>" />
                        </div>
                        <?php if ($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?> 
                            <div class="cadastro_novo">
                                <a href="cadastrarQuartoTipo.php" class="subMenuleft borderAll <?php echo $cor_principal; ?>">Cadastrar Novo</a>
                            </div>
                        <?php } ?>
                    </div>
                    <table>
                        <tr class="linhaResultado">
                            <td class="colunaResultados colunaTitulo  <?php echo $cor_principal; ?>" colspan="3">Resultado de pesquisa</td> 
                        </tr>
                        <?php
                        if ($arrayQuartoTipoVo == null) {
                            echo "<tr class ='linhaResultado'>
                                    <td>Sem nenhum serviço cadastrado</td>
                                  </tr>";
                        }
                        // colocar os campos de pesquisa 
                        for ($i = 0; $i < count($arrayQuartoTipoVo); $i++) {
                            ?>
                            <tr class ="linhaResultado">
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                <?php if ($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?> 
                                    <a href='cadastrarQuartoTipo.php?quartoTipo=<?php echo $arrayQuartoTipoVo[$i]->getQuartoTipoId(); ?>'> 
                                <?php } else {?>
                                    <a href='exibirQuartoTipo.php?quartoTipo=<?php echo $arrayQuartoTipoVo[$i]->getQuartoTipoId(); ?>'> 
                                <?php } ?>
                                        <?php
                                        if($_SESSION['NIVEL'] == 1){
	                                        echo '| ';
	                                        echo $arrayQuartoTipoVo[$i]->getQuartoTipoId();
	                                        echo ' | ';
                                        }

                                        echo $arrayQuartoTipoVo[$i]->getQuartoTipoDescricao();
                                        ?>
                                    </a>
                                </td>
                                <?php if ($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?> 
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href='cadastrarQuartoTipo.php?quartoTipo=<?php echo $arrayQuartoTipoVo[$i]->getQuartoTipoId(); ?>'>Editar</a>
                                </td>
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href="javascript:;" onclick="excluir('quartoTipo', <?php echo $arrayQuartoTipoVo[$i]->getQuartoTipoId(); ?>);">Excluir</a>
                                </td>
                                <?php } ?>
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
</html>