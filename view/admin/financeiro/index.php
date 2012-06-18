<?php
// a variavel necessario eh para inserido os objetos que serao incluidos 
$necessario = array('financeiro');
include('../template/iniciarDados.php');

if ($_SESSION['NIVEL'] == 4) {
    header('location:../');
}
$financeiroBpm = new FinanceiroBpm();
$arrayFinanceiroVo = $financeiroBpm->buscar('financeiro');
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
                    <div class="cadastro_titulo"><p> Gerenciar Financeiro </p></div>
                    <div class="pesquisarConteiner">
                        <div class="cadastro_pesquisar">
                            <input type="text" style="height: 28px" />
                            <input type="buttom" value="Pesquisar" class="subMenuleft borderAll  <?php echo $cor_principal; ?>" />
                        </div>
                        <?php if ($_SESSION['NIVEL'] == 2 || $_SESSION['NIVEL'] == 1) { ?> 
                        <div class="cadastro_novo">
                            <a href="escolheHotel.php" class="subMenuleft borderAll <?php echo $cor_principal; ?>">Cadastrar Novo</a>
                        </div>
                        <?php } ?>
                    </div>
                    <table>
                        <tr class="linhaResultado">
                            <td class="colunaResultados colunaTitulo  <?php echo $cor_principal; ?>" colspan="3">Resultado de pesquisa</td> 
                        </tr>
                        <?php
                        if ($arrayFinanceiroVo == null) {
                            echo "<tr class ='linhaResultado'>
                                    <td>Sem nenhum financeiro cadastrado</td>
                                  </tr>";
                        }
                        // colocar os campos de pesquisa 
                        for ($i = 0; $i < count($arrayFinanceiroVo); $i++) {
                            ?>
                            <tr class ="linhaResultado">
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href='cadastrarFinanceiro.php?financeiro=<?php echo $arrayFinanceiroVo[$i]->getFinanceiroId(); ?>'> 
                                        <?php
                                        echo $arrayFinanceiroVo[$i]->getFinanceiroId();
                                        echo ' - ';
                                        //echo $arrayFinanceiroVo[$i]->getFinanceiroDescricao();
                                        ?>
                                    </a>
                                </td>
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href='cadastrarFinanceiro.php?financeiro=<?php echo $arrayFinanceiroVo[$i]->getFinanceiroId(); ?>'>Editar</a>
                                </td>
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href="javascript:;" onclick="excluir('financeiro', <?php echo $arrayFinanceiroVo[$i]->getFinanceiroId(); ?>);">Excluir</a>
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
    <script type="text/javascript" src="../../_js/hotel.js"></script>	
</html>
</html>