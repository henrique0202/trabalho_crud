<?php
include('conexao.php');
include("protect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $capacidade = $_POST['capacidade'];
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;

    $sql = "INSERT INTO mesas (numero, capacidade, disponivel) VALUES (:numero, :capacidade, :disponivel)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'numero' => $numero,
        'capacidade' => $capacidade,
        'disponivel' => $disponivel
    ]);

    header("Location: mesas_listar.php");
    exit;
}
?>

<h2>Cadastrar Nova Mesa</h2>
<form method="post">
    Número: <input type="number" name="numero" required><br><br>
    Capacidade: <input type="number" name="capacidade" required><br><br>
    Disponível? <input type="checkbox" name="disponivel" checked><br><br>
    <button type="submit">Salvar</button>
</form>
