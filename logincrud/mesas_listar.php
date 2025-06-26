<?php
include('conexao.php');
include("protect.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Mesas</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h2>Mesas Cadastradas</h2>
        <a href="mesas_cadastrar.php" class="link">+ Cadastrar nova mesa</a><br><br>

        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Capacidade</th>
                <th>Disponível?</th>
                <th>Ações</th>
            </tr>
            <?php
            $stmt = $pdo->query("SELECT * FROM mesas ORDER BY id DESC");
            while ($mesa = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>{$mesa['id']}</td>
                    <td>{$mesa['numero']}</td>
                    <td>{$mesa['capacidade']}</td>
                    <td>" . ($mesa['disponibilidade'] ? 'Sim' : 'Não') . "</td>
                    <td>
                        <a href='mesas_editar.php?id={$mesa['id']}'>Editar</a> |
                        <a href='mesas_excluir.php?id={$mesa['id']}' onclick='return confirm(\"Deseja realmente excluir esta mesa?\")'>Excluir</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
        <br>
         <a href="painel.php" class="link">voltar para o painel</a>
    </div>
</body>
</html>
