<?php


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
<!--
 * Created on 22/05/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
-->
<head>
	<title> </title>
	
</head>
<body>	
	
					
					
					
					
					
					
					<div id="id">
						<form action="usuarioController.php" method="post" onsubmit="">
							<input type="hidden" name="acao" id="acao" value="alterarSenha" />
							<input type="hidden" name="usuarioLogin" id="usuarioLogin" value="" />
							
							<label for="usuarioLogin">Senha</label>
							<input type="password" name="usuarioSenha" id="usuarioSenha" /><br />
							<label for="usuarioLogin">Confirmação senha</label>
							<input type="password" name="usuarioLogin" id="usuarioLogin" /><br />
							<input type="submit" value="Enviar" />
						</form>
					</div>	
	            </div>
	        </div>
	    </div>
	</div>
	<?php include('../../rodape.php');?>
</body>
	<!-- scripts -->
	<script type="text/javascript" src="../../_js/slider/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../../_js/plugin/jquery.maskedinput-1.3.min.js"></script>
	<script type="text/javascript" src="../../_js/funcoes.js"></script>
	<script type="text/javascript" src="../../modulos/modulos.js"></script>
	<script type="text/javascript" src="../../_js/usuario.js"></script>
	
</html>
