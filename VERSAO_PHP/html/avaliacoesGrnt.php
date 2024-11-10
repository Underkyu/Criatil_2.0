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
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Avaliações</title>
    <link rel="stylesheet" href="../css/avaliacoesGrnt.css" />
    <script src="../js/grntPesquisa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
  <?php include("headerGrnt.php") ?>
  <script>
        // verifica se tem uma msg de sucesso armazenada, e se tiver, exibe
        const message = sessionStorage.getItem('message');
        if (message) {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: message,
                confirmButtonText: 'Ok',
                toast: true
            });
            // limpa a msg
            sessionStorage.removeItem('message');
        }
    </script>
    <div class="container">
      <h1 class="titulo">Avaliações Recebidas</h1>
        <div class="fundo">
          <!--Fundo azul que fica atrás dos clientes-->
          <div class="box_avaliacao" id="avaliacoes-container">
            <!--Div que contem as avaliacoes-->
            
            <?php 
            foreach ($avaliacoes as $avaliacao) {
              // seleciona a img de usuario, nome de usuario e nome de brinquedo da avaliacao atual
              $stmt = $conn->query("SELECT Imagem FROM usuario WHERE Codigo_Usu = " . $avaliacao['Codigo_Usu']);
              $imagem = $stmt->fetch(PDO::FETCH_ASSOC);
              $stmt = $conn->query("SELECT Nome_Usu FROM usuario WHERE Codigo_Usu = " . $avaliacao['Codigo_Usu']);
              $nomeUsu = $stmt->fetch(PDO::FETCH_ASSOC);
              $stmt = $conn->query("SELECT Nome_Brinq FROM brinquedo WHERE Codigo_Brinq = " . $avaliacao['Codigo_Brinq']);
              $nomeBrinq = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

              <!--Começo card avaliação-->
              <div class="avaliacao">
                  <img src=<?php
                        if($imagem['Imagem'] == "vazio") {;
                            print_r("../imagens/usuarios/usuario.png"); 
                            
                        }else{
                            print_r("../imagens/usuarios/".$imagem['Imagem'].".jpeg");
                        }?> alt="Foto de perfil" class="foto_perfil"/><!--Foto de perfil da avaliação-->
                  <div class="detalhes_avaliacoes">
                      <div class="nome_avaliacao">
                          <h5 class="nome"><?php echo $nomeUsu['Nome_Usu']; ?></h5>
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
                    <form method="POST" action="../controller/avaliacaoProcess.php">
                      <input type="hidden" name="Tipo" value="Deletar">
                      <input type="hidden" name="codigoAva" value="<?php echo $avaliacao['Codigo_Ava']; ?>">
                      <input type="hidden" name="nomeUsu" value="<?php echo $nomeUsu['Nome_Usu']; ?>">
                      <button type="button" class="deletar" onclick="confirmDelete(<?php echo $avaliacao['Codigo_Ava']; ?>, '<?php echo $nomeUsu['Nome_Usu']; ?>')">Deletar</button>
                      </form>
                  </div>
              </div>
              <!--Fim card avaliação-->
            
            <?php } ?>

              </div>
          </div>
        <div class="acoes">
          <div class="pesquisar">
            <input type="text" id="txtPesquisa" class="pesquisar" placeholder="Pesquisar avaliação"/>
          </div>
        </div>
      </div>

  <?php include("footer.php") ?>
  </body>
<script>
function confirmDelete(codigoAva, nomeUsu) {
    Swal.fire({
        title: 'Tem certeza?',
        text: "Você confirma a deleção da avaliação de " + nomeUsu + "?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0476D9',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
        allowOutsideClick: false,
        toast: true
    }).then((result) => {
        if (result.isConfirmed) {
            const form = new FormData();
            form.append('Tipo', 'Deletar');
            form.append('codigoAva', codigoAva);
            form.append('nomeUsu', nomeUsu);

            fetch('../controller/avaliacaoProcess.php', { // fetch é praticamente um jeito alternativo de fazer um submit pra enviar formulários
                method: 'POST',
                body: form
            }).then(response => {
                if (response.ok) {
                    // guarda a msg pra ser exibida no script do começo
                    sessionStorage.setItem('message', 'Avaliação removida com sucesso!');
                    // recarrega a pag
                    location.reload();
                }
            });
        }
    });
}
</script>
</html>