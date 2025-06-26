<?php
include('conexao.php');
include("protect.php");

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM mesas WHERE id = :id");
$stmt->execute(['id' => $id]);
$mesa = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$mesa) {
    die("Mesa não encontrada");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $capacidade = $_POST['capacidade'];
    $disponibilidade = isset($_POST['disponibilidade']) ? 1 : 0;

    $sql = "UPDATE mesas SET numero = :numero, capacidade = :capacidade, disponibilidade = :disponibilidade WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'numero' => $numero,
        'capacidade' => $capacidade,
        'disponibilidade' => $disponibilidade,
        'id' => $id
    ]);

    header("Location: mesas_listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Mesa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Editar Mesa</h2>
        <form method="post">
            <label>Número:</label><br>
            <input type="number" name="numero" value="<?= $mesa['numero'] ?>" required><br><br>

            <label>Capacidade:</label><br>
            <input type="number" name="capacidade" value="<?= $mesa['capacidade'] ?>" required><br><br>

            <label>Localização:</label><br>
            <input type="text" name="localizacao" value="<?= $mesa['localizacao'] ?>"><br><br>

            <label>Disponível:</label><br><br>
                <input type="checkbox" name="disponibilidade" <?= $mesa['disponibilidade'] ? 'checked' : '' ?>>

            <button type="submit">Atualizar</button>
        </form>
        <br><a href="mesas_listar.php">← Voltar para lista</a>
    </div>
</body>
</html>
