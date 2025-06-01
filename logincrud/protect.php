<?php
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die ("você não pode acessar essa pagina porque não esta logado.<p><a href=\"login.php\">Entrar</a></p>");
}

?>
