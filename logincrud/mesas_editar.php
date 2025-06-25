<?php
include('conexao.php');

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
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;

    $sql = "UPDATE mesas SET numero = :numero, capacidade = :capacidade, disponivel = :disponivel WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'numero' => $numero,
        'capacidade' => $capacidade,
        'disponivel' => $disponivel,
        'id' => $id
    ]);

    header("Location: mesas_listar.php");
    exit;
}
?>

<h2>Editar Mesa</h2>
<form method="post">
    Número: <input type="number" name="numero" value="<?= $mesa['numero'] ?>" required><br><br>
    Capacidade: <input type="number" name="capacidade" value="<?= $mesa['capacidade'] ?>" required><br><br>
    Disponível? <input type="checkbox" name="disponivel" <?= $mesa['disponivel'] ? 'checked' : '' ?>><br><br>
    <button type="submit">Atualizar</button>
</form>
