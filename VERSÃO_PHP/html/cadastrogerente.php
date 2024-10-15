<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/Criatil_2.0/VERSÃO_PHP/php/models/message.php";

$message = new Message("http://" . $_SERVER['HTTP_HOST'] . "/Criatil_2.0/VERSÃO_PHP/");
$flashMessage = $message->getMessage();

$message->clearMessage();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criatil Gerentes</title>
    <link rel="stylesheet" href="../css/cadastrogerente.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/cadastro.js"></script>
</head>
<body>
    <form class="form-login" method="POST" action="/Criatil_2.0/VERSÃO_PHP/php/controller/usuarioController.php?acao=inserir" onsubmit="return validarSenhas()">
    <h1>Cadastrar Gerente</h1>
    <?php if (!empty($flashMessage["msg"])): ?>
            <script>
            Swal.fire({
                toast: true,
                target: 'loginzinho',
                allowOutsideClick: false,
                allowEscapeKey: false,
                position: "center",
                icon: "success",
                title: "<?= $flashMessage['msg'] ?>", // coloca a mensagem do php no título
                showConfirmButton: false,
            });
                    // redireciona depois de esperar 3 segundos (medido em milissegundos)
                    setTimeout(function() {
                        window.location.href = "http://<?= $_SERVER['HTTP_HOST'] ?>/Criatil_2.0/VERSÃO_PHP/";
                    }, 2000);
                </script>
        <?php endif; ?>
            <div class="inputgrupo">
                <input type="text"  id="nome" name="Nome_Usu" placeholder="Nome completo" class="input-login" required>
                <input type="email" id="email" name="Email_Usu" placeholder="E-mail" class="input-login" required>
            </div>
            <div class="inputgrupo">
                <input type="text" id="celular" name="Celular_Usu" placeholder="Digite o celular" class="input-login">
                <input type="date" id="nascimento" name="Nasc_Usu" placeholder="Data de nascimento" class="input-login" required>
            </div>
            <div class="inputgrupo">
                <input type="text" id="senha" name="Senha_Usu" placeholder="Senha" class="input-login" required>
                <input type="text" id="cof_senha" placeholder="Confirmar senha" class="input-login" required>
                <!-- por ser algo que vai ser visto somente por administradores do sistema,
                     não achei necessário ocultar os campos de senha -->
            </div>
            
                <input type="hidden" id="tipo" name="Tipo_Usu" placeholder="Carregando.." class="input-login" value="Gerente" required>
                <input type="hidden" class="form-control" name="crud" value="INSERT">

                <button type="submit" class="botao-entrar">Cadastrar</button>
    </form>
</body>
</html>