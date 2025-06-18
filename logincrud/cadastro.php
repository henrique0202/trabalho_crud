<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

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
            <img src="logo2.png" alt="" width="300px" >
            <label>Nome completo:</label>
            <input type="text" class="input" name= "nome">
            <br><br>
            <label>Email:</label>
            <input type="text" class="input" name = "email">
            <br><br>
            <label>Senha:</label>
            <input type="password"  class="input" name = "senha">
            <br><br>
            <label>telefone:</label>
            <input type="tel" class="input" name = "telefone">
            <br><br>
            <button class="botao2">CADASTRAR-SE</button>
        </form>
    </div>
    
</body>
</html>