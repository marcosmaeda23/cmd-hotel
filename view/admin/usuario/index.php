<?php
//buscar usuario
session_start();
if ($_SESSION['NIVEL'] <> 4) {
	header('location: cadastrarUsuario.php');
	//header('Location: http://www.example.com/');
}
echo 'pagina principal, busca de usuarios<br>';

echo '<a href="cadastrarUsuario.php">cadastro</a>';






?>