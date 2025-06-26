<?php
include('conexao.php');
include("protect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $capacidade = $_POST['capacidade'];
    $disponibilidade = isset($_POST['disponibilidade']) ? 1 : 0;

    $sql = "INSERT INTO mesas (numero, capacidade,disponibilidade) VALUES (:numero, :capacidade, :disponibilidade)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'numero' => $numero,
        'capacidade' => $capacidade,
        'disponibilidade' => $disponibilidade
    ]);

    header("Location: mesas_listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Mesa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h2>Cadastrar Nova Mesa</h2>
        <form method="post">
            <label>Número:</label><br>
            <input type="number" name="numero" required class="input"><br><br>

            <label>Capacidade:</label><br>
            <input type="number" name="capacidade" required class="input"><br><br>

            <label><input type="checkbox" name="disponibilidade" checked class="input"> Disponível</label><br><br>

            <button type="submit" class="botao">Salvar</button>
        </form>
        <br><a href="mesas_listar.php" class="link">Voltar para lista</a>
        <a href="painel.php" class="link">voltar para o painel</a>
    </div>
</body>
</html>
