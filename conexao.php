<?php
    $dbhost = "localhost";
    $usuario = "root";
    $senha = "";
    $namedb = "restaurantes";
try {   
    $pdo = new PDO("mysql:host=$dbhost;dbname=$namedb;charset=utf8", $usuario, $senha);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    die("falha ao conectar ao banco de dados:" . $e->getMessage());
}
?>
