<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/cadastro.js"></script>
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Criatil - Login</title>
</head>
<body>
<?php include("../html/header.php")?>
        <div class="loginzinho">
        <img src="../imagens/Logo/criatillogo2.png">

            <form class="form-login" method="POST" action="../controller/cadastroProcess.php">
                <div class="input-container">
                   <input type="email" id="email" name="Email_Usu" placeholder="E-mail" class="input-login" required>
                </div>       
                
                <div class="input-container">
                    <input type="password" id="senha" name="Senha_Usu" placeholder="Senha" class="input-login" required>
                    <i class="bi bi-eye" id="botao-senha" onclick="mostrarSenha('senha', 'botao-senha')"></i>
                </div>

                <input type="hidden" name="Tipo" value="Login">

                  <button type="submit" class="botao-entrar">Entrar</button>
                  <a href="cadastro.php" class="login">Não tem uma conta?</a>

            </form>
        </div>
</body>
</html>