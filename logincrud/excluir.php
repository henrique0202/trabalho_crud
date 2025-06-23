<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Excluir cliente
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
    $stmt->execute(['id' => $id]);

    header("Location: listar.php");
    exit;
} else {
    echo "ID não informado.";
}
