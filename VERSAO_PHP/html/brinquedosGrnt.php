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
    <title>Brinquedos cadastrados</title>
    <link rel="stylesheet" href="../css/brinquedosGrnt.css">
    <script src="../js/grntPesquisa.js"></script>
    <script src="../js/grntInsert.js"></script>
</head>
<body>
    <?php include("headerGrnt.php") ?>


<!-- essa é a página de gerente mais atualizada
 o que falta fazer nela:
 -botão de editar funcionar (deve ser bem fácil, vou fzr dps do insert funcionar)
 -botão de insert (ver comentários no fundo do código) -->


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
                        // seleciona a img do brinquedo
                        $stmt = $conn->query("SELECT Imagem FROM imagem WHERE Codigo_Brinq = " . $brinquedo['Codigo_Brinq']);
                        $imagem = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>

                <div class="brinquedo"> 
                    <div class="foto">
                        <img src="<?php echo $imagem['Imagem']; ?>" alt="Pelucia Miku" class="foto"><!--Foto-->
                    </div>
                    <p class="informacao"><?php echo $brinquedo['Nome_Brinq']; ?></p> <!--Nome-->
                    <p class="informacao"><?php echo $brinquedo['Codigo_Brinq']; ?></p> <!--Id-->
                    <p class="informacao">R$<?php echo number_format($brinquedo['Preco_Brinq'], 2, ',', '.'); ?></p> <!--Valor-->

                    
                    <div class="botao_editar">
                        <button class="editar">Editar</button>
                    </div>
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
    </div>

<!-- form pra dar insert nos brinquedos -->
<div id="form-container" class="formInsert">
    <form method="POST" id="formInsert-Brinquedo" class="formInsert-Brinquedo" action="../controller/produtoProcess.php">
        <h2>Adicionar Brinquedo</h2>
        <p> LEIA COMENTÁRIOS EM BAIXO DO BOTÃO NO CÓDIGO </p>
        
        <input type="text" id="nome" name="Nome_Brinq" placeholder="Nome">
        
        <select name="Codigo_Selo" class="select-form">
            <option value="" selected disabled hidden>Selo</option> 
            <!-- a select é uma input que seleciona entre os selos disponíveis no banco - "selected disabled hidden" 
             pode parecer engraçado mas serve pra deixar selecionado como 1ª opção,
             desligar como opção e deixar escondido ao expandir -->
            <?php foreach ($selos as $selo) { ?>
                <option value="<?php echo $selo['Codigo_Selo']; ?>"><?php echo $selo['Nome_Selo']; ?></option>
            <?php } ?>
        </select>

        <select name="Codigo_Categoria" class="select-form">
            <option value="" selected disabled hidden>Categoria</option>
                        <!-- a select é uma input que seleciona entre os selos disponíveis no banco - "selected disabled hidden" 
             pode parecer engraçado mas serve pra deixar selecionado como 1ª opção,
             desligar como opção e deixar escondido ao expandir -->
            <?php foreach ($categorias as $categoria) { ?>
                <option value="<?php echo $categoria['Codigo_Categoria']; ?>"><?php echo $categoria['Nome_Categoria']; ?></option>
            <?php } ?>
        </select>
        
        <input type="text" id="preco" name="Preco_Brinq" placeholder="Preço">
        
        <input type="text" name="Nota" placeholder="Nota">
        
        <input type="text" name="Fabricante" placeholder="Fabricante">
        
        <input type="text" name="Descricao" placeholder="Descrição">
        
        <input type="text" name="Faixa_Etaria" placeholder="Faixa Etária">

        <input type="file" name="Imagem">

        <input type="hidden" name="Tipo" value="Inserir">
        <button type="submit">Confirmar</button> 
        <!-- pro insert funcionar ainda precisa:
             - ver sobre a inserção em foreign key (imagem) no produtoprocess -> produtodao
             - arrumar a msg do sweetalert que por algum motivo só aparece quando
             coloca o header normal, mas não vai de jeito nenhum com o headerGrnt
             - arrumar essa chain de insert produto em geral
             - ver como funciona inserir arquivo (tentar deixar opcional por enquanto? sla)
         -->
    </form>
</div>
</body>
</html>