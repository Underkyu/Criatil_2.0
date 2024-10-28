<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criatil Gerentes</title>
    <link rel="stylesheet" href="../css/cadastrogerente.css">
    <script src="../js/cadastro.js"></script>
</head>
<body>
<?php include("headerGrnt.php")?>
<!-- essa página tá finalizada mas por ser diferente das outras páginas de gerente não vou usar ela pra muita coisa por agora --> 
    <form class="form-login" method="POST" action="../controller/cadastroProcess.php">
    <h1>Cadastrar Gerente</h1>
            <div class="inputgrupo">
                <input type="text"  id="nome" name="Nome_Usu" placeholder="Nome completo" class="input-login">
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
            
                <input type="hidden" name="Imagem" value="../imagens/Conta/usuario.png">
                <input type="hidden" id="tipo" name="Tipo_Usu" placeholder="Carregando.." class="input-login" value="Gerente">
                <input type="hidden" name="Tipo" value="Cadastro">

                <button type="submit" class="botao-entrar">Cadastrar</button>
    </form>
</body>
</html>