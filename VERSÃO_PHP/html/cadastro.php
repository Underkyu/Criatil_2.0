<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/cadastro.css">
    <script src="../js/cadastro.js" defer></script>
    <title>Criatil - Cadastro</title>
</head>
<body>
        <div class="cadastrinho">
            <img src="../imagens/Logo/criatillogo2.png"></img>
            <form class="form-login" method="POST" action="/Criatil_2.0/VERSÃO_PHP/php/controller/usuarioController.php?acao=inserir">
                <input type="text"  id="nome" name="Nome_Usu" placeholder="Nome completo" class="input-login" required>
              
                <input type="date" id="nascimento" name="Nasc_Usu" placeholder="Data de nascimento" class="input-login" required>

                <input type="email" id="email" name="Email_Usu" placeholder="E-mail" class="input-login" required>

                <input type="password" id="senha" name="Senha_Usu" placeholder="Senha" class="input-login" required>

                <input type="text" id="celular" name="Celular_Usu" placeholder="Digite o celular (opcional)" class="input-login">

                <input type="hidden" id="tipo" name="Tipo_Usu" placeholder="Carregando.." class="input-login" value="Cliente" required>

                <input type="hidden" class="form-control" name="crud" value="INSERT">
                <button type="submit" class="botao-entrar">Cadastrar</button>
            </form>
        </div>
</body>
</html>