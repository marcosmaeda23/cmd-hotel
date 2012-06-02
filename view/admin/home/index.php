<?php
session_start();
var_dump($_SESSION);

if (empty($_SESSION['NOME'])) {
    echo '<script language="JavaScript">' .
    'alert("Realize seu Login");' .
    'location.href="../";' .
    '</script>';
}
?>