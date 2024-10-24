<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entre em contato</title><!--Página de contato-->
    <link rel="stylesheet" href="../css/contatostyle.css">
</head>

<body>
    <div class="background"><!--Container para o background-->
        <div class="container"><!--Container de todo conteúdo-->

            <div class="form"><!--Container do formulário-->

                <form>
                    <h1 class="contatoTitle">Entre em contato</h1><!--Título do formulário-->
                    <br>

                    <div class="zapbutton"><!--Botão do Whatsapp-->
                        <img class="zapimg" src="https://logodownload.org/wp-content/uploads/2015/04/whatsapp-logo-1.png">
                        <p>Whatsapp</p>
                    </div>

                    <input class="formInput" type="text" name="nome" id="nome" placeholder="Nome" required><!--Entrada do nome-->
                    <input class="formInput" type="text" name="email" id="email" placeholder="Email" required><!--Título do Email-->
                    <textarea class="formInput" rows="15" name="contato" form="sac-form" placeholder="Mensagem" required></textarea><!--Área de texto-->
                    <br>
                    <button type="submit" class="btn-submit">Enviar</button><!--Botão de submit-->
                </form>

            </div>

            <div class="logo"><!--Container da logo-->
                <img class="imglogo" src="../imagens/Header/LogoBrancaCriatilVetor.svg">
            </div>

        </div>
    </div>     
</body>
</html>