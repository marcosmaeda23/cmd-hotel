<?php
session_start();
if (empty($_SESSION['usuario_nome'])) {
    session_start();
    echo '<script language="JavaScript">' .
    'alert("Realize seu Login");' .
    'location.href="../";' .
    '</script>';
}

var_dump($_SESSION);
?>
<a href=""
Sair
