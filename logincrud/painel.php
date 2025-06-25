<?php
include("protect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    bem vindo ao painel, <?php echo $_SESSION['nome']; ?>
<div class="sidebar">
        <h2 class="logo">Mesajá</h2>
        <nav>
            <ul>
                <li><a href="mesas_listar.php"> Mesas</a></li>
                <li><a href=""> Reservas</a></li>
                <li><a href="listar.php"> Perfil</a></li>
                <li><a href="mesas_cadastrar.php"> Cadastrar mesa</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="logout">Sair</a>
    </div>
</body>
</html>
