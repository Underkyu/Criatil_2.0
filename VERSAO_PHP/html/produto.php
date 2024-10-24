<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="w" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="../css/produto.css" />
    <link rel="stylesheet" href="../css/card.css" />

    <title>Pelucia Miku</title>
  </head>

  <body>
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

          <div
            class="imagem_menor"
            onclick="mudarImagem('../imagens/Produtos/Miku/Imagem1.png','block','none','none')"
          >
            <img
              src="../imagens/Produtos/Miku/Imagem1.png"
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

          <div
            class="imagem_menor"
            onclick="mudarImagem('../imagens/Produtos/Miku/Imagem2.png','none','block','none')"
          >
            <img
              src="../imagens/Produtos/Miku/Imagem2.png"
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

          <div
            class="imagem_menor"
            onclick="mudarImagem('../imagens/Produtos/Miku/Imagem3.png','none','none','block')"
          >
            <img
              src="../imagens/Produtos/Miku/Imagem3.png"
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
        </div>
        <!--Fim imagens pequenas-->

        <img
          src="../imagens/Produtos/Miku/Imagem1.png"
          alt="Imagem maior do produto"
          class="imagem_maior"
          id="imagem_maior"
        />
        <!--Imagem maior do produto-->

        <div class="detalhes">
          <!--Div que contem os detalhes dos produtos-->
          <h3 class="titulo">Pelucia Miku</h3>
          <!--Nome do produto-->

          <div class="avaliacoes_anuncio">
            <!--Div que contem as estrelas e o numero de avalições-->
            <div class="estrelas">
              <img src="../imagens/Icons/estrela.png" alt="estrela" />
              <img src="../imagens/Icons/estrela.png" alt="estrela" />
              <img src="../imagens/Icons/estrela.png" alt="estrela" />
              <img src="../imagens/Icons/estrela.png" alt="estrela" />
              <img src="../imagens/Icons/meia_estrela.png" alt="estrela" />
            </div>
            <p class="avaliacao">12.6K</p>
          </div>
          <h2 class="preco">R$79,99</h2>
          <p class="descricao">
            Boneco de pelucia inspirado na famosa cantora virtual hatsune miku,
            perfeito para pessoas de qualquer idade
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

          <button class="comprar">
            <p class="comprar">Comprar</p>
          </button>

          <button class="carrinho">
            <p class="carrinho">Adiconar ao carrinho</p>
          </button>
        </div>
      </div>
      <!--Fim div produto-->

      <!--Inicio product slider 1-->
      <h1 class="titulo">Novidades</h1>

      <div class="slider">
        <div class="swiper-button-prev seta prev-product"></div>
        <div class="swiper product">
          <div class="swiper-wrapper">
            <!--Div que contem os elementos do card-->
            <div class="card swiper-slide">
              <div class="imagem_card">
                <img
                  src="../imagens/Produtos/Miku/Imagem1.png"
                  alt="Pelúcia Hatsune Miku"
                  class="foto_card"
                />
              </div>

              <h4 class="titulo_card">Pelúcia Hatsune Miku</h4>
              <p class="texto_pequeno">Por apenas</p>
              <h3 class="preco">R$99,99</h3>

              <button class="card">
                <!--Botão de comprar-->
                <img
                  src="../imagens/Icons/carrinho.png"
                  alt="Carrinho"
                  class="botao_card"
                />
                <p class="botao_card">Comprar!</p>
              </button>
            </div>
            <!--Fim card-->

            <!--Div que contem os elementos do card-->
            <div class="card swiper-slide">
              <div class="imagem_card">
                <img
                  src="../imagens/Produtos/CuboMagico/imagem1.png"
                  alt="Cubo Magico Tatil"
                  class="foto_card"
                />
                <img
                  src="../imagens/Selo/Visual.png"
                  alt="Selo de deficiencia visual"
                  class="selo_deficiencia"
                />
              </div>

              <h4 class="titulo_card">Cubo Magico Tatil</h4>
              <p class="texto_pequeno">Por apenas</p>
              <h3 class="preco">R$39,99</h3>

              <button class="card">
                <!--Botão de comprar-->
                <img
                  src="../imagens/Icons/carrinho.png"
                  alt="Carrinho"
                  class="botao_card"
                />
                <p class="botao_card">Comprar!</p>
              </button>
            </div>
            <!--Fim card-->

            <!--Div que contem os elementos do card-->
            <div class="card swiper-slide">
              <div class="imagem_card">
                <img
                  src="../imagens/Produtos/Nerf/imagem1.png"
                  alt="Arma Nerf"
                  class="foto_card"
                />
                <img
                  src="../imagens/Selo/Desconto.png"
                  alt="Selo de desconto"
                  class="selo_desconto"
                />
              </div>

              <h4 class="titulo_card">Pistola Nerf</h4>
              <s class="texto_pequeno">R$99,99</s>
              <h3 class="preco">R$79,99</h3>

              <button class="card">
                <!--Botão de comprar-->
                <img
                  src="../imagens/Icons/carrinho.png"
                  alt="Carrinho"
                  class="botao_card"
                />
                <p class="botao_card">Comprar!</p>
              </button>
            </div>
            <!--Fim card-->

            <!--Div que contem os elementos do card-->
            <div class="card swiper-slide">
              <div class="imagem_card">
                <img
                  src="../imagens/Produtos/Funko/imagem1.png"
                  alt="Funko Pop Oshawott"
                  class="foto_card"
                />
              </div>

              <h4 class="titulo_card">Funko Pop Oshawott</h4>
              <p class="texto_pequeno">Por apenas</p>
              <h3 class="preco">R$129,99</h3>

              <button class="card">
                <!--Botão de comprar-->
                <img
                  src="../imagens/Icons/carrinho.png"
                  alt="Carrinho"
                  class="botao_card"
                />
                <p class="botao_card">Comprar!</p>
              </button>
            </div>
            <!--Fim card-->

            <!--Div que contem os elementos do card-->
            <div class="card swiper-slide">
              <div class="imagem_card">
                <img
                  src="../imagens/Produtos/Bola/imagem1.png"
                  alt="Bola com Guizo"
                  class="foto_card"
                />
                <img
                  src="../imagens/Selo/Visual.png"
                  alt="Selo de deficiencia visual"
                  class="selo_deficiencia"
                />
              </div>

              <h4 class="titulo_card">Bola com Guizo</h4>
              <p class="texto_pequeno">Por apenas</p>
              <h3 class="preco">R$119,99</h3>

              <button class="card">
                <!--Botão de comprar-->
                <img
                  src="../imagens/Icons/carrinho.png"
                  alt="Carrinho"
                  class="botao_card"
                />
                <p class="botao_card">Comprar!</p>
              </button>
            </div>
            <!--Fim card-->

            <!--Div que contem os elementos do card-->
            <div class="card swiper-slide">
              <div class="imagem_card">
                <img
                  src="../imagens/Produtos/Libras/imagem1.png"
                  alt="Jogo alfabeto em libras"
                  class="foto_card"
                />
                <img
                  src="../imagens/Selo/Desconto.png"
                  alt="Selo de desconto"
                  class="selo_desconto"
                />
                <img
                  src="../imagens/Selo/Auditiva.png"
                  alt="Selo de deficiencia auditiva"
                  class="selo_deficiencia"
                />
              </div>

              <h4 class="titulo_card">Jogo Alfabeto em Libras</h4>
              <s class="texto_pequeno">R$69,99</s>
              <h3 class="preco">R$59,99</h3>

              <button class="card">
                <!--Botão de comprar-->
                <img
                  src="../imagens/Icons/carrinho.png"
                  alt="Carrinho"
                  class="botao_card"
                />
                <p class="botao_card">Comprar!</p>
              </button>
            </div>
            <!--Fim card-->
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-next seta next-product"></div>
      </div>
      <!--Fim product slider 1-->

      <h2 class="avaliacoes">Deixe sua avalição</h2>
      <div class="add_ava">
        <div class="titulo_ava">
          <input type="text" class="titulo_ava" placeholder="Digite o título da avaliação">
          <select name="" id="" class="num_estrelas"><!--Select com o tipo de cliente e no qual o garente irá mudar para bloqueado para bloquear o acesso da conta ao site-->
            <option value= 5>5</option>
            <option value= 4>4</option>
            <option value= 3>3</option>
            <option value= 2>2</option>
            <option value= 1>1</option>
          </select>
        </div>
        <div class="comentario">
            <input type="text" class="comentario" placeholder="Deixe aqui sua opinião do produto">
          </div>
      </div>
      
      
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

          <!--Começo card avaliação-->
          <div class="card_avaliacao">
            <img
              src="../imagens/Avaliacoes/teto_perfil.jpg"
              alt="Foto de perfil"
              class="foto_perfil"
            /><!--Foto de perifl da avalição-->
            <div class="detalhes_avaliacoes">
              <!--Detalhes como nome do avaliador e a avaliação em si-->

              <div class="nome_avaliacao">
                <h5 class="nome">Kasane Teto</h5>
                <!--Nome da conta-->

                <!--Estrelas ao lado do nome-->
                <div class="estrelas">
                <img
                  src="../imagens/Icons/estrela.png"
                  alt="estrela"
                  class="primeira_estrela"
                />
                <img src="../imagens/Icons/estrela.png" alt="estrela" />
                <img src="../imagens/Icons/estrela.png" alt="estrela" />
                <img src="../imagens/Icons/estrela.png" alt="estrela" />
                <img
                  src="../imagens/Icons/meia_estrela.png"
                  alt="meia estrela"
                />
              </div>
              </div>

              <p class="titulo_avaliacao">Amei</p>
              <!--Titulo da avaliacao-->

              <p class="texto_avaliacao">
                Produto de otima qualidade, entrega rápida e é a hatsune miku
                \o/
              </p>
              <!--Texto da avaliacao-->
            </div>
          </div>
          <!--Fim card avaliação-->

          <!--Começo card avaliação-->
          <div class="card_avaliacao">
            <img
              src="../imagens/Avaliacoes/gumi_perfil.jpeg"
              alt="Foto de perfil"
              class="foto_perfil"
            /><!--Foto de perifl da avalição-->
            <div class="detalhes_avaliacoes">
              <!--Detalhes como nome do avaliador e a avaliação em si-->

              <div class="nome_avaliacao">
                <h5 class="nome">Gumi</h5>
                <!--Nome da conta-->

                <!--Estrelas ao lado do nome-->
                <div class="estrelas">
                  <img
                    src="../imagens/Icons/estrela.png"
                    alt="estrela"
                    class="primeira_estrela"
                  />
                  <img src="../imagens/Icons/estrela.png" alt="estrela" />
                  <img src="../imagens/Icons/estrela.png" alt="estrela" />
                  <img src="../imagens/Icons/estrela.png" alt="estrela" />
                  <img
                    src="../imagens/Icons/meia_estrela.png"
                    alt="meia estrela"
                  />
                </div>
              </div>

              <p class="titulo_avaliacao">Miku</p>
              <!--Titulo da avaliacao-->

              <p class="texto_avaliacao">Miku you can call me Miku</p>
              <!--Texto da avaliacao-->
            </div>
          </div>
          <!--Fim card avaliação-->
        </div>
      </div>
    </div>
    <!--JS dos carrosseis e da pagina respectivamente-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script src="../js/produto.js"></script>
  </body>
</html>
