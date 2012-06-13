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

                    <div id="imageSlideshow">
                        <div rel="slider_content" style="display: none;">
                            <div rel="slide">
                                <div rel="type">image</div>
                                <div rel="title">Titulo da Imagem 1</div>
                                <div rel="description">Descrição da Imagem 1</div>
                                <div rel="content">../_imagens/hotel_fotos/hotel-01.jpg</div>
                                <div rel="target_url">#</div>
                                <div rel="target_window">_blank</div>
                            </div>
                            <div rel="slide">
                                <div rel="type">image</div>
                                <div rel="title">Titulo da Imagem 2</div>
                                <div rel="description">Descrição da Imagem 2</div>
                                <div rel="content">../_imagens/hotel_fotos/hotel-02.jpg</div>
                                <div rel="target_url">#</div>
                                <div rel="target_window">_blank</div>
                            </div>
                            <div rel="slide">
                                <div rel="type">image</div>
                                <div rel="title">Titulo da Imagem 3</div>
                                <div rel="description">Descrição da Imagem 3</div>
                                <div rel="content">../_imagens/hotel_fotos/hotel-03.jpg</div>
                                <div rel="target_url">#</div>
                                <div rel="target_window">_blank</div>
                            </div>
                            <div rel="slide">
                                <div rel="type">image</div>
                                <div rel="title">Titulo da Imagem 4</div>
                                <div rel="description">Descrição da Imagem 4</div>
                                <div rel="content">../_imagens/hotel_fotos/04.jpg</div>
                                <div rel="target_window">_blank</div>
                            </div>
                            <div rel="slide">
                                <div rel="type">image</div>
                                <div rel="title">Titulo da Imagem 5</div>
                                <div rel="description">Descrição da Imagem 5</div>
                                <div rel="content">../_imagens/hotel_fotos/05.jpg</div>
                                <div rel="target_window">_blank</div>
                            </div>
                        </div>
                    </div>
                    <div class="cf middleConteudo">
                        <div class="cadastro" style="padding-right:30px">
                            <div class="conteudoMenu <?php echo $cor_principal; ?>">Realize Sua Reserva</div>
                            <form action="frmUsuarioinserir.php" method="post" style="border:0; margin:0;" id="cadastro"  class="formDefault"  onSubmit="return valida(this)" enctype="multipart/form-data" >

                                <!-- Datepicker -->
                                <h2 class="demoHeaders">Data:</h2>
                                <div id="datepicker"></div>
                                <div class="cadastro_selecao">
                                    <input type="submit" name="cmdSalvar" value=" Cadastrar "  onClick="return cadastrar()" >
                                </div>
                            </form>
                        </div>
                        <div class="fotoInicial">
                            <img src="../_imagens/hotel_fotos/01.jpg" width="610px" height="350px">
                        </div>
                    </div>
                    <div class="cf middleConteudo">
                        <div class="fotoInicial">
                            <img src="./_imagens/hotel_fotos/02.jpg" width="610px" height="400px">
                        </div>
                        <div class="cadastro" style="padding-left:30px">
                            <div class="conteudoMenu <?php echo $cor_principal; ?>">Cadastre-se </div>
                            <form action="../admin/usuario/cadastrarUsuario.php" method="post" id="cadastroUser" name="cadastroUser"  class="formDefault"  onsubmit='return verificarCampos("cadastroUser");' >
                                <div class="cadastro_titulo_container" >           

                                    <!-- usuario -->
                                    Nome completo: 			<input type="text" name="usuarioNome" id="usuarioNome" maxlength="50" class="obrigatorio" /><br />
                                    Seu e-mail:			 	<input type="text" name="usuarioEmail" id="usuarioEmail" maxlength="50" class="obrigatorio" /><br />
                                    Pais:     				<input type="text" name="paisOrigem" id="paisOrigem" class="obrigatorio" /><br />

                                </div>

                                <div class="cadastro_selecao"><input type="submit" value="cadastrar novo usuario" name="cmdSalvar"></div>
                            </form>
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




