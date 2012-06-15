<?php
// a variavel necessario eh para inserido os objetos que serao incluidos 
$necessario = array('usuario');
include('../template/iniciarDados.php');

if (empty($_SESSION['NOME']) || $_SESSION['NIVEL'] == 4) {
    header('location:cadastrarUsuario.php');
}
$usuarioVo = new UsuarioVo();
$usuarioBpm = new UsuarioBpm();

$arrayUsuarioVo = $usuarioBpm->buscar('usuario');
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
                    <div class="cadastro_titulo"><p> Gerenciar Usu&aacute;rio </p></div>
                    <div class="pesquisarConteiner">
                        <div class="cadastro_pesquisar">
                            <input type="text" style="height: 28px" />
                            <input type="buttom" value="Pesquisar" class="subMenuleft borderAll  <?php echo $cor_secundaria; ?>" />
                        </div>
                        <div class="cadastro_novo">
                             <a href="cadastrarUsuario.php" class="subMenuleft borderAll  <?php echo $cor_secundaria; ?>">Cadastrar Novo</a>
                        </div>
                    </div>
                    <table>
                        <tr class="linhaResultado">
                            <td class="colunaResultados colunaTitulo  <?php echo $cor_secundaria; ?>" colspan="3">Resultado de pesquisa</td> 
                        </tr>                    
                        <?php
                        // colocar os campos de pesquisa 
                        for ($i = 0; $i < count($arrayUsuarioVo); $i++) {
                            ?>
                            <tr class ="linhaResultado">
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href='cadastrarUsuario.php?usuario=<?php echo $arrayUsuarioVo[$i]->getUsuarioId(); ?>'> 
                                        <?php
                                        echo $arrayUsuarioVo[$i]->getUsuarioId();
                                        echo ' - ';
                                        echo $arrayUsuarioVo[$i]->getUsuarioNome();
                                        ?>
                                    </a>
                                </td>
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href="javascript:;" onclick="alert('editar');">Editar</a>
                                </td>
                                <td class ="colunaResultado <?php echo ($i % 2) ? 'linhaImpar' : 'linhaPar'; ?>">
                                    <a href="javascript:;" onclick="alert('excluir');">Excluir</a>
                                </td>
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
    <script type="text/javascript">
<?php if (isset($_POST['paisOrigem'])) { ?>
        aplicarMascara(<?php $_POST['paisOrigem']; ?>);
                                                                    
<?php } ?>
    </script>
</html>
</html>