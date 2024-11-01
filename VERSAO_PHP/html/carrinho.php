<?php
require_once("../controller/global.php");
require_once("../controller/conexao.php");
require_once("../Dao/carrinhoDAO.php");
require_once("../models/message.php");
require_once("../Dao/produtoDAO.php");
require_once("../models/brinquedo.php");


    $prodDAO = new ProdutoDAO($conn,$BASE_URL);

    $carrinhoDao = new carrinhoDao($conn,$BASE_URL);
    $carrinho = $carrinhoDao->getCarrinho();
    $quantidade = 1;
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- link da fonte pro css saber que fonte usar -->
        <link rel="stylesheet" href="../css/carrinho.css">
        <script src="../js/carrinhoResumo.js" defer></script>
        <script src="../js/carrinhoQuantidade.js" defer></script>
        <title>Criatil</title>
    </head>
    <body>
    <?php include("header.php") ?>
    <!-- página do carrinho -->
    <div class="container-pag">
        <div class="container-car">
                <div id="entrega">
                    <div>
                        <img src="../imagens/Icons/frete.png">
                        <h1>Calcular Frete</h1>
                    </div>
                    <div>
                        <img src="../imagens/Icons/entrega.png">
                        <h1>Método de Entrega</h1>
                    </div>
                    <div>
                        <img src="../imagens/Icons/cupom.png">
                        <h1>Inserir Cupom</h1>
                    </div>
                </div>
                <div id="carrinho" class="carrinhobox">

                        <div id="carrinho-legenda">
                            <p class="legenda-img">Foto</p>
                            <p class="legenda-nome">Nome</p>
                            <p class="legenda-qntd">Quantidade</p>
                            <p class="legenda-valor">Valor</p>
                            <p class="legenda-valor">Excluir</p>
                        </div>

                        <?php
                            foreach ($carrinho as $produto) {
                                $brinquedo = $prodDAO->pesquisarPorCodigo($produto);
                                ?>
                            <div class="produto">
                            <div class="produto-info">
                                <img src="../imagens/Produtos/Miku/Imagem1.png" class="produto-imagem">
                                <div class="produto-nome"><?php print_r($brinquedo->getNomeBrinq()); ?></div>
                                <div class="produto-quantidade">
                                    <button class="quantidade-botao" onclick="alterarQntd(this, -1)" onclick=<?php $quantidade++; ?>>-</button>
                                    <span class="quantidade-numero">1</span>
                                    <button class="quantidade-botao" onclick="alterarQntd(this, 1)" onclick=<?php $quantidade++; ?>>+</button>
                                </div>
                                <div class="produto-valor">
                                    <div class="valor_flex">
                                        <div class="valor-unidade">R$<?php print_r($brinquedo->getPrecoBrinq()); ?>/un.</div>
                                        <div class="valor-total">R$<?php print_r(($brinquedo->getPrecoBrinq()*$quantidade)); ?></div>
                                    </div>
                                </div>
                                <div class="excluir-item">
                                    <button class="excluir">
                                        <img src="../imagens/Icons/x.png" alt="Excluir item" class="excluir">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        ?>

                        
                </div>
                <div class="botao-deletar">
                    <form method="POST" action="../controller/carrinhoProccess.php">
                    <input type="hidden" name="Operacao" value="Deletar">
                    <button class="deletar">
                        <img src="../imagens/Icons/lixeira.png" alt="Lixeira" class="deletar">
                        <p class="deletar">Deletar todos os itens</p>
                    </button>
                    </form>
                </div>
            </div>

                <div id="resumo" class="resumobox">
                    <div class="conteudoresumo">
                        <h1>Resumo</h1>
                        <div class="resumopreco">
                            <div class="legendas">
                                <div class="legenda">Subtotal:</div>
                                <div class="legenda">Total:</div>
                            </div>
                            <div class="precos">
                                <div class="preco" id="subtotal">R$ 110,00</div>
                                <div class="preco" id="total">R$ 110,00</div>
                            </div>
                        </div>
                    </div>
                    <div id="botoes-resumo">
                        <a href="./principal.php" class="botao-continuar">Continuar Comprando</a>
                        <a href="" class="botao-pagamento">Escolher método de pagamento</a>
                    </div>
                </div>
        
                <button id="botao-resumo">Resumo da Compra</button>
    <!-- fim da página do carrinho -->
     </div>
    </body>
    </html>