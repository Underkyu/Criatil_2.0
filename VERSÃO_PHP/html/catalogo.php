<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/catalogo.css">
    <script src="../js/catalogo.js" defer></script>
    <title>Catalogo</title><!--Página de catálogo-->
</head>

<body>
    <div class="containerCatalogo"><!--Container de todo conteúdo-->
        <div class="filtros"><!--Caixa dos filtros-->
            <div class="titulofiltro">
                <h1>FILTROS</h1>
            </div>
            <br>
                <button id="prev-button"><img src="../imagens/icons/arrow-24-64.png" alt="voltar"></button>
                <div id="itemSlider1" class="variados">
                    <!--Filtro por parâmetros-->
                    <div class="tituloVariados toggleDiv">
                        <div class="iconeVariados">
                            <!--ícone do título-->
                            <img src="../imagens/Icons/cifrãobranco.png" alt="Preço">
                        </div>
                        <div class="textoVariados">
                            <!--Texto do título-->
                            <p>Preço</p>
                        </div>
                    </div>
                    <div class="formFiltro hidden">
                        <form>
                            <!--Filtro por preço-->
                            <div class="formItem">
                                <input type="radio" class="radioButton" name="precoFix" id="radioPreco1" /><label>Até R$45</label>
                            </div>
                            <div class="formItem">
                                <input type="radio" class="radioButton" name="precoFix" id="radioPreco2" /><label>R$45 - R$100</label>
                            </div>
                            <div class="formItem">
                                <input type="radio" class="radioButton" name="precoFix" id="radioPreco3" /><label>Acima de R$100</label>
                            </div>
                            <div class="faixaPreco">
                                <input type="number" class="inputPreco" name="precoMin" id="filtroPrecoMin" placeholder="Min">
                                <p>-</p>
                                <input type="number" class="inputPreco" name="precoMax" id="filtroPrecoMax" placeholder="Max">
                            </div>
                        </form>
                    </div>
                </div>
                
                <div id="itemSlider2" class="categorias">
                    <!--Filtros de categorias definidas-->
                    <div class="tituloCategorias toggleDiv">
                        <div class="iconeCategorias">
                            <!--ícone do título-->
                            <img src="../imagens/Icons/filtrobranco.png" alt="Categorias">
                        </div>
                        <div class="textoCategorias">
                            <!--Texto do título-->
                            <p>Categoria</p>
                        </div>
                    </div>
                    <div class="formFiltro hidden">
                        <form>
                            <!--Filtro por categorias-->
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaBoneco" id="checkCategoria1" /><label>Bonecos</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaCarrinhos" id="checkCategoria2" /><label>Carrinhos</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaPelucia" id="checkCategoria3" /><label>Pelúcia</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaTecnicos" id="checkCategoria4" /><label>Técnicos</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaEletronicos" id="checkCategoria5" /><label>Eletrônicos</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaArtisticos" id="checkCategoria6" /><label>Artisticos</label>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div id="itemSlider3" class="inclusivos">
                    <!--Filtros especificos para inclusão-->
                    <div class="tituloInclusivos toggleDiv">
                        <div class="iconeInclusivos">
                            <!--ícone do título-->
                            <img src="../imagens/Icons/inclusivosbranco.png" alt="Inclusivos">
                        </div>
                        <div class="textoInclusivos">
                            <!--Texto do título-->
                            <p>Inclusivos</p>
                        </div>
                    </div>
                    <div class="formFiltro hidden">
                        <form>
                            <!--Filtro por inclusividade-->
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="defVisual" id="checkInclusivo1" /><label>Def. Visuais</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="defMotor" id="checkInclusivo2" /><label>Def. Motores</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="defAuditivo" id="checkInclusivo3" /><label>Def. Auditivos</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="afasia" id="checkInclusivo4" /><label>Afasia</label>
                            </div>
                        </form>
                    </div>
                </div>
                <button id="next-button"><img src="../imagens/icons/arrow-24-64.png" alt="avançar"></button>
        </div>
        <div class="caixaprodutos"><!--Caixa dos produtos-->
            <div class="tituloProdutos"><!--Titulo da janela-->
                <h1>Produtos</h1>
            </div>
            <div class="produtos"><!--Cards-->
                <!--CARD 1-->
                <div class="card">
                    <div class="imagem_card">
                      <img src="../imagens/Produtos/Nerf/imagem1.png" alt="Arma Nerf" class="foto_card">
                      <img src="../imagens/Selo/Desconto.png" alt="Selo de desconto" class="selo_desconto">
                    </div>
        
                    <h4 class="titulo_card">Pistola Nerf</h4>
                    <s class="texto_pequeno">R$99,99</s>
                    <h3 class="preco">R$79,99</h3>
        
                    <button class="card"> <!--Botão de comprar-->
                      <img src="../imagens/Icons/carrinho.png" alt="Carrinho" class="botao_card">
                      <p class="botao_card">Comprar!</p>
                    </button>
                  </div>
                  <!--Fim do CARD 1-->

                  <!--CARD 2-->
                  <div class="card">
                    <div class="imagem_card">
                      <img src="../imagens/Produtos/Funko/imagem1.png" alt="Funko Pop Oshawott" class="foto_card">
                    </div>
        
                    <h4 class="titulo_card">Funko Pop Oshawott</h4>
                    <p class="texto_pequeno">Por apenas</p>
                    <h3 class="preco">R$129,99</h3>
        
                    <button class="card"> <!--Botão de comprar-->
                      <img src="../imagens/Icons/carrinho.png" alt="Carrinho" class="botao_card">
                      <p class="botao_card">Comprar!</p>
                    </button>
                  </div>
                  <!--Fim do CARD 2-->

                  <!--CARD 3-->
                  <div class="card">
                    <div class="imagem_card">
                      <img src="../imagens/Produtos/Bola/imagem1.png" alt="Bola com Guizo" class="foto_card">
                      <img src="../imagens/Selo/Visual.png" alt="Selo de deficiencia visual" class="selo_deficiencia">
                    </div>
        
                    <h4 class="titulo_card">Bola com Guizo</h4>
                    <p class="texto_pequeno">Por apenas</p>
                    <h3 class="preco">R$119,99</h3>
        
                    <button class="card"> <!--Botão de comprar-->
                      <img src="../imagens/Icons/carrinho.png" alt="Carrinho" class="botao_card">
                      <p class="botao_card">Comprar!</p>
                    </button>
                  </div>
                  <!--Fim do CARD 3-->

                  <!--CARD 4-->
                  <div class="card">
                    <div class="imagem_card">
                      <img src="../imagens/Produtos/Libras/imagem1.png" alt="Jogo alfabeto em libras" class="foto_card">
                      <img src="../imagens/Selo/Desconto.png" alt="Selo de desconto" class="selo_desconto">
                      <img src="../imagens/Selo/Auditiva.png" alt="Selo de deficiencia auditiva" class="selo_deficiencia">
                    </div>
        
                    <h4 class="titulo_card">Jogo Alfabeto em Libras</h4>
                    <s class="texto_pequeno">R$69,99</s>
                    <h3 class="preco">R$59,99</h3>
        
                    <button class="card"> <!--Botão de comprar-->
                      <img src="../imagens/Icons/carrinho.png" alt="Carrinho" class="botao_card">
                      <p class="botao_card">Comprar!</p>
                    </button>
                  </div>
                  <!--Fim do CARD 4-->

                  <!--CARD 5-->
                  <div class="card">
                    <div class="imagem_card">
                      <img src="../imagens/Produtos/Miku/Imagem1.png" alt="Pelúcia Hatsune Miku" class="foto_card">
                    </div>
          
                    <h4 class="titulo_card">Pelúcia Hatsune Miku</h4>
                    <p class="texto_pequeno">Por apenas</p>
                    <h3 class="preco">R$99,99</h3>
          
                    <button class="card"> <!--Botão de comprar-->
                      <img src="../imagens/Icons/carrinho.png" alt="Carrinho" class="botao_card">
                      <p class="botao_card">Comprar!</p>
                    </button>
                  </div>
                  <!--Fim do CARD 5-->

                  <!--CARD 6-->
                  <div class="card">
                    <div class="imagem_card">
                      <img src="../imagens/Produtos/CuboMagico/imagem1.png" alt="Cubo Magico Tatil" class="foto_card">
                      <img src="../imagens/Selo/Visual.png" alt="Selo de deficiencia visual" class="selo_deficiencia">
                    </div>
          
                    <h4 class="titulo_card">Cubo Magico Tatil</h4>
                    <p class="texto_pequeno">Por apenas</p>
                    <h3 class="preco">R$39,99</h3>
          
                    <button class="card"> <!--Botão de comprar-->
                      <img src="../imagens/Icons/carrinho.png" alt="Carrinho" class="botao_card">
                      <p class="botao_card">Comprar!</p>
                    </button>
                  </div>
                  <!--Fim do CARD 6-->
            </div>
            <div class="vermais"><!--Botão de ver mais-->
                <button class="btn-vermais">Ver Mais</button>
            </div>
        </div>
    </div>
    <script>
        function updateDisplayStyles() {
            const allSelectors = ['.variados', '.categorias', '.inclusivos'];
            const hideSelectors = ['.categorias', '.inclusivos'];

            // Verifica a largura da tela
            if (window.innerWidth > 1024) {
                // Remove display: none; das classes especificadas
                allSelectors.forEach(selector => {
                    const elements = document.querySelectorAll(`${selector}[style*="display: none;"]`);
                    elements.forEach(element => {
                        element.style.display = 'block';
                    });
                });
            } else {
                // Adiciona display: none; para as classes .categorias e .inclusivos
                hideSelectors.forEach(selector => {
                    const elements = document.querySelectorAll(selector);
                    elements.forEach(element => {
                        element.style.display = 'none';
                    });
                });
            }

            // Garante que pelo menos um dos elementos com as classes seja visível
            const visibleElements = document.querySelectorAll('.variados, .categorias, .inclusivos');
            const anyVisible = Array.from(visibleElements).some(element => getComputedStyle(element).display !== 'none');
            
            if (!anyVisible) {
                // Se nenhum elemento está visível, torna o primeiro da lista visível
                const firstElement = document.querySelector('.variados');
                if (firstElement) {
                    firstElement.style.display = 'block';
                }
            }
        }

        // Adiciona um listener para quando o conteúdo da página é carregado
        window.addEventListener('load', updateDisplayStyles);

        // Adiciona um listener para quando a janela é redimensionada
        window.addEventListener('resize', updateDisplayStyles);
    </script>
</body>

</html>