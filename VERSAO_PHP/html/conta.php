<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- link da fonte pro css saber que fonte usar -->
    <link rel="stylesheet" href="../css/conta.css">
    <script src="../js/menuSanduicheCONTA.js" defer></script>
    <title>Criatil</title>
</head>
<body>

<?php include("header.php")?>

    <div class="container">
    <!-- página da conta -->
                <!-- 'navbar-conta' é a barra da esquerda com as páginas -->
         <div class="navbar-container" id="navbar-conta"> 
             <div class="lateral-conta">
                  <img class="img-lateral" src="../imagens/Conta/rosana.jpg">
                  <h1 class="nome-lateral">Rosana Siqueira</h1>
             </div>
             <div class="paginas">
                  <a href="#" class="pagina-selecionada">Perfil</a>
                  <a href="./pedidos.php" class="paginas-navbar">Pedidos</a>
                  <a href="./desejos.php" class="paginas-navbar">Lista de Desejos</a>
                  <a href="./cartoes.php" class="paginas-navbar">Cartões</a>
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
                                <a href="#" class="pagina-selecionada">Perfil</a>
                            </div>
            
                            <div class="link_header link_sanduiche">
                                <a href="./pedidos.php" class="paginas-navbar">Pedidos</a>
                            </div>
            
                          <div class="link_header link_sanduiche">
                            <a href="./desejos.php" class="paginas-navbar">Lista de Desejos</a>
                          </div>

                          <div class="link_header link_sanduiche">
                            <a href="./cartoes.php" class="paginas-navbar">Cartões</a>
                          </div>

                          <div class="link_header link_sanduiche">
                            <a href="" class="paginas-navbar">Sair</a>
                          </div>
                        </div>
                <!-- fim da div do menu sanduíche-->

        <!-- 'box' é a caixa da direita com a informação da página escolhida -->
        <div class="box-container" id="box">
            <h1 class="titulo-box">Perfil</h1>
               <div class="perfil-container" id="perfil">
                <div class="informacoes">
                    <div class="info-item">
                        <div class="info-label">Nome completo:</div>
                        <div class="info-value">Rosana Siqueira</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Data de nascimento:</div>
                        <div class="info-value">01/04/1985</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email:</div>
                        <div class="info-value">rosana.siqueiras@gmail.com</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Telefone:</div>
                        <div class="info-value">(11) 97905-7355</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">CEP:</div>
                        <div class="info-value">03313-020</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Endereço:</div>
                        <div class="info-value">R. Duarte de Azevedo 210</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Complemento:</div>
                        <div class="info-value">Nenhum complemento adicionado</div>
                    </div>
                    <button class="editar">Editar</button>
                </div>

                <div class="conta-box">
                    <div class="img-container"> 
                        <img src="../imagens/Conta/rosana.jpg" class="img-conta">
                        <div class="editar-icone">
                            <img src="../imagens/Icons/Editar.png" class="icone-editar">
                        </div>
                    </div>
                    <h2 class="nome-conta">Rosana Siqueira</h2>
                </div>
               </div>   
        </div>
            <!-- fim da página da conta -->
    </div>
</body>
</html>