<?php
include('conexao.php');
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

    if (empty($nome) || empty($email) || empty($senha) || empty($telefone)) {
        $mensagem = 'preencha nome,email e senha obrigatoriamente';
    } else {
        $verifica = $pdo->prepare("SELECT id FROM clientes WHERE email = :email");
        $verifica->execute(['email' => $email ]);

        if ($verifica->rowCount() > 0) {
            $mensagem = "este email está cadastrado. faça login.";
        } else {
            $inserir = $pdo->prepare("INSERT INTO clientes (nome, telefone, email, senha) VALUES(:nome, :telefone, :email, :senha)");
            $inserir->execute([
                'nome' => $nome,
                'telefone' => $telefone,
                'email' => $email,
                'senha' => $senha
            ]);

            $mensagem = "<div> cadastro realizado com sucesso! <a href='login.php'>Fazer login</a></div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="login">
        <form action="" method="post" class="login">
            <img src="logo2.png" alt="" width="300px">
            <?php if(!empty($mensagem)) { echo $mensagem; } ?>
            <label>Nome completo:</label>
            <input type="text" class="input" name="nome" required>
            <br><br>
            <label>Email:</label>
            <input type="text" class="input" name="email" required>
            <br><br>
            <label>Senha:</label>
            <input type="password" class="input" name="senha" required>
            <br><br>
            <label>telefone:</label>
            <input type="tel" class="input" name="telefone">
            <br><br>
            <button class="botao2" type="submit">CADASTRAR-SE</button>
            <br><br>
            <a href="login.php">Já tenho conta. fazer login</a>
        </form>
    </div>

</body>

</html>