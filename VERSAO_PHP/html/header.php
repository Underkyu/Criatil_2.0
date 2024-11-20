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
if($usuarioData){
if($usuarioData->getTipo() == 'Bloqueado'){
    $message->setMessage("Conta Bloqueada!","Sua conta foi bloqueada, entre em contato para mais detalhes","error","../html/principal.php");
}}  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="../css/header.css">
    <script src="../js/menuSanduiche.js" defer></script>
</head>

<body>
    <div class="corpo">
        <div id="fundoHeader">
            <div class="header">
                <div class="header_normal">
                <a href="principal.php">
                    <img src="../imagens/Header/LogoBranca.png" alt="Logo da Criatil na cor branca" class="Logo_header">
                </a>
                <form method="POST" action="../controller/produtoProcess.php">
                <input type="text" class="pesquisa" name="Nome_Brinq" placeholder="Buscar na Criatil">  <!--Barra de pesquisa-->
                <input type="hidden" name="Tipo" value="Pesquisa"> <!-- Input pra definir o tipo (pesquisa de nome de produto) -->
                </form>
                <div class="links_normais">
                <a href="catalogo.php">
                <div class="link_headerHeader">
                    <img src="../imagens/Header/produtos.png" alt="Catalogo icon" class="link_headerHeader"> <!--Icon da parte de explorar catalogo-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno">Explorar</p>
                        <p class="pequeno negrito">Catálogo</p>
                    </div>
                </div>
                </a>

                <a href="carrinho.php">
                <div class="link_headerHeader">
                    <img src="../imagens/Header/carrinho.png" alt="Carrinho icon" class="link_headerHeader"> <!--Icon do carrinho-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno">Meu</p>
                        <p class="pequeno  negrito">Carrinho</p>
                    </div>
                </div>
                </a>

                <?php if($usuarioData): ?>
                    <a href="conta.php">
                    <div class="link_headerHeader">
                    <img src=<?php
                        if($usuarioData->getImagem() == "vazio") {;
                            print_r("../imagens/usuarios/usuario.png"); 
                            
                        }else{
                            print_r("../imagens/usuarios/".$usuarioData->getImagem().".jpeg");
                        }?> alt="" class="foto_perfil_header"> <!--Foto do perfil-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Minha Conta</p>
                    </div>
                </div>
                </a>
                <?php else: ?>
                    
                    <div class="link_headerHeader">
                    <img src="../imagens/Header/perfil.png" alt="Perfil icon" class="link_headerHeader"> <!--Icon do perfil-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno">Realizar</p>
                        <p class="pequeno negrito"> <a href="login.php" class="login-a">Login</a> <span class="pequenospan">ou</span> <a href="cadastro.php" class="login-a">Cadastro</a> </p>
                    </div>
                </div>
                <?php endif; ?>

                </div>

                <!--Responsividade-->

                <!--Botão para abrir o menu sanduiche-->
                <button class="menuSanduicheHeader" onclick="block()">
                    <img src="../imagens/Header/sanduiche.png" alt="Menu Sanduiche" class="menuSanduicheHeader">
                </button>
                </div>


                <!--Div do menu sanduiche e so aparece no celular-->
                <div class="menuSanduicheHeader" id="menuSanduicheHeader">
                    <div class="link_headerHeader link_sanduicheHeader">
                        <img src="../imagens/Header/produtos.png" alt="Catalogo icon" class="link_headerHeader" id="menuSanduicheHeader"> <!--Icon da parte de explorar catalogo-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno">Explorar</p>
                            <p class="pequeno  negrito">Catálogo</p>
                        </div>
                    </div>

                    <div class="link_headerHeader link_sanduicheHeader">
                        <img src="../imagens/Header/carrinho.png" alt="Carrinho icon" class="link_headerHeader"> <!--Icon do carrinho-->
                        <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                            <p class="pequeno">Meu</p>
                            <p class="pequeno  negrito">Carrinho</p>
                        </div>
                    </div>
                    
                    <?php if($usuarioData): ?>
                    <a href="conta.php">
                    <div class="link_headerHeader">
                    <img src=<?php
                        if($usuarioData->getImagem() == "vazio") {;
                            print_r("../imagens/usuarios/usuario.png"); 
                            
                        }else{
                            print_r("../imagens/usuarios/".$usuarioData->getImagem().".jpeg");
                        }?> alt="" class="foto_perfil_header"> <!--Foto do perfil-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno  negrito">Minha Conta</p>
                    </div>
                </div>
                </a>
                <?php else: ?>
                    <a href="cadastro.php">
                    <div class="link_headerHeader">
                    <img src="../imagens/Header/perfil.png" alt="Perfil icon" class="link_headerHeader"> <!--Icon do perfil-->
                    <div class="textos_pequenos"> <!--Div para conter os textos que ficam ao lado do icon-->
                        <p class="pequeno">Realizar</p>
                        <p class="pequeno negrito">Login <span class="pequenospan">ou</span> Cadastro</p>
                    </div>
                </div>
                </a>
                <?php endif; ?>
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