<?php
session_start();
if (empty($_SESSION['NOME'])) {
    echo '<script language="JavaScript">' .
    'alert("Realize login");'.
    'location.href="../";' .
    '</script>';
}
if($_GET['deslogar']){
	session_unset();
	session_destroy();
	header('location:../../');
}
include('../../template/iniciarDados.php');
?>
<html>
<head>
<title><?php echo $nome_site_Title; ?>
</title>
<link href="../../_css/reset.css" type="text/css" media="screen"
	rel="stylesheet" />
<link href="../../_css/A90.css" type="text/css" media="screen"
	rel="stylesheet" />
<link href="../../_css/style_admin.css" type="text/css" media="screen"
	rel="stylesheet" />
<link href="../../_css/menu.css" type="text/css" media="screen"
	rel="stylesheet" />

</head>
<body>
	<div class="menuTopo <?php echo $cor_secundaria; ?>"
		style="height: 70px !important;">
		<ul class="content adminNav">
			<div class="cf logo">
				<a href="index.php"> <?php echo $nome_site; ?> </a>
			</div>
			<div id="menu">
				<ul class="menu">
					<li><a href="" class="parent"><span>Gerenciar</span> </a>
						<ul>
							<li><a href="../usuario" class="parent"><span>Usuario</span> </a>
							</li>
							<li><a href="../servico" class="parent"><span>Servi�o</span> </a>
							</li>
							<li><a href="../quarto" class="parent"><span>Quarto</span> </a></li>
							<li><a href="../cardapio" class="parent"><span>Cardapio</span> </a>
							</li>
							<li><a href="../pacote" class="parent"><span>Pacote</span> </a></li>
							<li><a href="../ambiente" class="parent"><span>Ambiente</span> </a>
							</li>
							<li><a href="../financeiro" class="parent"><span>Financeio</span>
							</a>
							</li>
						</ul>
					</li>
				</ul>
				<li><a href="#" title="Home">Reservas</a></li>
				<li><a href="?deslogar=true" title="Perfil">Sair</a></li>
		
		</ul>
	</div>

	<div class="content">
		<div class="container">
			<div class="adminMiddle">