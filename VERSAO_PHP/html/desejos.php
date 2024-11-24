<?php
require_once("../controller/global.php");
require_once("../controller/conexao.php");
require_once("../Dao/usuarioDAO.php");
require_once("../Dao/desejosDAO.php");
require_once("../Dao/produtoDAO.php");
require_once("../models/usuario.php");

$desejosDao = new desejosDao($conn, $BASE_URL);
$userDao = new UsuarioDAO($conn,$BASE_URL);
$prodDao = new ProdutoDAO($conn,$BASE_URL);

$usuarioData = $userDao->verificarToken(true);

$itensLista = $desejosDao->getItensLista($usuarioData->getCodigo());
?>

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
<body>
<?php include("header.php");?>

<div class="container">
    <!-- página da conta -->
            <div class="navbar-container"> 
            <div class="ft-nome-lateral">
                <div class="ft-lateral">
                  <img class="img-lateral" src=<?php
                        if($usuarioData->getImagem() == "vazio") {;
                            echo("../imagens/usuarios/usuario.png"); 
                        }else{
                            echo("../imagens/usuarios/".$usuarioData->getImagem().".jpeg");
                        }?>>
                        </div>
                        <div class="nomelat-div">
                         <h1 class="nome-lateral"><?php echo($usuarioData->getNome());?></h1>
                        </div>
                        </div>
                    <div class="paginas">
                        <a href="./conta.php" class="paginas-navbar">Perfil</a>
                        <a href="./pedidos.php" class="paginas-navbar">Pedidos</a>
                        <a href="#" class="pagina-selecionada">Lista de Desejos</a>
                        <a href="../controller/logout.php" class="paginas-navbar" id="sair">Sair</a>
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
                            <a href="../controller/logout.php" class="paginas-navbar">Sair</a>
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
                            <?php if($itensLista != false){ ?><div class="legenda-espaco"> </div> <?php } ?>
                        </div>
                        <?php
                        if($itensLista != false){
                            foreach($itensLista as $item) {
                                $produto = $prodDao->pesquisarPorCodigo($item->getCodigoBrinq()); 
                        ?>
                         <div class="produto">
                            <div class="produto-info">
                                <img src=<?php $imagem = $prodDao->pesquisarPrimeiraImagemPorCodigoBrinq($produto->getCodigoBrinq()); 
                                echo("../imagens/Produtos/".$imagem->getImagem().".jpeg"); ?> class="produto-imagem">
                                <div class="produto-nome"><?php echo($produto->getNomeBrinq()) ?></div>
                                <div class="produto-valor">
                                    <div class="valor-unidade"><?php echo"R$".(number_format($produto->getPrecoBrinq(), 2, ',', '.')) ?></div>
                                </div>
                                <div class="excluir-item">
                                <form method="POST" action="../controller/desejosProccess.php">
                                <input type="hidden" name="Operacao" value="Excluir">
                                <input type="hidden" name="codigoBrinq" value=<?php echo($produto->getCodigoBrinq())?>>
                                <input type="hidden" name="codigoUsu" value=<?php echo($usuarioData->getCodigo())?>>
                                    <button class="excluir">
                                        <img src="../imagens/Icons/x.png" alt="Excluir item" class="excluir">
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }else{?>
                            <h2 class="vazio">Lista de desejos vazia</h2>
                        <?php }
                        ?>
                     </div>   
        </div>
        
    <!-- fim da página da conta -->
</div>
<?php include("footer.php") ?>
</body>
</html>