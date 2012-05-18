<?php include('topo.php'); ?>
<!-- #Slider -->
<link rel="stylesheet" type="text/css" href="_css/slider/sliderwall_bullets_skin.css"/>
<link rel="stylesheet" type="text/css" href="_css/slider/slideshow_sample.css"/>
<script type="text/javascript" src="_js/slider/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="_js/slider/sliderwall-bullets-1.1.2.js"></script>
<script type="text/javascript" src="_js/slider/sliderwall-options.js"></script>
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
        <form action="admin/inicialController.php" method="post" style="border:0; margin:0;" id="cadastroUser"  class="formDefault"  onSubmit="return valida(this)" enctype="multipart/form-data" >
            <div class="cadastro_titulo_container" >
                <div class="cadastro_titulo"> Nome: <input type="text" name="nome" id="nome" maxlength="50" class="required"  /></div>
                <div class="cadastro_titulo"> Sobrenome: <input type="text" name="sobrenome" id="sobrenome" maxlength="50" class="required"  /></div>
                <div class="cadastro_titulo"> Seu e-mail: <input type="text" name="email" maxlength="50" class="required"  /></div>
                <div class="cadastro_titulo"> Usuário: <input type="text" name="login" maxlength="50" class="required"  /></div>
                <div class="cadastro_titulo"> Senha: <input type="password" name="senha" maxlength="50" class="required"  /></div>
                <div class="cadastro_titulo"> Lembrete: <input type="text" name="lembrete" id="lembrete" maxlength="50" class="required"  /></div>
                <div class="cadastro_titulo"> Eu Sou: <select name="sexo" id="sexo" class="cadastro_selecao_especial" >
                        <option value=""> Selecione o gênero: </option>
                        <option value="feminino"> Feminino </option>
                        <option value="masculino"> Masculino </option>
                    </select></div>
                <div class="cadastro_titulo"> Data de nascimento:<input type="text" name="dataNascimento" id="name="dataNascimento" maxlength="50" class="required"  /></div>
                <div class="cadastro_titulo"> Documento tipo: <input type="text" name="DocumentoTipo" id="DocumentoTipo" maxlength="50" class="required"  /></div>
                <div class="cadastro_titulo"> Documento numero: <input type="text" name="documento" id="documento" maxlength="50" class="required"  /></div>
                <div class="cadastro_titulo"> Documento numero: <input type="text" name="documento" id="documento" maxlength="50" class="required"  /></div>

            </div>


            <div class="cadastro_selecao"><input type="submit" name="cmdSalvar" value=" Cadastrar "  onClick="return cadastrar()" ></div>
        </form>
    </div>
    <?php require_once("rodape.php"); ?>