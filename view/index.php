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
               <input type="hidden" name="acao" id="acao" maxlength="50" value="cadastrarUsuario" /><br />
               <input type="hidden" name="usuarioStatus" id="usuarioStatus" value="1" /><br />
               
               <!-- usuario -->
               Nome completo: 			<input type="text" name="usuarioNome" id="usuarioNome" maxlength="50" class="required"  /><br />
               Seu e-mail:			 	<input type="text" name="usuarioEmail" id="usuarioEmail" maxlength="50" class="required"  /><br />
               Usuário: 				<input type="text" name="usuarioLogin" id="usuarioLogin" maxlength="50" class="required"  /><br />
               Senha: 					<input type="password" name="usuarioSenha"id="usuarioSenha" maxlength="50" class="required"  /><br />
               confirmacao de senha: 	<input type="password" name="usuarioConfirmacaoSenha" id="usuarioConfirmacaoSenha"  maxlength="50" class="required"  /><br />
               Lembrete: 				<input type="text" name="usuarioLembrete" id="usuarioLembrete" maxlength="50" /><br />
               Eu Sou: 					<select name="usuarioSexo" id="usuarioSexo" class="cadastro_selecao_especial" >
                        					<option value=""> Selecione o gênero: </option>
                       						<option value="f"> Feminino </option>
                        					<option value="m"> Masculino </option>
                    					</select><br />
               Data de nascimento:		<input type="text" name="usuarioDataNascimento" id="usuarioDataNascimento" maxlength="50" class="required"  /><br />
				Documento tipo: 		<select name="usuarioDocumentoTipo" id="usuarioDocumentoTipo" class="cadastro_selecao_especial" >
                        					<option value=""> Selecione o tipo do documento: </option>
                       						<option value="cpf"> cpf </option>
                        					<option value="cnpj"> cnpj </option>
                        					<option value="passaporte"> passaporte </option>
                    					</select><br />
               Documento numero: 		<input type="text" name="usuarioDocumento" id="usuarioDocumento" maxlength="50" class="required"  /><br />
               
               <!-- telefone -->
               Telefone tipo: 			<select name="telefoneTipo" id="telefoneTipo" class="cadastro_selecao_especial" >
                        					<option value=""> Selecione o tipo do telefone: </option>
                        					<option value="residencial"> residencial </option>
                       						<option value="celular"> celular </option>
                        					<option value="comercial"> comercial </option>
                   						</select><br />
               Ddi: 					<input type="text" name="telefoneDdi" id="telefoneDdi" maxlength="5" class="required"  /><br />
               Ddd: 					<input type="text" name="telefoneDdd" id="telefoneDdd" maxlength="5" class="required"  /><br />
               Telefone: 				<input type="text" name="telefoneNumero" id="telefoneNumero" maxlength="15" class="required"  /><br />
               ramal: 					<input type="text" name="telefoneRamal" id="telefoneRamal" maxlength="5" class="required"  /><br />
               recado: 					<input type="text" name="telefoneRecado" id="telefoneRecado" maxlength="100" /><br />
               
               <!-- cep -->
               							
               							
               							<input type="submit" value="Enviar"  /><br />
               
            </div>


            <div class="cadastro_selecao"><input type="submit" name="cmdSalvar" value=" Cadastrar "  onClick="return cadastrar()" ></div>
        </form>
    </div>
    <?php require_once("rodape.php"); ?>