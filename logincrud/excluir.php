<?php
include('conexao.php');
include("protect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
    $stmt->execute(['id' => $id]);

    header("Location: listar.php");
    exit;
} else {
    echo "ID não informado.";
}
