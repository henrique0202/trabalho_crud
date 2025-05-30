<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {
    if(strlen($_POST['email']) == 0) {
        echo "preencha seu email";
    } else if (strlen($_POST['senha']) == 0) {
        echo "preencha sua senha";
    } else{

        $Email = $_POST['email'];
        $Senha = $_POST['senha'];

        $sql = "SELECT * FROM clientes WHERE email = :email AND senha = :senha";
        $stmt =$pdo->prepare($sql);
        $stmt->execute(['email' => $Email, 'senha' => $Senha]);
        $quantidade = $stmt->rowCount();

        if ($quantidade == 1) {

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "<div class = 'exibir'>email ou senha incorretos. verifique novamente.</div>";
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
            <img src="logo2.png" alt="" width="300px" >
            <h1>LOGIN</h1>
            <label>Email:</label>
            <input type="text" class="input" name = "email">
            <br><br>
            <label>Senha:</label>
            <input type="password"  class="input" name = "senha">
            <br><br>
            <button class="botao" type="submit">ENTRAR</button>
            <br>
            <button class="botao2">CADASTRAR-SE</button>
        </form>
    </div>
    
</body>
</html>