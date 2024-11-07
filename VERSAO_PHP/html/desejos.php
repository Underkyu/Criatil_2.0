<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- link da fonte pro css saber que fonte usar -->
    <link rel="stylesheet" href="../css/desejos.css">
    <script src="../js/menuSanduicheCONTA.js" defer></script>
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Criatil - Lista de desejos</title>
</head>

<?php include("header.php")?>

<body>
    <div class="container">
    <!-- página da conta -->
    <!-- 'navbar-conta' é a barra da esquerda com as páginas -->
        <div class="navbar-container" id="navbar-conta"> 
             <div class="lateral-conta">
                  <img class="img-lateral" src=<?php
                        if($usuarioData->getImagem() == "vazio") {;
                            print_r("../imagens/usuarios/usuario.png"); 
                            
                        }else{
                            print_r("../imagens/usuarios/".$usuarioData->getImagem().".jpeg");
                        }?>>
                  <h1 class="nome-lateral"><?php print_r($usuarioData->getNome());?></h1>
             </div>
             <div class="paginas">
                  <a href="./conta.php" class="paginas-navbar">Perfil</a>
                  <a href="./pedidos.php" class="paginas-navbar">Pedidos</a>
                  <a href="#" class="pagina-selecionada">Lista de Desejos</a>
                  <a href="" class="paginas-navbar" id="sair">Sair</a>
             </div>
        </div>
                 <!-- botão do menu sanduíche-->
                 <div class="sanduiche-div">
                    <button class="menuSanduiche" onclick="blockConta()">
                     <h1>Minha Conta </h1>
                       <img id="imagemSanduiche" src="../imagens/Icons/arrow2.png" alt="Menu Sanduiche" class="menuSanduiche">
                     </button>
               </div>
               <!-- fim do botão do menu sanduíche-->

             <!-- div do menu sanduíche -->
                    <div class="menuSanduicheConta" id="menuSanduicheConta">
                         <div class="link_header link_sanduiche">
                             <a href="./conta.php" class="paginas-navbar">Perfil</a>
                         </div>
         
                         <div class="link_header link_sanduiche">
                             <a href="./pedidos.php" class="paginas-navbar">Pedidos</a>
                         </div>
         
                       <div class="link_header link_sanduiche">
                         <a href="#" class="pagina-selecionada">Lista de Desejos</a>
                       </div>

                       <div class="link_header link_sanduiche">
                         <a href="" class="paginas-navbar">Sair</a>
                       </div>
                     </div>
             <!-- fim da div do menu sanduíche-->

        <!-- 'box' é a caixa da direita com a informação da página escolhida -->
        <div class="box-container" id="box">
            <h1 class="titulo-box">Lista de Desejos</h1>
               <div class="produtos-container" id="pedidos">
                <div class="linha">
                </div>
                        <div id="carrinho-legenda">
                            <div class="legenda-foto">Foto</div>
                            <div class="legenda-nome">Nome</div>
                            <div class="legenda-valor">Valor</div>
                        </div>
                        <div class="produto">
                            <div class="produto-info">
                                <img src="../imagens/Produtos/Miku/Imagem1.png" class="produto-imagem">
                                <div class="produto-nome">Pelúcia Hatsune Miku</div>
                                <div class="produto-valor">
                                    <div class="valor-unidade">R$ 50,00</div>
                                </div>
                            </div>
                        </div>

                        <div class="produto">
                            <div class="produto-info">
                                <img src="../imagens/Produtos/Ralsei/ralseideltarune.png" class="produto-imagem">
                                <div class="produto-nome">Pelúcia Ralsei Deltarune</div>
                                <div class="produto-valor">
                                    <div class="valor-unidade">R$ 30,00</div>
                                </div>
                            </div>
                        </div>
                     </div>   
        </div>
        
    <!-- fim da página da conta -->
</div>
<?php include("footer.php") ?>
</body>
</html>