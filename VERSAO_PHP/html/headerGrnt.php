<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/headerGrnt.css">
    <script src="../js/menuSanduiche.js" defer></script>
</head>

<body>
    <div class="corpo">
        <div class="container">
            <div class="header">
                <div class="header_normal">
                <img src="../imagens/Header/LogoBranca.png" alt="Logo da Criatil na cor branca" class="Logo_header"> <!--Logo-->
                
                

                <div class="links_normais">
                <div class="link_header">
                    <img src="../imagens/Gerente/Brinquedos.png" alt="Catalogo icon" class="link_header"> <!--Icon da parte de explorar catalogo-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Brinquedos</p>
                    </div>
                </div>

                <div class="link_header">
                    <img src="../imagens/Gerente/Clientes.png" alt="Catalogo icon" class="link_header"> <!--Icon da parte de explorar catalogo-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Clientes</p>
                    </div>
                </div>

                <div class="link_header">
                    <img src="../imagens/Gerente/Avaliações.png" alt="Perfil icon" class="link_header"> <!--Icon do perfil-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Avaliações</p>
                    </div>
                </div>

                <div class="link_header">
                    <img src="../imagens/Gerente/CadastrarGerente.png" alt="Carrinho icon" class="link_header"> <!--Icon do carrinho-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Cadastrar Gerente</p>
                    </div>
                </div>
                </div>

                <img src="../imagens/Gerente/FotoGerente.webp" alt="Foto genrente" class="foto_gerente">
               

                <!--Responsividade-->

                <!--Botão para abrir o menu sanduiche-->
                <button class="menuSanduiche" onclick="block()">
                    <img src="../imagens/Header/sanduiche.png" alt="Menu Sanduiche" class="menuSanduiche">
                </button>
                </div>


                <!--Div do menu sanduiche e so aparece no celular-->
                <div class="menuSanduiche" id="menuSanduiche">
                    <div class="link_header link_sanduiche">
                        <img src="../imagens/Gerente/Brinquedos.png" alt="Catalogo icon" class="link_header" id="menuSanduiche"> <!--Icon da parte de explorar catalogo-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Brinquedos</p>
                        </div>
                    </div>
    
                    <div class="link_header link_sanduiche">
                        <img src="../imagens/Gerente/Clientes.png" alt="Perfil icon" class="link_header"> <!--Icon do perfil-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Clientes</p>
                        </div>
                    </div>
    
                    <div class="link_header link_sanduiche">
                        <img src="../imagens/Gerente/Avaliações.png" alt="Carrinho icon" class="link_header"> <!--Icon do carrinho-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Avaliações</p>
                        </div>
                    </div>

                    <div class="link_header link_sanduiche">
                        <img src="../imagens/Gerente/CadastrarGerente.png" alt="Catalogo icon" class="link_header" id="menuSanduiche"> <!--Icon da parte de explorar catalogo-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Cadastrar Gerente</p>
                        </div>
                    </div>

                    <div class="link_header link_sanduiche">
                        <img src="../imagens/Gerente/FotoGerente.webp" alt="Carrinho icon" class="link_header perfil"> <!--Icon do carrinho-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Perfil</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>