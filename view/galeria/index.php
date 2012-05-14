<?php
session_start();
include('../../biblioteca/inicializacao_pagina.php');


if(empty($_SESSION['usuario'])){
	header('location:../index.php');
}

// fazer a busca das mensagens
$mensagemBpm = new MensagemBpm();
$arrayBusca = array('usuario' => $_SESSION['usuario']);
$arrayMensagemVo = $mensagemBpm -> buscar($arrayBusca);
if($arrayMensagemVo === false){
	
}
// fazer a busca dos contatos
$contatoBpm = new ContatoBpm();
$arrayBusca = array('usuario' => $_SESSION['usuario']);
$arrayContatoVo = $contatoBpm -> buscar($arrayBusca);
if($arrayContatoVo === false){

}

// fazer a busca das fotos
$fotoBpm = new FotoBpm();
$arrayBusca = array('usuario' => $_SESSION['usuario']);
$arrayFotoVo = $fotoBpm -> buscar($arrayBusca);
if($arrayFotoVo === false){

}
//var_dump($arrayFotoVo);
?>
<html>
	<head>
		<title>Trabalho N1 - Programação para Internet</title>
		<link rel="stylesheet" href="estilo.css" type="text/css">
		<!-- javascript -->	
		<script type="text/javascript" charset="UTF-8" src="../../biblioteca/jquery-1.7.1.min.js"></script>	
		<script type="text/javascript" charset="UTF-8" src="index.js"></script>	
	<head>
	<body>
		<div class='conteudo'>
			<div id='foto'>
				<div id='foto_interna'>
				
					<?php 
					$esconder_amigo = false;
					for ($i = 0; $i < count($arrayFotoVo); $i++) { 
						if($arrayFotoVo[$i]->getFotoTipo() == 'amigo'){
							$esconder_amigo = true; ?>
							<img src="../../upload/<?php echo $arrayFotoVo[$i]->getFotoNome();?>" class='imagem'/>
						<?php 
						}
						
					}
					if(!$esconder_amigo){ ?>
					<form method="post" action ='galeriaController.php' enctype="multipart/form-data" />
						<input type='hidden' name='acao' id='acao' value='cadastrar_foto' />
						<input type="hidden" name='usuario' id='usuario' value='<?php echo $_SESSION['usuario'];?>' />
						<input type='hidden' name='foto_tipo' id='foto_tipo' value='amigo' />
						Escolha uma foto<br />
						<input type="file" name='foto' /><br />
						<input type="submit" value='Enviar'>
					</form>
					<?php }?>
				</div>
			</div>		
			<div id='foto_familia'>
				<div id='foto_familia_interna'>	
					<?php 
					$esconder_familia = false;
					for ($i = 0; $i < count($arrayFotoVo); $i++) { 
						if($arrayFotoVo[$i]->getFotoTipo() == 'familia'){
							$esconder_familia = true; ?>
							<img src="../../upload/<?php echo $arrayFotoVo[$i]->getFotoNome();?>" class='imagem'/>
						<?php 
						}
						
					}
					if(!$esconder_familia){ ?>
					<form method="post" action ='galeriaController.php' enctype="multipart/form-data" />
						<input type='hidden' name='acao' id='acao' value='cadastrar_foto' />
						<input type='hidden' name='foto_tipo' id='foto_tipo' value='familia' />
						<input type="hidden" name='usuario' id='usuario' value='<?php echo $_SESSION['usuario'];?>' />
						Escolha uma foto<br />
						<input type="file" name='foto'/><br />
						<input type="submit" value='Enviar'>
					</form>
					<?php }?>
				</div>
			</div>	
			<div id='painel'>
				<div id='painel_interna'>	<span style='font-weight:bolder;'>
					Bem Vindo<br />
					<?php echo strtoupper($_SESSION['usuario_nome']);?>
					</span>
					<br /><br />
					<?php if($esconder_amigo){ ?>
						<a href='javascript:;' onclick='apagarFoto("amigo");'>Apagar foto</a><br />
					<?php } 
					if($esconder_familia){ ?>
						<a href='javascript:;' onclick='apagarFoto("familia");'>Apagar foto familia</a><br />
					<?php } ?>
					<a class='aparecerOffline' href='javascript:;' onclick='offLine();'>Off Line</a><br />
					<a class='aparecerOnline' href='javascript:;' onclick='onLine();'>On Line</a><br />
					<br /><br />
					<a href='javascript:;' onclick='sair();'>Sair</a><br />
				
				</div>
			</div>			
			<div id='contato'>		
				<div id='contato_interna'>	
					<form name='cadastrar_contato' id='cadastrar_contato' action="galeriaController.php" onsubmit='return verificarCampos("cadastrar_contato");' method='post'>
						<input type="hidden" name='acao' id='acao' value='cadastrar_contato' />
						<input type="hidden" name='usuario' id='usuario' value='<?php echo $_SESSION['usuario'];?>' />
						<label for='contato_nome'>Contato</label><br />
						<input type='text' id='contato_nome' name='contato_nome' class='textArea obrigatorio' />
						<input type='submit' value='Enviar'>
					
					</form>	
					<table>
						<tr>
							<td>
								<span style='font-weight:bolder;font-size:21px;'>Contato</span>
							</td>
						</tr>
						<tr>
							<td>
								<ul id='online' class=''>
									<?php 
									for ($i = 0; $i < count($arrayContatoVo); $i++) { ?>
										<li><?php echo nl2br($arrayContatoVo[$i]->getContatoNome()); ?></li>
									<?php 
									} ?>
								</ul>
							</td>
						</tr>
					</table>		
				</div>
			</div>		
			<div id='mensagem'>	
				<div id='mensagem_interna'>	
					<form name='cadastrar_mensagem' id='cadastrar_mensagem' action="galeriaController.php" onsubmit='return verificarCampos("cadastrar_mensagem");' method='post'>
						<input type="hidden" name='acao' id='acao' value='cadastrar_mensagem' />
						<input type="hidden" name='usuario' id='usuario' value='<?php echo $_SESSION['usuario'];?>' />
						<label for='mensagem_texto'>Mensagem</label><br />
						<textarea id='mensagem_texto' name='mensagem_texto' class='textArea obrigatorio'></textarea>
						<input type='submit' value='Enviar'>
					
					</form>
					<table>
						<tr>
							<td>
								<span style='font-weight:bolder;font-size:21px;'>Mensagens</span>
							</td>
						</tr>
						<tr>
							<td>
								<ul>
									<?php 
									for ($i = 0; $i < count($arrayMensagemVo); $i++) { ?>
										<li><?php echo nl2br($arrayMensagemVo[$i]->getMensagemTexto()); ?></li>
									<?php 
									} ?>
								</ul>
							</td>
						</tr>
					</table>
				</div>
			</div>	
			
		</div>
	</body>
</html>
