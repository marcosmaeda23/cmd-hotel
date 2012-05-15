<?php
session_start();
include('../biblioteca/inicializacao_pagina.php');
include('../biblioteca/config.php');
//if($_SESSION['usuarioLogin']){
//	header("Location: home.php");
//	}
?>
<html>
<head>
    <title> <?php echo $nome_site_Title ; ?> </title>
    <link href="_css/reset.css" type="text/css" media="screen" rel="stylesheet" />
    <link href="_css/A90.css" type="text/css" media="screen" rel="stylesheet" />
    <link href="_css/style_container.css" type="text/css" media="screen" rel="stylesheet" />

</head>
<body>
<div class="topoInicial <?php echo $cor_principal; ?>">
    <div class="content">
        <div class="cf logo"><a href="index.php"> <?php echo $nome_site; ?></a></div>
        <div class="cf loginInicial">
	        <form method="post" action="validaUsuario.php" class="formDefault">
	            Usuário <input type="text" name="usuario" maxlength="50" />
	            Senha <input type="password" name="senha" maxlength="50" />
	            <input type="submit" value="  Entrar  " />
	        </form>
        </div>
    </div>
	<div  class="menuTopo <?php echo $cor_secundaria; ?>">
	    <ul class="content nav">
			<li><a href="#" title="Home">Home</a></li>
			<li class="active"><a href="#" title="Perfil">Empresa</a></li>
			<li><a href="#" title="Interesses">Galeria</a></li>
			<li><a href="contato.php" title="Contato">Contato</a></li>
		</ul>
	</div>
</div>
<div class="content">
    <div class="container">
		<div class="middle">
