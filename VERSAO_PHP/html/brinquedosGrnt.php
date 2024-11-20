<?php
require_once("../controller/conexao.php");
require_once("../controller/global.php");
require_once("../Dao/produtoDAO.php");

$stmt = $conn->prepare("SELECT * FROM brinquedo");
$stmt->execute();

$brinquedos = $stmt->fetchAll(PDO::FETCH_ASSOC);
// coloca os dados da tabela em um vetor

$produtoDao = new ProdutoDAO($conn, $BASE_URL); // inicialização do produtoDao pra fazer o insert

$selos = $produtoDao->getSelos();
$categorias = $produtoDao->getCategorias();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Brinquedos cadastrados</title>
    <link rel="stylesheet" href="../css/brinquedosGrnt.css">
    <script src="../js/grntPesquisa.js" ></script>
    <script src="../js/grntImgPreview.js" ></script>
    <script src="../js/grntDetalhes.js" ></script>
    <script src="../js/grntInsert.js" ></script>
</head>
<body>
    <?php include("headerGrnt.php") ?>

<!--
 o que falta fazer aqui:
 -responsividade do form: botão de x (fechar) pra telas menores
-->

    <div class="container">
        <h1 class="titulo">Brinquedos Cadastrados</h1> <!--Titulo em cima da caixa dos brinquedos-->
        <div class="fundo"> <!--Fundo azul que fica atrás dos brinquedos-->
            <div class="box_brinquedos" id="brinquedos-container"><!--Div que contem os brinquedos-->

                <div class="titulos"> <!--Titulos que mostram a qual informação o valor é relativo-->
                    <div class="titulo">Foto</div>
                    <div class="titulo">Nome</div>
                    <div class="titulo">ID</div>
                    <div class="titulo">Valor</div>
                    <div class="titulo">Editar Brinquedo</div>
                </div>

                <!--começo da div que contém um dos brinquedos-->

                <?php 
                    foreach ($brinquedos as $brinquedo) {
                        $status = $brinquedo['Status']; // criando variável que recebe a status do brinquedo atual

                        // seleciona a img do brinquedo
                        $stmt = $conn->query("SELECT * FROM imagem WHERE Codigo_Brinq = " . $brinquedo['Codigo_Brinq'] . " ORDER BY Num_Imagem");
                        $imagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                        // Verifique se há imagens antes de tentar acessá-las
                        if(!empty($imagens)) {
                            $imagem1 = $imagens[0]; // First image
                            $imagem2 = isset($imagens[1]) ? $imagens[1] : null;
                            $imagem3 = isset($imagens[2]) ? $imagens[2] : null;
                        }else {
                            $imagem1 = null;
                            $imagem2 = null;
                            $imagem3 = null;
                        }
                             
                        if ($status == 1) {
                            $classeAdd = 'brinquedo-oculto';
                        } elseif ($status == 0) {
                            $classeAdd = '';
                        }
                            
                ?>
                <div class="brinquedo <?php echo $classeAdd; ?>"> 
                    <div class="foto">
                        <img src=<?php echo("../imagens/Produtos/".$imagem1['Imagem'].".jpeg"); ?> alt="Foto do Brinquedo" class="foto"><!--Foto-->
                    </div>
                    <p class="informacao"><?php echo $brinquedo['Nome_Brinq']; ?></p> <!--Nome-->
                    <p class="informacao"><?php echo $brinquedo['Codigo_Brinq']; ?></p> <!--Id-->
                    <p class="informacao">R$<?php echo number_format($brinquedo['Preco_Brinq'], 2, ',', '.'); ?></p> <!--Valor-->

                    
                    <form method="POST" class="form-flex">
                            <div class="botao_detalhes">
                            <!-- 'data-' é um tipo de atributo q guarda data; nesse caso tá guardando
                                  a info do usuário do foreach atual e enviando pro JS (grntDetalhes.js),
                                  que vai colocar essa informação no form usando as IDs das inputs -->
                                  <button type="button" class="detalhes" 
                                    data-tipo="brinquedo"
                                    data-codigoselo="<?php echo $brinquedo['Codigo_Selo']; ?>"
                                    data-codigocate="<?php echo $brinquedo['Codigo_Categoria']; ?>"
                                    data-codigobrinq="<?php echo $brinquedo['Codigo_Brinq']; ?>"
                                    data-nomebrinq="<?php echo $brinquedo['Nome_Brinq']; ?>"
                                    data-preco="<?php echo $brinquedo['Preco_Brinq']; ?>"
                                    data-nota="<?php echo $brinquedo['Nota']; ?>"
                                    data-fabri="<?php echo $brinquedo['Fabricante']; ?>"
                                    data-desc="<?php echo $brinquedo['Descricao']; ?>"
                                    data-faixa="<?php echo $brinquedo['Faixa_Etaria']; ?>"
                                    data-status="<?php echo $brinquedo['Status']; ?>"
                                    data-nimagem1="<?php echo $imagem1['Imagem']; ?>"
                                    <?php if($imagem2 != null){ ?>
                                    data-nimagem2="<?php echo $imagem2['Imagem']; ?>"
                                    <?php } ?>
                                    <?php if($imagem3 != null){ ?>
                                    data-nimagem3="<?php echo $imagem3['Imagem']; ?>"
                                    <?php } ?>
                                    data-codigoimagem1="<?php echo $imagem1['Codigo_Imagem'] ?? ''; ?>"
                                    data-codigoimagem2="<?php echo $imagem2['Codigo_Imagem'] ?? ''; ?>"
                                    data-codigoimagem3="<?php echo $imagem3['Codigo_Imagem'] ?? ''; ?>">
                                    Editar
                                </button>
                            </div>
                    </form>
                    </div>
                <?php } ?>
                <!--fim da div que contém um dos brinquedos-->
            </div>
        </div>
        <div class="acoes">
            <button class="adicionar" id="btnAdicionar">Adicionar brinquedo</button>
            <div class="pesquisar">
                <input type="text" id="txtPesquisa" class="pesquisar" placeholder="Pesquisar brinquedo">
            </div>
        </div>

<!-- form de adicionar brinquedos -->
<div id="form-container1" class="formInsert">
    <form method="POST" id="formInsert-Brinquedo" class="formInsert-Brinquedo" action="../controller/produtoProcess.php" enctype="multipart/form-data">
    <h2>Adicionar Brinquedo</h2>
    <div class="div-q-separa-socorro">
    <div class="form-div"><!-- div q contém as inputs -->

        <div class="select-input">
            <label for="selectSelo">Selo:</label>
            <select name="Codigo_Selo" id="selectSelo" class="select-form" required>
                <option value="" selected disabled hidden></option> 
                <!-- a select é uma input que seleciona entre os selos disponíveis no banco - "selected disabled hidden" 
                    serve pra deixar selecionado como 1ª opção, desligar como opção e deixar escondido ao expandir -->
                    <?php foreach ($selos as $selo) { ?>
                        <option required name="Codigo_Selo" value="<?php echo $selo['Codigo_Selo'];?>"><?php echo $selo['Nome_Selo']; ?></option>
                    <?php } ?>
            </select>
        </div>

            <div class="select-input">
            <label for="selectCate">Categoria:</label>
            <select name="Codigo_Categoria" id="selectCate" class="select-form" required>
                <option value="" selected disabled hidden></option>
                    <?php foreach ($categorias as $categoria) { ?>
                        <option required name="Codigo_Categoria" value="<?php echo $categoria['Codigo_Categoria'];?>"><?php echo $categoria['Nome_Categoria']; ?></option>
                    <?php } ?>
            </select>
        </div>

        <input type="text" id="nome" name="Nome_Brinq" placeholder="Nome" required>
                
        <input type="number" step="0.01" min="0.01" name="Preco_Brinq" placeholder="Preço" required>
        
        <input type="number" step="0.5" min="0" max="5" name="Nota" placeholder="Nota" required>
        
        <input type="text" name="Fabricante" placeholder="Fabricante" required>
        
        <input type="text" name="Descricao" placeholder="Descrição" required>
        
        <input type="text" name="Faixa_Etaria" placeholder="Faixa Etária" required>
    </div>
        <div class="form-div-img">
            <div class="imagens-container">

                <div class="imagem-input">
                    <div class="img-form">
                    <div class="coluna">
                    <label class="label-principal">Imagem Principal:</label>
                    <label for="inserirImagem1" class="input-img">Escolher..</label>
                    </div>
                    <img id="Imagem1A" src="" class="imagemPreview" style="display:none;">
                    </div>
                    <input type="file" id="inserirImagem1" name="Imagem1" placeholder="Caminho da Imagem" class="arquivo-input" required>
                </div>

                <div class="imagem-input">
                    <div class="img-form">
                    <div class="coluna">
                    <label class="label-form">Imagem 2 (opcional):</label>
                    <label for="inserirImagem2" class="input-img">Escolher..</label>
                    </div>
                    <img id="Imagem2A" src="" class="imagemPreview" style="display:none;">
                    </div>
                    <input type="file" id="inserirImagem2" name="Imagem2" placeholder="Caminho da Imagem" class="arquivo-input">
                </div>

                <div class="imagem-input">
                    <div class="img-form">
                    <div class="coluna">
                    <label class="label-form">Imagem 3 (opcional):</label>
                    <label for="inserirImagem3" class="input-img">Escolher..</label>
                    </div>
                    <img id="Imagem3A" src="" class="imagemPreview" style="display:none;">
                    </div>
                    <input type="file" id="inserirImagem3" name="Imagem3" placeholder="Caminho da Imagem" class="arquivo-input">
                </div>
            </div>
        </div>
        </div>
        <div class="btn-form">
        <input type="hidden" name="Tipo" value="Inserir">
        <button type="submit">Confirmar</button> 
        <div class="checkbox-div">
        <label for="Status">Oculto</label>
        <input type="checkbox" name="Status" id="StatusInsert" value="1">
        </div>
        </div>
    </form>
</div>


<!-- form de edição de brinquedos -->
<div id="form-container" class="formInsert">
    <form method="POST" id="formInsert-Brinquedo" class="formInsert-Brinquedo" action="../controller/produtoProcess.php" enctype="multipart/form-data">
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
                    <div class="img-form">
                    <div class="coluna">
                    <label class="label-principal">Imagem Principal:</label>
                    <label for="inserirImagem1E" class="input-img">Escolher..</label>
                    </div>
                    <img id="Imagem1E" src="" class="imagemPreview" style="display:none;">
                    </div>
                    <input type="file" id="inserirImagem1E" name="Imagem1" placeholder="Caminho da Imagem" class="arquivo-input">
                </div>

                <div class="imagem-input">
                    <div class="img-form">
                    <div class="coluna">
                    <label class="label-form">Imagem 2 (opcional):</label>
                    <label for="inserirImagem2E" class="input-img">Escolher..</label>
                    </div>
                    <img id="Imagem2E" src="" class="imagemPreview" style="display:none;">
                    </div>
                    <input type="file" id="inserirImagem2E" name="Imagem2" placeholder="Caminho da Imagem" class="arquivo-input">
                </div>

                <div class="imagem-input">
                    <div class="img-form">
                    <div class="coluna">
                    <label class="label-form">Imagem 3 (opcional):</label>
                    <label for="inserirImagem3E" class="input-img">Escolher..</label>
                    </div>
                    <img id="Imagem3E" src="" class="imagemPreview" style="display:none;">
                    </div>
                    <input type="file" id="inserirImagem3E" name="Imagem3" placeholder="Caminho da Imagem" class="arquivo-input">
                </div>

    </div>
        <input type="hidden" id="codigoImagem1" name="codigoImagem1">
        <input type="hidden" id="codigoImagem2" name="codigoImagem2">
        <input type="hidden" id="codigoImagem3" name="codigoImagem3">
        <input type="hidden" name="Tipo" value="Atualizar">
        </div>
        </div>
        <div class="btn-form">
        <button type="submit">Atualizar</button> 
        <div class="checkbox-div">
        <label for="Status">Oculto</label>
        <input type="checkbox" name="Status" id="Status" value="1">
        </div>
        </div>
    </form>
</div>
</div>
    <?php include("footer.php") ?>
</body>
</html>