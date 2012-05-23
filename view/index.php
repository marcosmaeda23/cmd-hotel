<?php include('topo.php'); ?>
<!-- #Slider -->
<link rel="stylesheet" type="text/css" href="_css/slider/sliderwall_bullets_skin.css"/>
<link rel="stylesheet" type="text/css" href="_css/slider/slideshow_sample.css"/>
<script type="text/javascript" src="_js/slider/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="_js/slider/sliderwall-bullets-1.1.2.js"></script>
<script type="text/javascript" src="_js/slider/sliderwall-options.js"></script>
<script type="text/javascript" src="admin/_js/index.js"></script>
<script type="text/javascript" src="_js/funcoes.js"></script>
<div id="imageSlideshow">
    <div rel="slider_content" style="display: none;">
        <div rel="slide">
            <div rel="type">image</div>
            <div rel="title">Titulo da Imagem 1</div>
            <div rel="description">Descrição da Imagem 1</div>
            <div rel="content">_imagens/hotel_fotos/hotel-01.jpg</div>
            <div rel="target_url">http://www.cmd.com</div>
            <div rel="target_window">_blank</div>
        </div>
        <div rel="slide">
            <div rel="type">image</div>
            <div rel="title">Titulo da Imagem 2</div>
            <div rel="description">Descrição da Imagem 2</div>
            <div rel="content">_imagens/hotel_fotos/hotel-02.jpg</div>
            <div rel="target_url">http://www.cmd.com</div>
            <div rel="target_window">_blank</div>
        </div>
        <div rel="slide">
            <div rel="type">image</div>
            <div rel="title">Titulo da Imagem 3</div>
            <div rel="description">Descrição da Imagem 3</div>
            <div rel="content">_imagens/hotel_fotos/hotel-03.jpg</div>
            <div rel="target_url">http://www.cmd.com</div>
            <div rel="target_window">_blank</div>
        </div>
        <div rel="slide">
            <div rel="type">image</div>
            <div rel="title">Titulo da Imagem 4</div>
            <div rel="description">Descrição da Imagem 4</div>
            <div rel="content">_imagens/hotel_fotos/04.jpg</div>
            <div rel="target_window">_blank</div>
        </div>
        <div rel="slide">
            <div rel="type">image</div>
            <div rel="title">Titulo da Imagem 5</div>
            <div rel="description">Descrição da Imagem 5</div>
            <div rel="content">_imagens/hotel_fotos/05.jpg</div>
            <div rel="target_window">_blank</div>
        </div>
    </div>
</div>
<div class="cf middleConteudo">
    <div class="cadastro" style="padding-right:30px">
        <div class="conteudoMenu <?php echo $cor_principal; ?>">Realize Sua Reserva</div>
        <form action="frmUsuarioinserir.php" method="post" style="border:0; margin:0;" id="cadastroUser"  class="formDefault"  onSubmit="return valida(this)" enctype="multipart/form-data" >

            <!-- Datepicker -->
            <h2 class="demoHeaders">Data:</h2>
            <div id="datepicker"></div>
            <div class="cadastro_selecao">
                <input type="submit" name="cmdSalvar" value=" Cadastrar "  onClick="return cadastrar()" >
            </div>
        </form>
    </div>
    <div class="fotoInicial">
        <img src="_imagens/hotel_fotos/01.jpg" width="610px" height="350px">
    </div>
</div>
<div class="cf middleConteudo">
    <div class="fotoInicial">
        <img src="_imagens/hotel_fotos/02.jpg" width="610px" height="400px">
    </div>
    <div class="cadastro" style="padding-left:30px">
        <div class="conteudoMenu <?php echo $cor_principal; ?>">Cadastre-se </div>
        <form action="admin/usuario/index.php" method="post" id="cadastroUser"  class="formDefault"  onSubmit="return verificarCampos('cadastroUser');" >
            <div class="cadastro_titulo_container" >           
               
               <!-- usuario -->
               Nome completo: 			<input type="text" name="usuarioNome" id="usuarioNome" maxlength="50" class="obrigatorio"  /><br />
               Seu e-mail:			 	<input type="text" name="usuarioEmail" id="usuarioEmail" maxlength="50" class="obrigatorio"  /><br />
               Pais:     				<input type="text" name="paisOrigem" id="paisOrigem" class="required"  /><br />
               
            </div>

            <div class="cadastro_selecao"><input type="submit" name="cmdSalvar"></div>
        </form>
    </div>
    <?php require_once("rodape.php"); ?>