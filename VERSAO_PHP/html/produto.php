<?php
require_once("../Dao/produtoDAO.php");
require_once("../models/brinquedo.php");
require_once("../controller/global.php");
require_once("../controller/conexao.php");
require_once("../Dao/usuarioDAO.php");
require_once("../models/usuario.php");

$userDao = new UsuarioDAO($conn,$BASE_URL);

$usuarioData = $userDao->verificarToken(false);

$prodDAO = new ProdutoDAO($conn,$BASE_URL);
$brinquedo = $prodDAO->pesquisarPorCodigo(codigoBrinq: $_GET['codigo']);

$stmt = $conn->prepare("SELECT * FROM avaliacao WHERE Codigo_Brinq=".$brinquedo->getCodigoBrinq());
$stmt->execute();
$numAvaliacoes = $stmt->rowCount();
$avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmt2 = $conn->prepare("SELECT Codigo_Brinq, Nome_Brinq, Preco_Brinq FROM brinquedo");
$stmt2->execute();

$brinquedos = $stmt2->fetchAll(PDO::FETCH_ASSOC);

function renderizarEstrelas($nota) {
  $estrelasInteiras = floor($nota);
  $meiaEstrela = ($nota - $estrelasInteiras) >= 0.5 ? 1 : 0;
  $estrelasVazias = 5 - ($estrelasInteiras + $meiaEstrela);
  
  $htmlEstrelas = '';
  
  for ($i = 0; $i < $estrelasInteiras; $i++) {
      $htmlEstrelas .= '<img src="../imagens/Icons/estrela.png" alt="estrela" class="estrela" />';
  }
  
  if ($meiaEstrela) {
      $htmlEstrelas .= '<img src="../imagens/Icons/meia_estrela.png" alt="meia estrela" class="estrela" />';
  }
  
  for ($i = 0; $i < $estrelasVazias; $i++) {
      $htmlEstrelas .= '<img src="../imagens/Icons/estrela_vazia.png" alt="estrela vazia" class="estrela" />';
  }
  
  return $htmlEstrelas;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="w" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="../css/produto.css" />
    <link rel="stylesheet" href="../css/card.css" />
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Criatil - produto</title>
  </head>

  <body>
  <?php include("header.php");?>
  
    <div class="container">
      <!--Inicio div produto-->
      <div class="produto">
        <!--Div que contem as informações principais do produto-->

        <!--Inicio Carrossel que só aprece na responsividade-->
        <section class="slider_carrossel">
          <!-- Swiper -->
          <div class="swiper carrossel" id="carrossel">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img
                src="../imagens/Produtos/Miku/Imagem1.png"
                alt="Primeira imagem"
                class="imagem_maior carrossel"
                />
              </div>

              <div class="swiper-slide">
                <img
                src="../imagens/Produtos/Miku/Imagem2.png"
                alt="Segunda imagem"
                class="imagem_maior carrossel"
                />
              </div>

              <div class="swiper-slide">
                <img
                src="../imagens/Produtos/Miku/Imagem3.png"
                alt="Terceira imagem"
                class="imagem_maior carrossel"
                />
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </section>

        <!--Fim carrossel-->

        <div class="imagens_menores">
          <!--Imagens pequnas que ficam ao lado da maior-->

          <?php
             $imagens[] = $prodDAO->pesquisarImagemPorCodigoBrinq($brinquedo->getCodigoBrinq());
             $imagem = $imagens[0];
  
             if(count($imagens)>=1){
              $imagem1 = $imagem[0];
             ?>
              <div
              class="imagem_menor"
              onclick="mudarImagem('<?php print_r($imagem1->getImagem());?>','block','none','none')"
            >
              <img
                src=<?php print_r($imagem1->getImagem());?>
                alt="Pelucia Miku de frente"
                class="imagem_menor"
              />
              <div class="barra_ativo">
                <img
                  src="../imagens/Produtos/barra_ativo.png"
                  alt="barra ativo"
                  class="barra_ativo"
                  id="um"
                />
                <!--Aquela barrinha do lado da imagem pra mostrar qual imagem ta selecionada-->
              </div>
            </div>
            <?php
             }if(count($imagem)>=2){
              $imagem1 = $imagem[1];
              ?>
            <div
              class="imagem_menor"
              onclick="mudarImagem('<?php print_r($imagem1->getImagem());?>','none','block','none')"
            >
              <img
                src=<?php print_r($imagem1->getImagem());?>
                alt="Pelucia Miku de frente"
                class="imagem_menor"
              />
              <div class="barra_ativo">
                <img
                  src="../imagens/Produtos/barra_ativo.png"
                  alt="barra ativo"
                  class="barra_ativo"
                  id="dois"
                />
                <!--Aquela barrinha do lado da imagem pra mostrar qual imagem ta selecionada-->
              </div>
            </div>
            <?php
             }if(count($imagem)>= 3){
              $imagem1 = $imagem[2];
              ?>
                <div
              class="imagem_menor"
              onclick="mudarImagem('<?php print_r($imagem1->getImagem());?>','none','none','block')"
            >
              <img
                src=<?php print_r($imagem1->getImagem());?>
                alt="Pelucia Miku de frente"
                class="imagem_menor"
              />
              <div class="barra_ativo">
                <img
                  src="../imagens/Produtos/barra_ativo.png"
                  alt="barra ativo"
                  class="barra_ativo"
                  id="tres"
                />
                <!--Aquela barrinha do lado da imagem pra mostrar qual imagem ta selecionada-->
              </div>
            </div>
              <?php
             }

          ?>
        </div>
        <!--Fim imagens pequenas-->
        <?php
          $imagem1 = $imagem[0];
        ?>
        <img
          src="<?php print_r($imagem1->getImagem());?>"
          alt="Imagem maior do produto"
          class="imagem_maior"
          id="imagem_maior"
        />
        <!--Imagem maior do produto-->

        <div class="detalhes">
          <!--Div que contem os detalhes dos produtos-->
          <h3 class="titulo"><?php print_r($brinquedo->getNomeBrinq());?></h3>
          <!--Nome do produto-->

          <div class="avaliacoes_anuncio">
            <!--Div que contem as estrelas e o numero de avalições-->
            <div class="estrelas">
              <img src="../imagens/Icons/estrela.png" alt="estrela" />
              <img src="../imagens/Icons/estrela.png" alt="estrela" />
              <img src="../imagens/Icons/estrela.png" alt="estrela" />
              <img src="../imagens/Icons/estrela.png" alt="estrela" />
              <img src="../imagens/Icons/estrela.png" alt="estrela" />
            </div>
            <p class="avaliacao"><?php echo number_format($numAvaliacoes); ?></p>
          </div>
          <h2 class="preco">R$<?php echo number_format($brinquedo->getPrecoBrinq(), 2, ',', '.'); ?></h2>
          <p class="descricao">
          <?php print_r($brinquedo->getDescricao());?>
          </p>

          <p class="quantidade">Quantidade</p>
          <div class="quantidade">
            <button id="decrement" onclick="stepper(this)" class="quantidade">
              -
            </button>
            <input
              type="number"
              min="1"
              max="100"
              step="1"
              value="1"
              id="my-input"
            />
            <button id="increment" onclick="stepper(this)" class="quantidade">
              +
            </button>
          </div>
          <form action="../controller/desejosProccess.php" method="POST">
          <input type="hidden" name="Operacao" value="Adicionar">
          <input type="text" name="codigoUsu" value=<?php print_r($usuarioData) ?>> 
          <input type="text" name="codigoBrinq" value=<?php print_r($_GET['codigo'])?>>
          <button class="comprar">
            <p class="comprar">Adicionar à lista de desejos</p>
          </button>
          </form>

          <form action="../controller/carrinhoProccess.php" class="form" method="POST">
          <input type="hidden" name="Operacao" value="Adicionar">
          <input type="hidden" name="Codigo" value=<?php print_r($_GET['codigo'])?>>
          <button class="carrinho">
            <p class="carrinho">Adicionar ao carrinho</p>
          </button>
          </form>
        </div>
      </div>
      <!--Fim div produto-->

      <!--Inicio product slider 1-->
      <h1 class="titulo">Novidades</h1>

      <div class="slider">
        <div class="swiper-button-prev seta prev-product"></div>
        <div class="swiper product">
          <div class="swiper-wrapper">
          <?php
            foreach ($brinquedos as $brinquedo) {
              // seleciona a img do brinquedo atual
              $stmt = $conn->query("SELECT Imagem FROM imagem WHERE Codigo_Brinq = " . $brinquedo['Codigo_Brinq'] . " ORDER BY Num_Imagem LIMIT 1");
              $imagem = $stmt->fetch(PDO::FETCH_ASSOC);
          ?>
          <!--Div que contem os elementos do card-->
          <div class="card swiper-slide">
            <div class="imagem_card">
              <img src="<?php echo $imagem['Imagem']; ?>" class="foto_card">
            </div>
            <h4 class="titulo_card"><?php echo $brinquedo['Nome_Brinq']; ?></h4>
            <h3 class="preco">R$<?php echo number_format($brinquedo['Preco_Brinq'], 2, ',', '.'); ?></h3>
            <a href=<?php print_r("produto.php?codigo=" . $brinquedo['Codigo_Brinq'] )?>>
              <button class="card">
              <img src="../imagens/Icons/carrinho.png" alt="Carrinho" class="botao_card">
              <p class="botao_card"> Comprar!</p>
              </button>
            </a>
            </div>
          <!--Fim card-->
          <?php } ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-next seta next-product"></div>
      </div>
      <!--Fim product slider 1-->

      <form method="POST" action="../controller/avaliacaoProcess.php">
      <div class="add_ava">
        <div class="ava_container">
      <h2 class="add_ava">Deixe sua avaliação</h2>
        <div class="titulo_ava">
          <div class="input_ava">
          <h3 class="titulo_input_ava">Titulo</h3>
          <input type="text" class="titulo_ava" name="Titulo_Ava" placeholder="Digite o título da avaliação">
          </div>
    
          <div class="input_ava">
          <h3 class="titulo_input_ava">Estrelas</h3>
          <select name="Nota_Ava" class="num_estrelas">
            <option value= 0>0</option>
            <option value= 0.5>0,5</option>
            <option value= 1>1</option>
            <option value= 1.5>1,5</option>
            <option value= 2>2</option>
            <option value= 2.5>2,5</option>
            <option value= 3>3</option>
            <option value= 3.5>3,5</option>
            <option value= 4>4</option>
            <option value= 4.5>4,5</option>
            <option value= 5>5</option>
          </select>
          </div>
        </div>
        <div class="comentario">
            <h3 class="titulo_input_ava">Comentário</h3>
            <input type="text" maxlength="150" class="comentario" name="Comentario" placeholder="Deixe aqui sua opinião do produto">
        </div>
        <div class="botao_ava">
          <button class="add_ava" type="submit">
            <img src="../imagens/Gerente/mais.png" alt="Adicionar" class="add_ava_button">
            <p class="add_ava_button">Adicionar avaliação</p>
          </button>
        </div>
          </div>
      </div>
      
      <input type="hidden" name="Codigo_Brinq" value=<?php print_r($_GET['codigo']) ?>>
      <input type="hidden" name="Tipo" value="Criar">
      </form>
      
      <h2 class="avaliacoes">Avaliações</h2>
      <!--Titulo avaliações-->

      <div class="avaliacao">
        <!--Div que contem toda a parte de avaliações, tanto as estatiticas quanto as avalções em si-->

        <div class="estatisticas">
          <!--Parte que mostra a porcentagem de cada tipo de avaliação-->

          <h3 class="estatisticas">Estatisticas</h3>
          <!--Titulo "Estatisticas"-->

          <div class="cinco">
            <!--5 estrelas-->
            <p class="numero_estrelas">5</p>
            <!--Texto referente ao número de estrelas-->
            <div class="amarelo" style="width: 144px"></div>
            <!--Div vazio que compões a parte amarela do gráfico de barra-->
            <div class="branco" style="width: 56px"></div>
            <!--Div vazio que compões a parte branca do gráfico de barra-->
            <p class="porcentagem">77%</p>
            <!--Texto referente a porcentagem-->
          </div>

          <div class="quatro">
            <!--4 estrelas-->
            <p class="numero_estrelas">4</p>
            <!--Texto referente ao número de estrelas-->
            <div class="amarelo" style="width: 32px"></div>
            <!--Div vazio que compões a parte amarela do gráfico de barra-->
            <div class="branco" style="width: 168px"></div>
            <!--Div vazio que compões a parte branca do gráfico de barra-->
            <p class="porcentagem">16%</p>
            <!--Texto referente a porcentagem-->
          </div>

          <div class="tres">
            <!--3 estrelas-->
            <p class="numero_estrelas">3</p>
            <!--Texto referente ao número de estrelas-->
            <div class="amarelo" style="width: 10px"></div>
            <!--Div vazio que compões a parte amarela do gráfico de barra-->
            <div class="branco" style="width: 190px"></div>
            <!--Div vazio que compões a parte branca do gráfico de barra-->
            <p class="porcentagem">05%</p>
            <!--Texto referente a porcentagem-->
          </div>

          <div class="dois">
            <!--2 estrelas-->
            <p class="numero_estrelas">2</p>
            <!--Texto referente ao número de estrelas-->
            <div class="amarelo" style="width: 2px"></div>
            <!--Div vazio que compões a parte amarela do gráfico de barra-->
            <div class="branco" style="width: 198px"></div>
            <!--Div vazio que compões a parte branca do gráfico de barra-->
            <p class="porcentagem">01%</p>
            <!--Texto referente a porcentagem-->
          </div>

          <div class="um">
            <!--1 estrelas-->
            <p class="numero_estrelas">1</p>
            <!--Texto referente ao número de estrelas-->
            <div class="amarelo" style="width: 2px"></div>
            <!--Div vazio que compões a parte amarela do gráfico de barra-->
            <div class="branco" style="width: 198px"></div>
            <!--Div vazio que compões a parte branca do gráfico de barra-->
            <p class="porcentagem">01%</p>
            <!--Texto referente a porcentagem-->
          </div>
        </div>
        <!--Fim estatisticas-->

        <div class="avaliacoes">
          <!--Avalições em si-->

          <?php
            foreach ($avaliacoes as $avaliacao) {
              // seleciona a img do brinquedo atual
              $stmt = $conn->query("SELECT Imagem FROM usuario WHERE Codigo_Usu  = " . $avaliacao['Codigo_Usu']);
              $imagem = $stmt->fetch(mode: PDO::FETCH_ASSOC);
              $stmt2 = $conn->query("SELECT Nome_Usu FROM usuario WHERE Codigo_Usu  = " . $avaliacao['Codigo_Usu']);
              $nome = $stmt2->fetch(mode: PDO ::FETCH_ASSOC);
          ?>
          <!--Começo card avaliação-->
          <div class="card_avaliacao">
            <img
              src=<?php
                        if($imagem['Imagem'] == "vazio") {;
                            print_r("../imagens/usuarios/usuario.png"); 
                            
                        }else{
                            print_r("../imagens/usuarios/".$imagem['Imagem'].".jpeg");
                        }?>
              alt="Foto de perfil"
              class="foto_perfil"
            /><!--Foto de perifl da avalição-->
            <div class="detalhes_avaliacoes">
              <!--Detalhes como nome do avaliador e a avaliação em si-->

              <div class="nome_avaliacao">
                <h5 class="nome"><?php print_r($nome['Nome_Usu']); ?></h5>
                <!--Nome da conta-->

                <!--Estrelas ao lado do nome-->
                <div class="estrelas">
                <?php echo renderizarEstrelas($avaliacao['Nota_Ava']); ?>
               </div>
              </div>

              <p class="titulo_avaliacao"><?php echo($avaliacao['Titulo_Ava']); ?></p>
              <!--Titulo da avaliacao-->

              <p class="texto_avaliacao"> <?php echo($avaliacao['Comentario']); ?></p>
              <!--Texto da avaliacao-->
            </div>
          </div>
          <!--Fim card avaliação-->
          <?php } ?>
        </div>
      </div>
    </div>
    <!--JS dos carrosseis e da pagina respectivamente-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script src="../js/produto.js"></script>
  <?php include("footer.php") ?>
  </body>
</html>
