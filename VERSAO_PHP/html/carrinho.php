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
    $contador = 0;

    function button1( $quantidade) {
        $quantidade = $quantidade - 1;
    }
    function button2($quantidade) {
        $quantidade = $quantidade + 1;
    }
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
        <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
        <title>Criatil - Carrinho</title>
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
                            <p class="legenda-valor"> </p>
                        </div>

                        <?php
                            foreach ($carrinho as $produto) {
                                $brinquedo = $prodDAO->pesquisarPorCodigo($produto);
                                $imagens[] = $prodDAO->pesquisarImagemPorCodigoBrinq($brinquedo->getCodigoBrinq());
                                $imagem = $imagens[$contador];
                                ?>
                            <div class="produto">
                            <?php 
                                $quantidade = 10;
                                if(array_key_exists('botao_menos', $_POST)) {
                                    button1($quantidade);
                                }
                                else if(array_key_exists('botao_mais', $_POST)) {
                                    button2($quantidade);
                                }
                                ?>
                            <div class="produto-info">
                                <img src=<?php  print_r($imagem[0]->getImagem()) ?> class="produto-imagem">
                                <div class="produto-nome"><?php print_r($brinquedo->getNomeBrinq()); ?></div>
                                <div class="produto-quantidade">

                                <form method="POST" action="../controller/carrinhoProccess.php">
                                <input type="hidden" name="Contador" value=<?php print_r($contador)?>>
                                <input type="hidden" name="Operacao" value="Diminuir">
                                <button class="quantidade-botao" name="botao_menos">-</button>
                                </form>

                                    <span class="quantidade-numero" style="display: flex;"><?php
                                    $carrinhoArray = json_decode($_COOKIE["quantidade"], true); // Decodifica o JSON em array associativo
            
                                    print_r($carrinhoArray[$contador]); 
                                    ?></span>
                                    
                                    <form method="POST" action="../controller/carrinhoProccess.php">
                                    <input type="hidden" name="Contador" value=<?php print_r($contador)?>>
                                    <input type="hidden" name="Operacao" value="AdicionarQuant">
                                    <button class="quantidade-botao"  name="botao_mais">+</button>
                                    </form>
                                </div>
                                <div class="produto-valor">
                                    <div class="valor_flex">
                                        <div class="valor-unidade">R$<?php print_r($brinquedo->getPrecoBrinq()); ?>/un.</div>
                                        <div class="valor-total">R$<?php print_r(($brinquedo->getPrecoBrinq()*$quantidade)); ?></div>
                                    </div>
                                </div>
                                <div class="excluir-item">
                                <form method="POST" action="../controller/carrinhoProccess.php">
                                <input type="hidden" name="Operacao" value="Excluir">
                                <input type="hidden" name="Contador" value=<?php print_r($contador)?>>
                                    <button class="excluir">
                                        <img src="../imagens/Icons/x.png" alt="Excluir item" class="excluir">
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>

                        <?php
                            $contador++;
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

                    <button onclick=print(<?php print_r($quantidade) ?>>asdfgasd</button>
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
        
                
    <!-- fim da página do carrinho -->
     </div>

     <?php include("footer.php") ?>
    </body>
    </html>