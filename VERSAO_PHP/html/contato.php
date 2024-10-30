<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criatil - SAC</title>
    <link rel="stylesheet" href="../css/contatostyle.css">
</head>
<body>
    <?php include("header.php") ?>
    <div class="background"><!--Container para o background-->
        <div class="container"><!--Container de todo conteúdo-->

            <div class="form"><!--Container do formulário-->

            <form method="POST" action="../controller/sacProcess.php">
                <h1 class="contatoTitle">Entre em contato</h1>
                <a href="https://www.instagram.com/toys_criatil/" class="linkdozapkkkk">
                    <div class="zapbutton">
                        <img class="zapimg" src="../imagens/Logo/instagram.png">
                        <p>Instagram</p>
                    </div>
                </a>
                <br>
                <h1 class="contatoTitle">Nos mande uma mensagem</h1>
                <input class="formInput" type="text" name="nome" placeholder="Nome" required>
                <input class="formInput" type="email" name="email" placeholder="Email" required>
                <textarea class="formInput" rows="12" name="mensagem" placeholder="Mensagem" required></textarea>
                <br>
                <button type="submit" class="btn-submit">Enviar</button>
            </form>

            </div>

            <div class="logo"><!--Container da logo-->
                <img class="imglogo" src="../imagens/Header/LogoBrancaCriatilVetor.svg">
            </div>

        </div>
    </div>     
</body>
</html>