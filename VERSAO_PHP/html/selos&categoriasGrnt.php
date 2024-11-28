<?php
require_once("../controller/conexao.php");
require_once("../controller/global.php");
require_once("../Dao/categoriaDAO.php");
require_once("../Dao/seloDAO.php");


$stmt1 = $conn->prepare("SELECT * FROM categoria");
$stmt1->execute();
$categorias = $stmt1->fetchAll(PDO::FETCH_ASSOC);
$categoriaDao = new CategoriaDAO($conn, $BASE_URL);

$stmt2 = $conn->prepare("SELECT * FROM selo");
$stmt2->execute();
$selos = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$seloDao = new SeloDAO($conn, $BASE_URL);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Criatil Gerentes</title>
    <link rel="stylesheet" href="../css/selos&categoriasGrnt.css">
    <script src="../js/grntInsert.js"></script>
    <script src="../js/grntImgPreview.js"></script>
    <script src="../js/grntDetalhes.js" ></script>
</head>
<body>
<?php include("headerGrnt.php"); ?>
<div class="container" id="container">
    <div class="boxes">

        <div class="catdiv">
        <h2 class="titulo">Categorias Cadastradas</h2>
            <div class="fundo"> <!--Fundo azul que fica atrás dos brinquedos-->
                <div class="box_brinquedos" id="brinquedos-container"><!--Div que contem os brinquedos-->
                    <div class="titulos"> <!--Titulos que mostram a qual informação o valor é relativo-->
                        <div class="titulo">Nome</div>
                        <div class="titulo">Código</div>
                        <div class="titulo">Editar Categoria</div>
                    </div>
                    
                        <?php 
                            foreach ($categorias as $categoria) {
                        ?>
                            <div class="brinquedo" id="cats"> 
                                <p class="informacao"><?php echo $categoria['Nome_Categoria']; ?></p> <!--Nome-->
                                <p class="informacao"><?php echo $categoria['Codigo_Categoria']; ?></p> <!--Id-->
                                <form method="POST" class="form-flex">
                                        <div class="botao_detalhes">
                                            <!-- 'data-' é um tipo de atributo q guarda data; nesse caso tá guardando
                                                a info do usuário do foreach atual e enviando pro JS (grntDetalhes.js),
                                                que vai colocar essa informação no form usando as IDs das inputs -->
                                            <button type="button" class="detalhes" 
                                                data-tipo="categoria"
                                                data-nomecat="<?php echo $categoria['Nome_Categoria']; ?>"
                                                data-codigocat="<?php echo $categoria['Codigo_Categoria']; ?>">
                                                Editar
                                            </button>
                                        </div>
                                    </form>
                            </div>
                        <?php } ?>

                </div>
            </div>
            <div class="acoes">
            <button class="adicionar" id="btnAdicionarCategoria">Adicionar categoria</button>
        </div>
        </div>

        <div class="selodiv">
        <h2 class="titulo">Selos Cadastrados</h2>
            <div class="fundo"> <!--Fundo azul que fica atrás dos brinquedos-->
                <div class="box_brinquedos" id="brinquedos-container"><!--Div que contem os brinquedos-->
                    <div class="titulos"> <!--Titulos que mostram a qual informação o valor é relativo-->
                        <div class="titulo">Imagem</div>
                        <div class="titulo">Nome</div>
                        <div class="titulo">Código</div>
                        <div class="titulo">Editar Selo</div>
                    </div>

                        <?php 
                            foreach ($selos as $selo) {
                        ?>
                            <div class="brinquedo"> 
                            <div class="foto">
                            <?php if($selo['Imagem_Selo'] == "") { ?>
                                    <img src="../imagens/Selo/Sem-Selo.png" alt="Sem Selo" class="foto">
                            <?php } else { ?>
                                    <img src=<?php echo("../imagens/Selo/".$selo['Imagem_Selo'].".jpeg"); ?> alt="Imagem do Selo" class="foto"><!--Imagem-->
                            <?php } ?>
                            </div>
                                <p class="informacao"><?php echo $selo['Nome_Selo']; ?></p> <!--Nome-->
                                <p class="informacao"><?php echo $selo['Codigo_Selo']; ?></p> <!--Id-->
                                    <form method="POST" class="form-flex">
                                        <div class="botao_detalhes">
                                            <!-- 'data-' é um tipo de atributo q guarda data; nesse caso tá guardando
                                                a info do usuário do foreach atual e enviando pro JS (grntDetalhes.js),
                                                que vai colocar essa informação no form usando as IDs das inputs -->
                                            <button type="button" class="detalhes" 
                                                data-tipo="selo"
                                                data-imagemselo="<?php echo $selo['Imagem_Selo']; ?>"
                                                data-nomeselo="<?php echo $selo['Nome_Selo']; ?>"
                                                data-codigoselo="<?php echo $selo['Codigo_Selo']; ?>">
                                                Editar
                                            </button>
                                        </div>
                                    </form>
                            </div>
                        <?php } ?>

                </div>
            </div>
            <div class="acoes">
            <button class="adicionar" id="btnAdicionarSelo">Adicionar selo</button>
        </div>
        </div>
    </div>

<!-- form de adicionar categoria -->
<div id="form-container2" class="formInsert">
    <form method="POST" id="formInsert-Categoria" class="formInsert-Brinquedo" action="../controller/categoriaProcess.php">
    <h2>Adicionar Categoria</h2>
    <div class="div-q-separa-socorro">
    <div class="form-div"><!-- div q contém as inputs -->
        <div class="select-input">
            <label for="Nome">Nome da Categoria:</label>
            <input type="text" name="Nome" id="Nome" placeholder="Nome da Categoria" required>
        </div>
        </div>
        <input type="hidden" name="Tipo" value="Inserir">
        </div>
        <div class="div-btn">
        <button type="submit">Confirmar</button> 
        </div>
    </form>
</div>

<!-- form de adicionar selo -->
<div id="form-container3" class="formInsert">
    <form method="POST" id="formInsert-Selo" class="formInsert-Brinquedo" action="../controller/seloProcess.php" enctype="multipart/form-data">
    <h2>Adicionar Selo</h2>
    <div class="div-q-separa-socorro">
    <div class="form-div"><!-- div q contém as inputs -->
        <div class="select-input">
            <label for="Nome">Nome do Selo:</label>
            <input type="text" name="Nome" id="Nome" placeholder="Nome do selo" required>
        </div>
        <label for="Imagem" class="input-img">Imagem do selo</label>
        <input type="file" name="Imagem" id="Imagem" class="arquivo-input" required>
        <p>Preview da Imagem:</p>
            <img id="Imagem1A" src="" class="imagemPreview" style="display:none;">
    </div>
        <input type="hidden" name="Tipo" value="Inserir">
        </div>
        <div class="div-btn">
        <button type="submit">Confirmar</button> 
        </div>
    </form>
</div>

<!-- form de editar categoria -->
<div id="form-container-categoria" class="formInsert" style="display:none;">
    <form method="POST" id="formEdit-Categoria" class="formInsert-Brinquedo" action="../controller/categoriaProcess.php">
        <h2>Editar Categoria</h2>
        <div class="div-q-separa-socorro">
            <div class="form-div">
                <div class="select-input">
                    <label for="nomecat">Nome da Categoria:</label>
                    <div class="inputPopUp">
                    <input type="text" id="nomecat" name="Nome" placeholder="Nome da Categoria" required>
                    </div>
                </div>
                <input type="hidden" id="codigocat" name="Codigo" required>
            </div>
            <input type="hidden" name="Tipo" value="Atualizar">
        </div>
        <div class="div-btn">
        <button type="submit">Confirmar</button> 
            <!--
            <button type="submit" class="delet-btn" name="Tipo" value="Deletar">Deletar</button> 
                            -->
        </div>
    </form>
</div>

<!-- form de editar selo -->
<div id="form-container-selo" class="formInsert" style="display:none;">
    <form method="POST" id="formEdit-Selo" class="formInsert-Brinquedo" action="../controller/seloProcess.php" enctype="multipart/form-data">
        <h2>Editar Selo</h2>
        <div class="div-q-separa-socorro">
            <div class="form-div">
                <div class="select-input">
                    <label for="nomeSelo">Nome do Selo:</label>
                    <input type="text" id="nomeSelo" name="Nome" placeholder="Nome do Selo" required>
                </div>
                <input type="hidden" id="codigoSelo" name="Codigo" required>
                <label for="ImagemSelo" class="input-img">Imagem do selo</label>
                <input type="file" name="Imagem" id="ImagemSelo" class="arquivo-input">
                <p>Preview da Imagem:</p>
                <img id="ImagemSeloE" src="" class="imagemPreview" style="display:none;">
            </div>
            <input type="hidden" name="Tipo" value="Atualizar">
        </div>
        <div class="div-btn">
            <button type="submit">Confirmar</button> 
            <!--
            <button type="submit" class="delet-btn" name="Tipo" value="Deletar">Deletar</button> 
                            -->
        </div>
    </form>
</div>
</div>
<div class="div_footer">
<?php include("footerGrnt.php"); ?>
</div>
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