<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <title>Criatil - Login</title>
</head>
<body>
        <div class="loginn">
        <img src="../imagens/Logo/criatillogo2.png">
            <form class="form-login" method="POST" action="/Criatil_2.0/VERSÃO_PHP/php/controller/usuarioController.php?acao=inserir">

                <input type="email" id="email" name="Email_Usu" placeholder="E-mail" class="input-login" required>
              
                <input type="password" id="senha" name="Senha_Usu" placeholder="Senha" class="input-login" required>
              
                <input type="hidden" class="form-control" name="crud" value="SELECT">
                <button type="submit" class="botao-entrar">Entrar</button>

                <a href="cadastro.php" class="botao-cadastrar">Criar uma conta</a>
            </form>
        </div>
</body>
</html>