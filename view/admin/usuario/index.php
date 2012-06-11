<?php
// a variavel necessario eh para inserido os objetos que serao incluidos 
$necessario = array('usuario');
include('../template/iniciarDados.php');

if(empty($_SESSION['NOME']) || $_SESSION['NIVEL'] == 4){
	header('location:cadastrarUsuario.php');	
}
$usuarioVo = new UsuarioVo();
$usuarioBpm = new UsuarioBpm();

$arrayUsuarioVo = $usuarioBpm -> buscar('usuario');

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
					// colocar os campos de pesquisa 
					
					for ( $i = 0; $i < count($arrayUsuarioVo); $i++ ) {?>
						<a href='cadastrarUsuario.php?usuario=<?php echo $arrayUsuarioVo[$i]->getUsuarioId();?>'> 
					<?php
						echo $arrayUsuarioVo[$i]->getUsuarioId();
						echo ' - ';
						echo $arrayUsuarioVo[$i]->getUsuarioNome();
						?>
						</a>
						<a href="javascript:;" onclick="alert('excluir');">Excluir</a>
						<br />
					<?php
						// colocar aqui um botao para excluir e outro para alterar
					}
					
					?>
					
					<br />
					
                    <a href="cadastrarUsuario.php">Cadastrar</a> <br />

					
                    

                </div>
            </div>
        </div>

        <?php include('../template/rodapeAdmin.php'); ?>
    </body>
    <!-- scripts gerais -->
    <?php include('../template/js.php') ?>
    <script type="text/javascript">
		<?php if (isset($_POST['paisOrigem'])){ ?>
			aplicarMascara(<?php $_POST['paisOrigem'];?>);
                        
		<?php } ?>
	</script>
</html>
</html>