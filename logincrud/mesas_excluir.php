<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM mesas WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
}

header("Location: mesas_listar.php");
exit;
