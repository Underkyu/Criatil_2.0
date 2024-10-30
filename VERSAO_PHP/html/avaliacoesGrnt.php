<?php
require_once("../controller/conexao.php");
require_once("../controller/global.php");

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

$stmt = $conn->prepare("SELECT * FROM avaliacao");
$stmt->execute();

$avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
// coloca os dados da tabela em um vetor
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Avaliações</title>
    <link rel="stylesheet" href="../css/avaliacoesGrnt.css" />
    <script src="../js/grntPesquisa.js"></script>
  </head>
  <body>
  <?php include("headerGrnt.php") ?>


<!-- USAR brinquedosGrnt.php COMO BASE PRA TERMINAR ESSA PÁG!!!
 o que falta:
 - fazer input de pesquisa funcionar (tá no brinquedosGrnt.php e no grntPesquisa.js)
 - fazer delete de ava funcionar (deve ser bem fácil, faço dps) -->


    <div class="container">
      <h1 class="titulo">Avaliações Recebidas</h1>
        <div class="fundo">
          <!--Fundo azul que fica atrás dos clientes-->
          <div class="box_avaliacao" id="avaliacoes-container">
            <!--Div que contem as avaliacoes-->
            
            <?php 
            foreach ($avaliacoes as $avaliacao) {
              // seleciona a img de usuario da avaliacao atual
              $stmt = $conn->query("SELECT Imagem FROM usuario WHERE Codigo_Usu = " . $avaliacao['Codigo_Usu']);
              $imagem = $stmt->fetch(PDO::FETCH_ASSOC);
              $stmt = $conn->query("SELECT Nome_Usu FROM usuario WHERE Codigo_Usu = " . $avaliacao['Codigo_Usu']);
              $nome = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

              <!--Começo card avaliação-->
              <div class="avaliacao">
                  <img src="<?php echo $imagem['Imagem']; ?>" alt="Foto de perfil" class="foto_perfil"/><!--Foto de perfil da avaliação-->
                  <div class="detalhes_avaliacoes">
                      <div class="nome_avaliacao">
                          <h5 class="nome"><?php echo $nome['Nome_Usu']; ?></h5>
                      </div>
                      <div class="titulo-da-avaliacao">
                          <p class="titulo_avaliacao"><?php echo $avaliacao['Titulo_Ava']; ?></p>
                          <div class="estrelas">
                              <?php echo renderizarEstrelas($avaliacao['Nota_Ava']); ?>
                          </div>
                      </div>
                      <p class="texto_avaliacao"><?php echo $avaliacao['Comentario']; ?></p>
                  </div>
                  <div class="botao_deletar">
                      <button class="deletar">Deletar</button>
                  </div>
              </div>
              <!--Fim card avaliação-->
            
            <?php } ?>

              </div>
          </div>
        </div>
        <div class="acoes">
          <div class="pesquisar">
            <input type="text" id="txtPesquisa" class="pesquisar" placeholder="Pesquisar avaliação"/>
          </div>
        </div>
      </div>
  </body>
</html>
