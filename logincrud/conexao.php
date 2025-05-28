<?php
    $dbhost = "localhost";
    $usuario = "root";
    $senha = "";
    $namedb = "restaurantes";
    
    $mysqli = new mysqli($dbhost, $usuario, $senha, $namedb);
    if($mysqli->error) {
        die("falha ao conectar ao banco de dados: " . $mysql->error);
    }
?>
