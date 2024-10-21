<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- link da fonte pro css saber que fonte usar -->
    <link rel="stylesheet" href="../css/cartoes.css">
    <script src="../js/menuSanduicheCONTA.js" defer></script>
    <title>Criatil</title>
</head>
<body>
<div class="container">
    <!-- página da conta -->
    <!-- 'navbar-conta' é a barra da esquerda com as páginas -->
        <div class="container" id="navbar-conta"> 
             <div class="lateral-conta">
                  <img class="img-lateral" src="../imagens/Conta/rosana.jpg">
                  <h1 class="nome-lateral">Rosana Siqueira</h1>
             </div>
             <div class="paginas">
                  <a href="./conta.php" class="paginas-navbar">Perfil</a>
                  <a href="./pedidos.php" class="paginas-navbar">Pedidos</a>
                  <a href="./desejos.php" class="paginas-navbar">Lista de Desejos</a>
                  <a href="#" class="pagina-selecionada">Cartões</a>
                  <a href="" class="paginas-navbar" id="sair">Sair</a>
             </div>
        </div>
                 <!-- botão do menu sanduíche-->
                 <div class="sanduiche-div">
                    <button class="menuSanduiche" onclick="block()">
                     <h1>Minha Conta </h1>
                       <img id="imagemSanduiche" src="../imagens/Icons/arrow2.png" alt="Menu Sanduiche" class="menuSanduiche">
                     </button>
               </div>
               <!-- fim do botão do menu sanduíche-->

             <!-- div do menu sanduíche -->
                     <div class="menuSanduiche" id="menuSanduiche">
                         <div class="link_header link_sanduiche">
                             <a href="./conta.php" class="paginas-navbar">Perfil</a>
                         </div>
         
                         <div class="link_header link_sanduiche">
                             <a href="./pedidos.php" class="paginas-navbar">Pedidos</a>
                         </div>
         
                       <div class="link_header link_sanduiche">
                         <a href="./desejos.php" class="paginas-navbar">Lista de Desejos</a>
                       </div>

                       <div class="link_header link_sanduiche">
                         <a href="#" class="pagina-selecionada">Cartões</a>
                       </div>

                       <div class="link_header link_sanduiche">
                         <a href="" class="paginas-navbar">Sair</a>
                       </div>
                     </div>
             <!-- fim da div do menu sanduíche-->

        <!-- 'box' é a caixa da direita com a informação da página escolhida -->
        <div class="container" id="box">
            <h1 class="titulo-box">Cartões</h1>
               <div class="produtos-container" id="pedidos">
                <div class="linha">
                </div>
                        <div id="carrinho-legenda">
                            <div class="legenda-foto">Logo</div>
                            <div class="legenda-nome">Nome</div>
                            <div class="legenda-valor">Final</div>
                        </div>
                        <div class="produto">
                            <div class="produto-info">
                                <img src="../imagens/Conta/VISA logo.png" class="produto-imagem">
                                <div class="produto-nome">Visa</div>
                                <div class="produto-valor">8831</div>
                            </div>
                        </div>

                        <div class="produto">
                            <div class="produto-info">
                                <img src="../imagens/Conta/mastercard logo.png" class="produto-imagem">
                                <div class="produto-nome">Mastercard</div>
                                <div class="produto-valor">3841</div>
                            </div>
                        </div>
          </div>
          </div>
    <!-- fim da página da conta -->
  </div>
</body>
</html>