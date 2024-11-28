<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Criatil Gerentes</title>
    <link rel="stylesheet" href="../css/cadastrogerente.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="../js/cadastro.js"></script>
</head>
<body>
<?php include("headerGrnt.php")?>
<!-- essa página tá finalizada mas por ser diferente das outras páginas de gerente não vou usar ela pra muita coisa por agora --> 
    <form class="form-login" method="POST" action="../controller/cadastroProcess.php">
    <h1>Cadastrar Gerente</h1>
            <div class="inputgrupo">
                <input type="text"  id="nome" name="Nome_Usu" placeholder="Nome e sobrenome" class="input-login">
                <input type="email" id="email" name="Email_Usu" placeholder="E-mail" class="input-login">
            </div>
            <div class="inputgrupo">
                <input type="text" id="celular" name="Celular_Usu" placeholder="Digite o celular" class="input-login">
                <input type="date" id="nascimento" name="Nasc_Usu" placeholder="Data de nascimento" class="input-login">
            </div>
            <div class="inputgrupo">
                <input type="text" id="senha" name="Senha_Usu" placeholder="Senha" class="input-login">
                <input type="text" id="cof_senha" name="Senha_Usu_Confirm" placeholder="Confirmar senha" class="input-login">
                <!-- por ser algo que vai ser visto somente por administradores do sistema,
                     não achei necessário ocultar os campos de senha -->
            </div>
            
                <input type="hidden" name="Imagem" value="vazio">
                <input type="hidden" id="tipo" name="Tipo_Usu" placeholder="Carregando.." class="input-login" value="Gerente">
                <input type="hidden" name="Tipo" value="CadastroG">

                <button type="submit" class="botao-entrar">Cadastrar</button>
    </form>
    <?php include("footerGrnt.php"); ?>
</body>
</html>