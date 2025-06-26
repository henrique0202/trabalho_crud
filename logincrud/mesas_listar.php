<?php
include('conexao.php');
include("protect.php");

?>

<h2>Mesas</h2>
<p><a href="mesas_cadastrar.php">+ Nova mesa</a></p>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Número</th>
        <th>Capacidade</th>
        <th>Disponível</th>
        <th>Ações</th>
    </tr>

<?php
$stmt = $pdo->query("SELECT * FROM mesas ORDER BY id DESC");
while ($mesa = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
        <td>{$mesa['id']}</td>
        <td>{$mesa['numero']}</td>
        <td>{$mesa['capacidade']}</td>
        <td>" . ($mesa['disponivel'] ? 'Sim' : 'Não') . "</td>
        <td>
            <a href='mesas_editar.php?id={$mesa['id']}'>Editar</a> | 
            <a href='mesas_excluir.php?id={$mesa['id']}' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>
        </td>
    </tr>";
}
?>
</table>
