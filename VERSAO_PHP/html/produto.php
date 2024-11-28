<?php
require_once("../Dao/produtoDAO.php");
require_once("../models/brinquedo.php");
require_once("../controller/global.php");
require_once("../controller/conexao.php");
require_once("../Dao/usuarioDAO.php");
require_once("../models/usuario.php");
require_once("../Dao/pedidosDAO.php");

$userDao = new UsuarioDAO($conn,$BASE_URL);
$pedidosDao = new pedidosDao($conn, $BASE_URL);

$usuarioData = $userDao->verificarToken(false);

$prodDAO = new ProdutoDAO($conn,$BASE_URL);
$brinquedo = $prodDAO->pesquisarPorCodigo(codigoBrinq: $_GET['codigo']);
$statusBrinq = $brinquedo->getStatus(); // armazenando status pra exibir mensagem caso essa página não deveria ser acessível

$stmt = $conn->prepare("SELECT * FROM avaliacao WHERE Codigo_Brinq=".$brinquedo->getCodigoBrinq());
$stmt->execute();
$numAvaliacoes = $stmt->rowCount();
$avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt_recentes = $conn->prepare("SELECT * FROM brinquedo WHERE Status <> 1 ORDER BY Codigo_Brinq DESC LIMIT 6");
$stmt_recentes->execute();
$brinquedos_recentes = $stmt_recentes->fetchAll(PDO::FETCH_ASSOC);

$imagens[] = $prodDAO->pesquisarImagemPorCodigoBrinq($brinquedo->getCodigoBrinq());
$contador = 0;

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

error_reporting(E_ERROR | E_PARSE);

if($usuarioData){
$brinquedosComprados = $pedidosDao->getBrinqPedidos($usuarioData->getCodigo());

// inicializa como false
$brinquedoAtualComprado = false;

if($brinquedosComprados !== false){
foreach ($brinquedosComprados as $brinquedoComprado) {
    if ($brinquedoComprado->getCodigoBrinq() == $brinquedo->getCodigoBrinq()) {
        $brinquedoAtualComprado = true;
        break; // caso encontre um brinquedo que foi comprado, marca como true e termina o foreach
    }
  }
}
}
?>
<script>
    let notas = [0, 1, 2, 3, 4, 5]; // inicializando como vetor
    let quantidade = [0, 0, 0, 0, 0, 0];

    <?php
    foreach ($avaliacoes as $avaliacao) {
        $nota = (double) $avaliacao['Nota_Ava']; 
        $notaArredondada = ceil($nota); // arredonda para cima

        if ($notaArredondada >= 0 && $notaArredondada <= 5) {
            echo "quantidade[$notaArredondada]++;\n";
        }
    }
    ?>

</script>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="w" />

    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Criatil - Produto</title>
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
              <?php
                foreach($imagens as $img){
                foreach($img as $imagem){
              ?>
              <div class="swiper-slide">
                <div class="center_imagem">
                <img
                src=<?php echo("../imagens/Produtos/".$imagem->getImagem().".jpeg"); ?>
                alt="Primeira imagem"
                class="imagem_maior carrossel"
                />
                </div>
              </div>
              <?php $contador++;} }?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </section>
        <!--Fim carrossel-->

        <div class="imagens_menores">
          <!--Imagens pequnas que ficam ao lado da maior-->

          <?php
             $imagem = $imagens[0];
  
             if(count($imagens)>=1){
              $imagem1 = $imagem[0];
             ?>
              <div
              class="imagem_menor"
              onclick="mudarImagem('<?php echo "../imagens/Produtos/".$imagem1->getImagem().".jpeg"; ?>','block','none','none')"
            >
              <img
                src=<?php echo("../imagens/Produtos/".$imagem1->getImagem().".jpeg");?>
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
              onclick="mudarImagem('<?php echo "../imagens/Produtos/".$imagem1->getImagem().".jpeg"; ?>','none','block','none')"
            >
              <img
                src=<?php echo("../imagens/Produtos/".$imagem1->getImagem().".jpeg");?>
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
              onclick="mudarImagem('<?php echo "../imagens/Produtos/".$imagem1->getImagem().".jpeg"; ?>','none','none','block')"
            >
              <img
                src=<?php echo("../imagens/Produtos/".$imagem1->getImagem().".jpeg");?>
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
          src="<?php echo("../imagens/Produtos/".$imagem1->getImagem().".jpeg");?>"
          alt="Imagem maior do produto"
          class="imagem_maior"
          id="imagem_maior"
        />
        <!--Imagem maior do produto-->

        <div class="detalhes">
          <!--Div que contem os detalhes dos produtos-->
          <h3 class="titulo"><?php echo($brinquedo->getNomeBrinq());?></h3>
          <!--Nome do produto-->
          <?php
           $codigoCat = $brinquedo->getCodigoCategoria();
           $stmt = $conn->query("SELECT * FROM categoria WHERE Codigo_Categoria = ".$codigoCat);
           $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
           ?>
          <div class="categoria">
            <a class="categoria"><?php echo($categoria['Nome_Categoria']); ?></a>
          </div>
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
          <?php echo($brinquedo->getDescricao());?>
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
              class="input-qntd"
            />
            <button id="increment" onclick="stepper(this)" class="quantidade">
              +
            </button>
          </div>
          <form action="../controller/desejosProccess.php" class="form" method="POST">
          <input type="hidden" name="Operacao" value="Adicionar">
          <input type="hidden" name="codigoUsu" value=<?php 
          if($usuarioData){
            echo($usuarioData->getCodigo());
          }else{
            echo("");
          } ?>> 
          <input type="hidden" name="codigoBrinq" value=<?php echo($_GET['codigo'])?>>
          <button class="comprar">
            <p class="comprar">Adicionar à lista de desejos</p>
          </button>
          </form>

          <form action="../controller/carrinhoProccess.php" class="form" method="POST">
          <input type="hidden" name="Operacao" value="Adicionar">
          <input type="hidden" name="Codigo" value=<?php echo($_GET['codigo'])?>>
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
            foreach ($brinquedos_recentes as $brinquedo) {
              // seleciona a img do brinquedo atual
              $stmt = $conn->query("SELECT Imagem FROM imagem WHERE Codigo_Brinq = " . $brinquedo['Codigo_Brinq'] . " ORDER BY Num_Imagem LIMIT 1");
              $imagem = $stmt->fetch(PDO::FETCH_ASSOC);

              $stmt2 = $conn->query("SELECT Imagem_Selo FROM selo WHERE Codigo_Selo = " . $brinquedo['Codigo_Selo']);
              $selo = $stmt2->fetch(PDO::FETCH_ASSOC);
          ?>
          <!--Div que contem os elementos do card-->
          <div class="card swiper-slide">
            <div class="imagem_card">
            <img src=<?php echo("../imagens/Produtos/".$imagem['Imagem'].".jpeg"); ?> class="foto_card">
              <?php  if ($selo['Imagem_Selo'] != null) { ?>
                <img src="<?php echo "../imagens/Selo/".$selo['Imagem_Selo'].".jpeg"; ?>" class="selo">
                <?php } ?>
            </div>
            <h4 class="titulo_card"><?php echo $brinquedo['Nome_Brinq']; ?></h4>
            <h3 class="preco">R$<?php echo number_format($brinquedo['Preco_Brinq'], 2, ',', '.'); ?></h3>
            <a href=<?php echo("produto.php?codigo=" . $brinquedo['Codigo_Brinq'] )?>>
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

      <?php if ($brinquedoAtualComprado == true) { ?>
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
          <h3 class="titulo_input_ava">Nota (0-5)</h3>
          <input type="text" name="Nota_Ava" class="num_estrelas" placeholder="Digite uma nota" oninput="validarNota(this)">
          <script>
function validarNota(input) {
    // remove o que não for número
    input.value = input.value.replace(/[^0-9.,]/g, ''); 

    // substitui ponto por vírgula
    input.value = input.value.replace('.', ','); 

    // se começar com vírgula, adiciona 0 antes
    if (input.value.startsWith(',')) {
        input.value = '0' + input.value;
    }

    const partes = input.value.split(',');

    if (partes[0] && !['0', '1', '2', '3', '4', '5'].includes(partes[0])) {
        input.value = '';
        return;
    }

    // impede a adição de qlqr coisa dps da casa decimal
    if (partes.length > 2) {
        input.value = partes[0] + ',' + partes[1];
    } else if (partes.length === 2) {
        partes[1] = partes[1].substring(0, 1);
        input.value = partes[0] + ',' + partes[1];
    }

    if (partes.length === 2 && partes[1] && partes[1] !== '0' && partes[1] !== '5') {
        input.value = partes[0] + ',';
    }

    if (partes[0] === '5' && partes.length === 2 && partes[1] !== '') {
        input.value = '5';
    }
}
        </script>
          </div>
        </div>
        <div class="comentario">
            <h3 class="titulo_input_ava">Comentário</h3>
        <textarea type="text" maxlength="150" class="comentario" name="Comentario" placeholder="Deixe aqui sua opinião do produto"></textarea>
        </div>
        <div class="botao_ava">
          <button class="add_ava" type="submit">
            <img src="../imagens/Gerente/mais.png" alt="Adicionar" class="add_ava_button">
            <p class="add_ava_button">Adicionar avaliação</p>
          </button>
        </div>
          </div>
      </div>
      <input type="hidden" name="Codigo_Brinq" value=<?php echo($_GET['codigo']) ?>>
      <input type="hidden" name="Tipo" value="Criar">
      </form>
      <?php } ?>
      
      <h2 class="avaliacoes">Avaliações</h2>
      <!--Titulo avaliações-->

      <div class="avaliacao">
        <!--Div que contem toda a parte de avaliações, tanto as estatiticas quanto as avalções em si-->

        <div class="avaliacao">
    <div class="estatisticas">
        <canvas id="graficoAvaliacoes" height="325"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.6/dist/chart.umd.min.js"></script>
        <script>
  Chart.defaults.font.weight = 'bold';
  const ctx = document.getElementById('graficoAvaliacoes').getContext('2d');
  const graficoAvaliacoes = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: notas,
        datasets: [{
            label: 'Quantidade de Avaliações',
            data: quantidade,
            backgroundColor: '#F2AF00',
            color: '#000'
        }]
    },
    options: {
        indexAxis: 'y',
        responsive: true,
        plugins: {
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItems) {
                                return 'Nota: ' + tooltipItems[0].label;
                            },
                            label: function(tooltipItem) {
                                return 'Quantidade de Avaliações: ' + tooltipItem.raw;
                            }
                        }
                    }
                },
        scales: {
            x: {
                beginAtZero: true,
                ticks: {
                  stepSize: 1
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Nota'
                },
                ticks: {
                    stepSize: 1,
                    min: 0,
                    max: 5
                  }
            }
        }
    }
});
        </script>
    </div>
    <!-- Fim estatísticas -->
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
                            echo("../imagens/usuarios/usuario.png"); 
                            
                        }else{
                            echo("../imagens/usuarios/".$imagem['Imagem'].".jpeg");
                        }?>
              alt="Foto de perfil"
              class="foto_perfil"
            /><!--Foto de perifl da avalição-->
            <div class="detalhes_avaliacoes">
              <!--Detalhes como nome do avaliador e a avaliação em si-->

              <div class="nome_avaliacao">
                <h5 class="nome"><?php echo($nome['Nome_Usu']); ?></h5>
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
  <?php
  if ($statusBrinq == 1){
?>
  <script>
    Swal.fire({
      title: 'ATENÇÃO',
      text: 'Você não deveria estar vendo essa página. Só prossiga se souber o que está fazendo.',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Voltar',
      confirmButtonText: 'Continuar',
    }).then((result) => {
      if (result.isConfirmed) {
      } else {
        window.history.back(); // caso usuário selecione voltar, redireciona pra página anterior
      }
    });
  </script>
<?php } ?>
  <head>
  <link rel="stylesheet" href="../css/produto.css" />
  <link rel="stylesheet" href="../css/card.css" />
  </head>
</html>
