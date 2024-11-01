<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Detalhes do cliente</title>
    <link rel="stylesheet" href="../css/detalhesCli.css">
</head>
<body>
<?php include("header.php") ?>
    <div class="container">
        <div class="conteudo"><!--Div com todo o conteudo da página-->
            <h1 class="titulo">Detalhes do Cliente</h1><!--Titulo da página-->
            <div class="detalhes"><!--Div com as informações e foto do cliente-->
                <img src="../imagens/Avaliacoes/gumi_perfil.jpeg" alt="Foto do Cliente" class="foto_cliente"> <!---Foto do cliente-->
                
                <form action="" method="post">
                <div class="inputs"><!--Div que contem todos os inputs-->
                <div class="coluna"> <!--Div que contem uma das duas colunas de input-->
                    <h5 class="titulo">Nome</h5>
                    <input type="text" class="informacao" value="Gumi"> <!--Input com o nome do cliente-->

                    <h5 class="titulo">Telefone</h5>
                    <input type="text" class="informacao" value="(11)99999-9999"> <!--Input com o telefone do cliente-->

                    <h5 class="titulo">Senha</h5>
                    <input type="text" class="informacao" value="uAr3K1ng"> <!--Input com a senha do cliente-->
                </div>

                <div class="coluna2"> <!--Div que contem uma das duas colunas de input-->
                    <h5 class="titulo">Email</h5>
                    <input type="text" class="informacao" value="copycat63@gmail.com"><!--Input com o email do cliente-->

                    <h5 class="titulo">Nascimento</h5>
                    <input type="date" class="informacao" value="1999-11-11"><!--Input com a data de nascimento do cliente-->

                    <h5 class="titulo">Tipo cliente</h5>
                    <select name="" id="" class="informacao"><!--Select com o tipo de cliente e no qual o garente irá mudar para bloqueado para bloquear o acesso da conta ao site-->
                        <option value="ativo">Ativo</option>
                        <option value="bloqueado">Bloqueado</option>
                    </select>
                </div>
            </div>
            </div>
            <div class="botao"> <!--Div que contem o botão de atualizar cliente-->
                <button class="atualizar">Adicionar brinquedo <img src="../imagens/Gerente/Atualizar.png" alt="Atualizar" class="atualizar"></button> <!--Botão de adicionar cliente-->
            </div>
        </form>
        </div>
    </div>
<?php include("footer.php") ?>
</body>
</html>