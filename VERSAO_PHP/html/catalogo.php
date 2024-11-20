<?php
require_once("../controller/conexao.php");
require_once("../controller/global.php");

// verifica se tem brinquedos na sessão (são armazenados pela pesquisa)
if (isset($_SESSION['produtos'])) {
    $brinquedos = $_SESSION['produtos'];
    unset($_SESSION['produtos']); // tira da sessão depois de aplicar na pág
} else {
    $stmt = $conn->prepare("SELECT * FROM brinquedo WHERE Status <> 1");
    $stmt->execute();
    
    $brinquedos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/catalogo.css">
    <script src="../js/catalogo.js" defer></script>
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Criatil - Catalogo</title><!--Página de catálogo-->
</head>

<body>
    <?php include("header.php") ?>
    <div class="containerCatalogo"><!--Container de todo conteúdo-->
        <div class="filtros"><!--Caixa dos filtros-->
            <div class="titulofiltro">
                <h1 class="filtros-titulo">FILTROS</h1>
            </div>
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
                        <form method="POST" action="../controller/produtoProcess.php">
                            <!--Filtro por preço-->
                            <div class="formItem">
                            <input type="radio" class="radioButton" name="precoFix" id="radioPreco1" value="0-45" />
                            <label>Até R$45</label>
                            </div>
                            <div class="formItem">
                            <input type="radio" class="radioButton" name="precoFix" id="radioPreco2" value="45-100" />
                            <label>R$45 - R$100</label>
                            </div>
                            <div class="formItem">
                            <input type="radio" class="radioButton" name="precoFix" id="radioPreco3" value="100+" />
                            <label>Acima de R$100</label>
                            </div>
                            <div class="faixaPreco2">
                            <div class="faixaPreco">
                                <input type="text" class="inputPreco" name="precoMin" id="filtroPrecoMin" placeholder="Min" oninput="validarNumero(this)">
                                <p>-</p>
                                <input type="text" class="inputPreco" name="precoMax" id="filtroPrecoMax" placeholder="Max" oninput="validarNumero(this)">
                            </div>
                                <button type="submit" class="filtrarbotao">Filtrar</button>
                            </div>
                            <input type="hidden" name="Tipo" value="Filtragem" />
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
                                <input type="checkbox" class="checkbox" name="categoriaBoneco" id="checkCategoria1" /><label>Arte</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaCarrinhos" id="checkCategoria2" /><label>Carrinhos</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaPelucia" id="checkCategoria3" /><label>Cartas</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaTecnicos" id="checkCategoria4" /><label>Educativos</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaEletronicos" id="checkCategoria5" /><label>Eletrônica</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaArtisticos" id="checkCategoria6" /><label>Esportes</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaArtisticos" id="checkCategoria6" /><label>Funko Pop</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaArtisticos" id="checkCategoria6" /><label>Pelúcias</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaArtisticos" id="checkCategoria6" /><label>Quebra-Cabeças</label>
                            </div>
                            <div class="formItem">
                                <input type="checkbox" class="checkbox" name="categoriaArtisticos" id="checkCategoria6" /><label>Tabuleiro</label>
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
            </div>
            <div class="produtos">
                        <!-- parte dos cards -->

                   <?php /* if (empty($brinquedos)): */ ?>
                   <!--<h1 class="no-products">Nenhum produto encontrado.</h1>-->
                   <?php /* else: */ ?>
                   <!-- essas linhas comentadas servem pra fazer aparecer algo na página
                        caso não tenha produtos armazenados na sessão, mas decidi deixar
                        comentado e usar o sistema de mensagens mesmo. facilmente
                        alterável caso seja necessário -->

                   <?php
                        foreach ($brinquedos as $brinquedo) {
                        $stmt = $conn->query("SELECT Imagem FROM imagem WHERE Codigo_Brinq = " . $brinquedo['Codigo_Brinq'] . " ORDER BY Num_Imagem LIMIT 1");
                        $imagem = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="card swiper-slide">
                        <div class="imagem_card">
                            <img src="<?php echo "../imagens/Produtos/".$imagem['Imagem'].".jpeg"; ?>" class="foto_card">
                        </div>
                        <h4 class="titulo_card"><?php echo $brinquedo['Nome_Brinq']; ?></h4>
                        <h3 class="preco">R$<?php echo number_format($brinquedo['Preco_Brinq'], 2, ',', '.'); ?></h3>
                        <a href=<?php print_r("produto.php?codigo=" . $brinquedo['Codigo_Brinq'] )?>>
                        <button class="card">
                            <img src="../imagens/Icons/carrinho.png" alt="Carrinho" class="botao_card">
                            <p class="botao_card">Comprar!</p>
                        </button>
                        </a>
                    </div>
                    <?php } ?>

                    <?php /* endif; */ ?>

                    </div>
                        <!-- fim da parte dos cards -->

        <?php if (!empty($brinquedos)): ?>
        <div class="vermais">
                <button class="btn-vermais">Ver Mais</button>
            </div>
            <?php endif; ?>
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
<script>
  function validarNumero(input) {
    // remove o que não for número
    input.value = input.value.replace(/[^0-9,\.]/g, ''); 

    // substitui ponto por vírgula no filtro
    input.value = input.value.replace('.', ','); 

    // limita a duas casas decimais
    const partes = input.value.split(',');
    if (partes.length > 1 && partes[1].length > 2) {
        input.value = partes[0] + ',' + partes[1].substring(0, 2);
    }

    // impede a adição de qlqr coisa dps das 2 casas decimais
    if (partes.length > 2) {
    input.value = partes[0] + ',' + partes[1];
    }
  }
</script>
    <?php include("footer.php") ?>

</body>
</html>
