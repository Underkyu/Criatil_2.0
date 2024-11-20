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
    <script src="../js/grntInsert.js"></script>
</head>
<body>
<?php include("headerGrnt.php"); ?>
<div class="container">
    <div class="boxes">

        <div class="catdiv">
        <h2 class="titulo">Categorias Cadastradas</h2>
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
                        <div class="titulo">ID</div>
                        <div class="titulo">Nome</div>
                    </div>

                        <?php 
                            foreach ($selos as $selo) {
                        ?>
                            <div class="brinquedo"> 
                            <div class="foto">
                            <?php if($selo['Imagem_Selo'] == "") { ?>
                                    <img src="../imagens/Selo/Sem-Selo.png" alt="Sem Selo" class="foto">
                            <?php } else { ?>
                                <img src=<?php echo "../imagens/Selo/".$selo['Imagem_Selo'].".png"; ?> alt="Imagem do Selo" class="foto"><!--Imagem-->
                            <?php } ?>
                            </div>
                                <p class="informacao"><?php echo $selo['Codigo_Selo']; ?></p> <!--Id-->
                                <p class="informacao"><?php echo $selo['Nome_Selo']; ?></p> <!--Nome-->
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
        <input type="text" name="Nome" placeholder="Nome da Categoria" required>
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
    <form method="POST" id="formInsert-Selo" class="formInsert-Brinquedo" action="../controller/seloProcess.php">
    <h2>Adicionar Selo</h2>
    <div class="div-q-separa-socorro">
    <div class="form-div"><!-- div q contém as inputs -->
        <input type="text" name="Nome" placeholder="Nome do selo" required> 
        <input type="text" name="Imagem" placeholder="Nome da imagem do selo" required>
    </div>
        <input type="hidden" name="Tipo" value="Inserir">
        </div>
        <div class="div-btn">
        <button type="submit">Confirmar</button> 
        </div>
    </form>
</div>
</div>

<?php include("footer.php"); ?>
</body>
</html>