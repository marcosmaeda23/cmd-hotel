
	<div class="topoInicial <?php echo $cor_principal; ?>">
		<div class="content">
			<div class="cf logo">
				<a href="index.php"> <?php echo $nome_site; ?> </a>
			</div>
			<div class="cf loginInicial">
				<form method="post" action="../admin/inicialController.php" 
					class="formDefault">
					<input type="hidden" name="acao" id="acao" value="logar" /> Usuário
					<input type="text" name="login" id='login' maxlength="50" /> Senha
					<input type="password" name="senha" id='senha' maxlength="20" /> 
					<input type="submit" value="  Entrar  " />
				</form>
			</div>
		</div>
		<div class="menuTopo <?php echo $cor_secundaria; ?>">
			<ul class="content nav">
				<li><a href="#" title="Home">Home</a></li>
				<li class="active"><a href="#" title="Perfil">Empresa</a></li>
				<li><a href="#" title="Interesses">Galeria</a></li>
				<li><a href="contato.php" title="Contato">Contato</a></li>
			</ul>
		</div>
	</div>
	