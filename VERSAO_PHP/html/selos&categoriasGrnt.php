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
    <title>Categorias & Selos</title>
    <link rel="stylesheet" href="../css/selos&categoriasGrnt.css">
    <script src="../js/grntPesquisa.js"></script>
    <script src="../js/grntInsert.js"></script>
    <script src="../js/grntDetalhes.js"></script>
    <script src="../js/grntImgPreview.js"></script>
</head>
<body>
    <?php include("headerGrnt.php") ?>

    <div class="container">
        <h1 class="titulo">Categorias & Selos</h1> <!--Titulo em cima da caixa dos brinquedos-->
        <div class="fundo"> <!--Fundo azul que fica atrás dos brinquedos-->
            <div class="box_brinquedos" id="brinquedos-container"><!--Div que contem os brinquedos-->

                <div class="titulos"> <!--Titulos que mostram a qual informação o valor é relativo-->
                    <div class="titulo">ID</div>
                    <div class="titulo">Nome</div>
                </div>

                <!--começo da div que contém uma das categorias-->

                <?php 
                    foreach ($categorias as $categoria) {
                ?>

                <div class="brinquedo"> 
                    <p class="informacao"><?php echo $categoria['Codigo_Categoria']; ?></p> <!--Id-->
                    <p class="informacao"><?php echo $categoria['Nome_Categoria']; ?></p> <!--Nome-->
                </div>

                <?php } ?>

                <!--fim da div que contém uma das categorias-->
                
            </div>
        </div>
        <div class="acoes">
            <button class="adicionar" id="btnAdicionar">Adicionar categoria</button>
            <div class="pesquisar">
                <input type="text" id="txtPesquisa" class="pesquisar" placeholder="Pesquisar categoria">
            </div>
        </div>
    </div>

<!-- form de adicionar categorias -->
<div id="form-container1" class="formInsert">
    <form method="POST" id="formInsert-Brinquedo" class="formInsert-Brinquedo" action="../controller/produtoProcess.php">
    <h2>Adicionar Categoria</h2>
    <div class="div-q-separa-socorro">
    <div class="form-div"><!-- div q contém as inputs -->
        
        <input type="text" name="Descricao" placeholder="Descrição" required>
        
        <input type="text" name="Faixa_Etaria" placeholder="Faixa Etária" required>
    </div>
    <div class="form-div-img">
    <div class="imagens-container">
        <div class="imagem-input">
            <label>Imagem Principal:</label>
            <input type="text" id="inserirImagem1" name="Imagem1" placeholder="Caminho da Imagem" required>
            <div class="preview-div" id="inserirPreviewdiv1">
                <label>Preview da imagem:</label>
                <img id="inserirPreview1" src="" class="imagemPreview">
            </div>
            <input type="hidden" name="numImagem1" value="1">
        </div>
        
        <div class="imagem-input">
            <label>Imagem 2 (opcional):</label>
            <input type="text" id="inserirImagem2" name="Imagem2" placeholder="Caminho da Imagem">
            <div class="preview-div" id="inserirPreviewdiv2">
                <label>Preview da imagem:</label>
                <img id="inserirPreview2" src="" class="imagemPreview">
            </div>
            <input type="hidden" name="numImagem2" value="2">
        </div>

        <div class="imagem-input">
            <label>Imagem 3 (opcional):</label>
            <input type="text" id="inserirImagem3" name="Imagem3" placeholder="Caminho da Imagem">
            <div class="preview-div" id="inserirPreviewdiv3">
                <label>Preview da imagem:</label>
                <img id="inserirPreview3" src="" class="imagemPreview">
            </div>
            <input type="hidden" name="numImagem3" value="3">
        </div>
    </div>
        <input type="hidden" name="Tipo" value="Inserir">
        </div>
        </div>
        <div class="div-btn">
        <button type="submit">Confirmar</button> 
        </div>
    </form>
</div>


<!-- form de edição de brinquedos -->
<div id="form-container" class="formInsert">
    <form method="POST" id="formInsert-Brinquedo" class="formInsert-Brinquedo" action="../controller/produtoProcess.php">
    <h2>Editar Brinquedo</h2>
    <div class="div-q-separa-socorro">
    <div class="form-div"><!-- div q contém as inputs -->

        <div class="select-input">
            <label for="selectSelo">Selo:</label>
            <select name="Codigo_Selo" id="codigoSelo" class="select-form" required>
                <option value="" selected disabled hidden></option> 
                <?php foreach ($selos as $selo) { ?>
                    <option required name="Codigo_Selo" value="<?php echo $selo['Codigo_Selo'];?>"><?php echo $selo['Nome_Selo']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="select-input">
            <label for="selectCate">Categoria:</label>
            <select name="Codigo_Categoria" id="codigoCate" class="select-form" required>
                <option value="" selected disabled hidden></option>
                <?php foreach ($categorias as $categoria) { ?>
                    <option required name="Codigo_Categoria" value="<?php echo $categoria['Codigo_Categoria'];?>"><?php echo $categoria['Nome_Categoria']; ?></option>
                <?php } ?>
            </select>
        </div>

        <input type="hidden" id="codigoBrinq" name="codigoBrinq" required>

        <input type="text" id="nomeBrinq" name="Nome_Brinq" placeholder="Nome" required>
                
        <input type="number" id="precoBrinq" step="0.01" min="0.01" name="Preco_Brinq" placeholder="Preço" required>
        
        <input type="number" id="notaBrinq" step="0.5" min="0" max="5" name="Nota" placeholder="Nota" required>
        
        <input type="text" id="fabriBrinq" name="Fabricante" placeholder="Fabricante" required>
        
        <input type="text" id="descBrinq" name="Descricao" placeholder="Descrição" required>
        
        <input type="text" id="faixaBrinq" name="Faixa_Etaria" placeholder="Faixa Etária" required>
    </div>
    <div class="form-div-img"> <!-- div q contém as imagens -->
        
        <div class="imagens-container">
        <div class="imagem-input">
                <label>Imagem Principal:</label>
                <input type="text" id="imagem1" name="Imagem1" placeholder="Caminho da Imagem" required>

                <div class="preview-div" id="previewdiv1">
                <label>Preview da imagem:</label>
                <img id="preview1" src="" class="imagemPreview">
                </div>

                
            </div>
            <div class="imagem-input">
                <label>Imagem 2 (opcional):</label>
                <input type="text" id="imagem2" name="Imagem2" placeholder="Caminho da Imagem">

                <div class="preview-div" id="previewdiv2">
                <label>Preview da imagem:</label>
                <img id="preview2" src="" class="imagemPreview">
                </div>

                
            </div>
            <div class="imagem-input">
                <label>Imagem 3 (opcional):</label>
                <input type="text" id="imagem3" name="Imagem3" placeholder="Caminho da Imagem">

                <div class="preview-div" id="previewdiv3">
                <label>Preview da imagem:</label>
                <img id="preview3" src="" class="imagemPreview">
                </div>

            </div>
        </div>

        <input type="hidden" id="numImagem1" name="numImagem1" value="1">
        <input type="hidden" id="numImagem2" name="numImagem2" value="2">
        <input type="hidden" id="numImagem3" name="numImagem3" value="3"> <!-- sim, todos esses campos hidden são absolutamente necessários -->
        <input type="hidden" id="codigoImagem1" name="codigoImagem1">
        <input type="hidden" id="codigoImagem2" name="codigoImagem2">
        <input type="hidden" id="codigoImagem3" name="codigoImagem3">
        <input type="hidden" name="Tipo" value="Atualizar">
        </div>
        </div>
        <div class="div-btn">
        <button type="submit">Atualizar</button> 
        </div>
    </form>
</div>

    <?php include("footer.php") ?>
</body>
</html>