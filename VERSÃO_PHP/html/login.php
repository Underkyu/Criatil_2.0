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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/cadastro.js"></script>
    <title>Criatil - Login</title>
</head>
<body>
        <div class="loginzinho">
        <img src="../imagens/Logo/criatillogo2.png">
        
<!--  php da mensagem; se a mensagem não estiver vazia, ela é inserida na página  -->
<?php if (!empty($flashMessage["msg"])): ?>
            <script>
            Swal.fire({
                toast: true,
                target: 'loginzinho',
                allowOutsideClick: false,
                allowEscapeKey: false,
                position: "top",
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

            <form class="form-login" method="POST" action="/Criatil_2.0/VERSÃO_PHP/php/controller/usuarioController.php">
                <div class="input-container">
                   <input type="email" id="email" name="Email_Usu" placeholder="E-mail" class="input-login" required>
                </div>       
                
                <div class="input-container">
                    <input type="password" id="senha" name="Senha_Usu" placeholder="Senha" class="input-login" required>
                    <i class="bi bi-eye" id="botao-senha" onclick="mostrarSenha('senha', 'botao-senha')"></i>
                </div>

                  <input type="hidden" class="form-control" name="crud" value="SELECT">
                  <button type="submit" class="botao-entrar">Entrar</button>
                <a href="cadastro.php" class="botao-cadastrar">Criar uma conta</a>
            </form>
        </div>
</body>
</html>