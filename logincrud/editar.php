<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        die("Cliente não encontrado.");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = "UPDATE clientes SET nome = :nome, telefone = :telefone, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nome' => $nome,
        'telefone' => $telefone,
        'email' => $email,
        'id' => $id
    ]);

    echo "Atualizado com sucesso! <a href='listar.php'>Voltar à lista</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h2>Editar Cliente</h2>
    <form method="post">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $cliente['email'] ?>" required><br><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
