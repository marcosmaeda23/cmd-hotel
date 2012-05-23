<?php
session_start();
if (empty($_SESSION['NOME'])) {
    session_start();
    echo '<script language="JavaScript">' .
    'alert("Realize seu Login");' .
    'location.href="../";' .
    '</script>';
}
?>
