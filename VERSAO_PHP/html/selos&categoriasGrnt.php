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
    <div class="boxes">

        <div class="catdiv">
        <h2 class="titulo">Categorias</h2>
            <div class="fundo"> <!--Fundo azul que fica atrás dos brinquedos-->
                <div class="box_brinquedos" id="brinquedos-container"><!--Div que contem os brinquedos-->
                    <div class="titulos"> <!--Titulos que mostram a qual informação o valor é relativo-->
                        <div class="titulo">ID</div>
                        <div class="titulo">Nome</div>
                    </div>
                    
                        <?php 
                            foreach ($categorias as $categoria) {
                        ?>
                            <div class="brinquedo" id="cats"> 
                                <p class="informacao"><?php echo $categoria['Codigo_Categoria']; ?></p> <!--Id-->
                                <p class="informacao"><?php echo $categoria['Nome_Categoria']; ?></p> <!--Nome-->
                            </div>
                        <?php } ?>

                </div>
            </div>
        </div>

        <div class="selodiv">
        <h2 class="titulo">Selos</h2>
            <div class="fundo"> <!--Fundo azul que fica atrás dos brinquedos-->
                <div class="box_brinquedos" id="brinquedos-container"><!--Div que contem os brinquedos-->
                    <div class="titulos"> <!--Titulos que mostram a qual informação o valor é relativo-->
                        <div class="titulo">Imagem</div>
                        <div class="titulo">ID</div>
                        <div class="titulo">Nome</div>
                    </div>

                        <?php 
                            foreach ($selos as $selo) {
                        ?>
                            <div class="brinquedo"> 
                            <div class="foto">
                            <img src=<?php echo $selo['Imagem_Selo']; ?> alt="Imagem do Selo" class="foto"><!--Imagem-->
                            </div>
                                <p class="informacao"><?php echo $selo['Codigo_Selo']; ?></p> <!--Id-->
                                <p class="informacao"><?php echo $selo['Nome_Selo']; ?></p> <!--Nome-->
                            </div>
                        <?php } ?>

                </div>
            </div>
        </div>
    </div>

        <!-- 
        <div class="acoes">
            <button class="adicionar" id="btnAdicionar">Adicionar categoria</button>
            <div class="pesquisar">
                <input type="text" id="txtPesquisa" class="pesquisar" placeholder="Pesquisar categoria">
            </div>
        </div>
    </div>
        -->
<!-- form de adicionar  -->
<div id="form-container1" class="formInsert">
    <form method="POST" id="formInsert-Brinquedo" class="formInsert-Brinquedo" action="../controller/produtoProcess.php">
    <h2>Adicionar Categoria</h2>
    <div class="div-q-separa-socorro">
    <div class="form-div"><!-- div q contém as inputs -->
        <input type="text" name="Descricao" placeholder="Descrição" required>
        
        <input type="text" name="Faixa_Etaria" placeholder="Faixa Etária" required>
    </div>
        <input type="hidden" name="Tipo" value="Inserir">
        <div class="div-btn">
        <button type="submit">Confirmar</button> 
    </form>
</div>
</div>
</div>
</div>
    <?php include("footer.php") ?>
</body>
</html>