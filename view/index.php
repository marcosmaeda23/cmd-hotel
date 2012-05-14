<?php 


if(!empty($_SESSION['usuario_nome'])){
	echo '<script language="JavaScript">';
	echo 'alert("Bem vindo");';
	echo 'location.href="galeria.php";';
	echo '</script>';
} else {
	header('location:login/');
}
?>