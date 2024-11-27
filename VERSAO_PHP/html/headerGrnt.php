<?php 
require_once("../controller/global.php");
require_once("../controller/conexao.php");
require_once("../models/message.php");
require_once("../Dao/usuarioDAO.php");
require_once("../Dao/produtoDAO.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$message = new Message($BASE_URL);
$flashMessage = $message->getMessage();

if(!empty($flashMessage["msg"])){
    $message->clearMessage();
}
$userDao = new UsuarioDAO($conn,$BASE_URL);

$usuarioData = $userDao->verificarToken(false);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Gerente</title>
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
                <a href="avaliacoesGrnt.php" class="linkk-header">
                    <img src="../imagens/Gerente/Avaliações.png" alt="Perfil icon" class="link_header"> <!--Icon do perfil-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Avaliações</p>
                    </div>
                    </a>
                </div>

                <div class="link_header">
                    <a href="brinquedosGrnt.php" class="linkk-header">
                        <img src="../imagens/Gerente/Brinquedos.png" alt="Catalogo icon" class="link_header"> <!--Icon da parte de explorar catalogo-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Brinquedos</p>
                        </div>
                    </a>
                </div>

                <div class="link_header">
                <a href="clientesGrnt.php" class="linkk-header">
                    <img src="../imagens/Gerente/Clientes.png" alt="Catalogo icon" class="link_header"> <!--Icon da parte de explorar catalogo-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Clientes</p>
                    </div>
                    </a>
                </div>

                <div class="link_header">
                <a href="selos&categoriasGrnt.php" class="linkk-header">
                    <img src="../imagens/Gerente/selos&cats.png" alt="Catalogo icon" class="link_header" id="link_cats"> <!--Icon da parte de explorar catalogo-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Categorias & Selos</p>
                    </div>
                    </a>
                </div>

                <div class="link_header">
                <a href="cadastrogerente.php" class="linkk-header">
                    <img src="../imagens/Gerente/CadastrarGerente.png" alt="Carrinho icon" class="link_header"> <!--Icon do carrinho-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Cadastrar Gerente</p>
                    </div>
                    </a>
                </div>
                </div>

                <a href="contaGrnt.php">
                    <div class="link_headerHeader">
                    <img src=<?php
                    if($usuarioData){
                        if($usuarioData->getImagem() == "vazio") {
                            print_r("../imagens/usuarios/usuario.png"); 
                        }else{
                            print_r("../imagens/usuarios/".$usuarioData->getImagem().".jpeg");
                        }
                    }else{
                        print_r("../imagens/usuarios/usuario.png"); 
                    }
                    ?> alt="" class="foto_perfil_header"> <!--Foto do perfil-->
                </div>
                </a>

                <!--Responsividade-->

                <!--Botão para abrir o menu sanduiche-->
                <button class="menuSanduiche" onclick="block()">
                    <img src="../imagens/Header/sanduiche.png" alt="Menu Sanduiche" class="menuSanduiche">
                </button>
                </div>


                <!--Div do menu sanduiche e so aparece no celular-->
                <div class="menuSanduiche" id="menuSanduiche">

                <div class="link_header link_sanduiche">
                    <a href="avaliacoesGrnt.php" class="linkk-header">
                        <img src="../imagens/Gerente/Avaliações.png" alt="Carrinho icon" class="link_header"> <!--Icon do carrinho-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Avaliações</p>
                        </div>
                        </a>
                    </div>
                    
                    <div class="link_header link_sanduiche">
                    <a href="brinquedosGrnt.php" class="linkk-header">
                        <img src="../imagens/Gerente/Brinquedos.png" alt="Catalogo icon" class="link_header" id="menuSanduiche"> <!--Icon da parte de explorar catalogo-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Brinquedos</p>
                        </div>
                        </a>
                    </div>
    
                    <div class="link_header link_sanduiche">
                    <a href="clientesGrnt.php" class="linkk-header">
                        <img src="../imagens/Gerente/Clientes.png" alt="Perfil icon" class="link_header"> <!--Icon do perfil-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Clientes</p>
                        </div>
                        </a>
                    </div>
    


                    <div class="link_header">
                  <a href="selos&categoriasGrnt.php" class="linkk-header">
                    <img src="../imagens/Gerente/selos&cats.png" alt="Catalogo icon" class="link_header" id="link_cats"> <!--Icon da parte de explorar catalogo-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Categorias & Selos</p>
                    </div>
                    </a>
                </div>

                    <div class="link_header link_sanduiche">
                    <a href="cadastrogerente.php" class="linkk-header">
                        <img src="../imagens/Gerente/CadastrarGerente.png" alt="Catalogo icon" class="link_header" id="menuSanduiche"> <!--Icon da parte de explorar catalogo-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Cadastrar Gerente</p>
                        </div>
                        </a>
                    </div>

                    <div class="link_header link_sanduiche">
                    <a href="contaGrnt.php" class="linkk-header">
                        <img src="../imagens/Gerente/FotoGerente.webp" alt="Carrinho icon" class="link_header perfil"> <!--Icon do carrinho-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno  negrito">Perfil</p>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
</body>
</html>
<!--Parte que checa se o há alguma variavel de sessão de mensagem e se sim exibe uma mensagem-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--  php da mensagem; se a mensagem não estiver vazia, ela é inserida na página  -->
<?php if (!empty($flashMessage["msg"])): ?>
            <script>

            Swal.fire({
                icon: "<?= $flashMessage['type'] ?>", //Pega o tipo da mensagem (ex: error)
                title: "<?= $flashMessage['titulo'] ?>", //Pega o titulo da mensagem
                text: "<?= $flashMessage['msg'] ?>", //Pega a mensagem
                toast: true //Variavel que serve para indicar que o card de mensagem não deve alterar o posicionamento do resto
            });
            </script>      
<?php endif; ?>