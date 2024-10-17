<?php 
require_once("../php/controller/global.php");
require_once("../php/controller/conexao.php");
require_once("../php/models/message.php");

$message = new Message($BASE_URL);
$flashMessage = $message->getMessage();

if(!empty($flashMessage["msg"])){
    $message->clearMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- fonte roboto -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> <!-- css do bootstrap para ícone de mostrar senha -->
    <script src="../js/cadastro.js"></script>
    <link rel="stylesheet" href="../css/cadastro.css"> <!-- css do cadastro -->
    <title>Criatil - Cadastro</title>
</head>
<body>
    <?php include("../html/header.php")?>

    <div class="cadastrinho">
        <img src="../imagens/Logo/criatillogo2.png">


            <form class="form-login" method="POST" action="/Criatil_2.0/VERSÃO_PHP/php/controller/process/cadastroProcess.php">
           
            <div class="input-container">
                <input type="text"  id="nome" name="Nome_Usu" placeholder="Nome completo" class="input-login">
                </div>

                <div class="input-container">  
                <input type="date" id="nascimento" name="Nasc_Usu" placeholder="Data de nascimento" class="input-login" required>
                </div>

                <div class="input-container">
                <input type="email" id="email" name="Email_Usu" placeholder="E-mail" class="input-login" required>
                </div>
                
                <div class="input-container">
                    <input type="password" id="senha" name="Senha_Usu" placeholder="Senha" class="input-login" required>
                    <i class="bi bi-eye" id="botao-senha" onclick="mostrarSenha('senha', 'botao-senha')"></i>
                </div>

                <div class="input-container">
                    <input type="password" id="cof_senha" name="Senha_Usu_Confirm" placeholder="Confirmar senha" class="input-login" required>
                    <i class="bi bi-eye" id="botao-conf-senha" onclick="mostrarSenha('cof_senha', 'botao-conf-senha')"></i>
                </div>

                <div class="input-container">
                <input type="text" id="celular" name="Celular_Usu" placeholder="Digite o celular (opcional)" class="input-login">
                </div>

                <input type="hidden" id="tipo" name="Tipo_Usu" placeholder="Carregando.." class="input-login" value="Cliente" required>

                <input type="hidden" class="form-control" name="crud" value="INSERT">
                <button type="submit" class="botao-entrar">Cadastrar</button>
            </form>
        </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--  php da mensagem; se a mensagem não estiver vazia, ela é inserida na página  -->
<?php if (!empty($flashMessage["msg"])): ?>
            <script>

            Swal.fire({
                icon: "<?= $flashMessage['type'] ?>",
                title: "<?= $flashMessage['titulo'] ?>", // coloca a mensagem do php no título
                text: "<?= $flashMessage['msg'] ?>",
                toast: true
            });
            </script>      
<?php endif; ?>