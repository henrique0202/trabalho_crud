<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <form action="" method="post" class="login">
            <img src="logo2.png" alt="" width="300px" >
            <?php if(!empty($mensagem)) { echo $mensagem; } ?>
            <h1><Cadastre-se></Cadastre-se></h1>
            <label>Email:</label>
            <input type="text" class="input" name = "email">
            <br><br>
            <label>Senha:</label>
            <input type="password"  class="input" name = "senha">
            <br><br>
            <button class="botao2">CADASTRAR-SE</button>
        </form>
    </div>
    
</body>
</html>