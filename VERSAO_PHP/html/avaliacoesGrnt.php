<?php
require_once("../controller/conexao.php");
require_once("../controller/global.php");

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
          <div class="box_avaliacao">
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
                    <img src="<?php echo $imagem['Imagem']; ?>" alt="Foto de perfil" class="foto_perfil"/><!--Foto de perifl da avalição-->
                    <div class="detalhes_avaliacoes">
                      <div class="nome_avaliacao">
                        <h5 class="nome"><?php echo $nome['Nome_Usu']; ?></h5>
                        <div class="estrelas">
                          <img src="../imagens/Icons/estrela.png" alt="estrela" class="primeira_estrela" />
                          <img src="../imagens/Icons/estrela.png" alt="estrela" />
                          <img src="../imagens/Icons/estrela.png" alt="estrela" />
                          <img src="../imagens/Icons/estrela.png" alt="estrela" />
                          <img src="../imagens/Icons/meia_estrela.png" alt="meia estrela"/>
                        </div>
                      </div>
                      <p class="titulo_avaliacao"><?php echo $avaliacao['Titulo_Ava']; ?></p>
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
            <input type="text" class="pesquisar" placeholder="Pesquisar brinquedo"/>
          </div>
        </div>
      </div>
  </body>
</html>
