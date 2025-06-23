<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
</head>
<body>
    <h2 style="text-align:center;">Lista de Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Nome</th><th>Telefone</th><th>Email</th><th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $pdo->query("SELECT * FROM clientes ORDER BY id DESC");
        while ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>{$cliente['id']}</td>
                <td>{$cliente['nome']}</td>
                <td>{$cliente['telefone']}</td>
                <td>{$cliente['email']}</td>
                <td>
                    <a href='editar.php?id={$cliente['id']}'>Editar</a>
                    <a href='excluir.php?id={$cliente['id']}' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
    <p style="text-align:center;"><a href="cadastro.php">Cadastrar novo cliente</a></p>
</body>
</html>
