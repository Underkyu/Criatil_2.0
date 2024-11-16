    <?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/produtoDAO.php");
require_once("../models/brinquedo.php");
require_once("../models/message.php");
require_once("../models/imagem.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$produtoDao = new ProdutoDAO($conn,$BASE_URL);

$tipo = filter_input(INPUT_POST, "Tipo"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo
if($tipo === "Inserir") {

    $codSelo = filter_input(INPUT_POST, "Codigo_Selo");
    $codCat = filter_input(INPUT_POST, "Codigo_Categoria");
    $nomeBrinq = filter_input(INPUT_POST, "Nome_Brinq");
    $precoBrinq = filter_input(INPUT_POST, "Preco_Brinq");
    $notaBrinq = filter_input(INPUT_POST, "Nota");
    $fabriBrinq = filter_input(INPUT_POST, "Fabricante");
    $descBrinq = filter_input(INPUT_POST, "Descricao");
    $faixaBrinq = filter_input(INPUT_POST, "Faixa_Etaria");
    $imagem1 = filter_input(INPUT_POST, "Imagem1");
    $imagem2 = filter_input(INPUT_POST, "Imagem2");
    $imagem3 = filter_input(INPUT_POST, "Imagem3");
    $numImagem1 = filter_input(INPUT_POST, "numImagem1");
    $numImagem2 = filter_input(INPUT_POST, "numImagem2");
    $numImagem3 = filter_input(INPUT_POST, "numImagem3");
    $status = filter_input(INPUT_POST, "Status", FILTER_VALIDATE_INT);
    if ($status === null) {
        $status = 0;  // se não estiver marcada, retorna 0 (não oculto)
    }

    if($codSelo && $codCat){
        if($nomeBrinq === null || $nomeBrinq === "" || $precoBrinq === null || $precoBrinq === "" ||
         $notaBrinq === null || $notaBrinq === "" || $fabriBrinq === null || $fabriBrinq === "" ||
          $descBrinq === null || $descBrinq === "" || $faixaBrinq === null || $faixaBrinq === "" ||
           $imagem1 === null || $imagem1 === "" || $numImagem1 === null || $numImagem1 === ""){
            $message->setMessage("Campos vazios","Alguns campos não foram preenchidos, tente novamente","error","back");
            exit;
        }

        $produto = new Produto();
        $imagem = new Imagem();
        $produto->setCodigoSelo($codSelo);
        $produto->setCodigoCategoria($codCat);
        $produto->setNomeBrinq($nomeBrinq);
        $produto->setPrecoBrinq($precoBrinq);
        $produto->setNota($notaBrinq);
        $produto->setFabricante($fabriBrinq);
        $produto->setDescricao($descBrinq);
        $produto->setFaixaEtaria($faixaBrinq);
        $produto->setStatus($status);
        $imagem->setImagem($imagem1);
        $imagem->setNumImagem($numImagem1);

        // retorna o id do brinquedo criado pra poder cadastrar imagens
        $codigoBrinq = $produtoDao->criarP($produto, $imagem);

        // se a segunda e terceira imagem existir, dá insert nelas
        if(!empty($imagem2)) {
            $imagem = new Imagem();
            $imagem->setImagem($imagem2);
            $imagem->setNumImagem($numImagem2);
            $produtoDao->inserirImagem($imagem, $codigoBrinq);
        }
        if(!empty($imagem3)) {
            $imagem = new Imagem();
            $imagem->setImagem($imagem3);
            $imagem->setNumImagem($numImagem3);
            $produtoDao->inserirImagem($imagem, $codigoBrinq);
        }

        $message->setMessage("Brinquedo inserido", "O novo brinquedo foi adicionado ao catálogo.", "success", "back");
    } else {
        $message->setMessage("Campos vazios","Alguns campos não foram preenchidos, tente novamente","error","back");
    }
}elseif($tipo === "Atualizar") {

    $produto = new Produto();
    $imagem = new Imagem();

    $codSelo = filter_input(INPUT_POST, "Codigo_Selo");
    $codCat = filter_input(INPUT_POST,"Codigo_Categoria");
    $codigoBrinq = filter_input(INPUT_POST, "codigoBrinq");
    $nomeBrinq = filter_input(INPUT_POST,"Nome_Brinq");
    $precoBrinq = filter_input(INPUT_POST,"Preco_Brinq");
    $notaBrinq = filter_input(INPUT_POST,"Nota");
    $fabriBrinq = filter_input(INPUT_POST,"Fabricante");
    $descBrinq = filter_input(INPUT_POST,"Descricao");
    $faixaBrinq = filter_input(INPUT_POST,"Faixa_Etaria");
    $status = filter_input(INPUT_POST, "Status", FILTER_VALIDATE_INT);
    if ($status === null) {
        $status = 0;  // se não estiver marcada, retorna 0 (não oculto)
    }

    $imagem1 = filter_input(INPUT_POST, "Imagem1");
    $imagem2 = filter_input(INPUT_POST, "Imagem2");
    $imagem3 = filter_input(INPUT_POST, "Imagem3");
    $numImagem1 = filter_input(INPUT_POST, "numImagem1");
    $numImagem2 = filter_input(INPUT_POST, "numImagem2");
    $numImagem3 = filter_input(INPUT_POST, "numImagem3");
    $codigoImagem1 = filter_input(INPUT_POST, "codigoImagem1");
    $codigoImagem2 = filter_input(INPUT_POST, "codigoImagem2");
    $codigoImagem3 = filter_input(INPUT_POST, "codigoImagem3");

    $produto->setCodigoSelo($codSelo);
    $produto->setCodigoCategoria($codCat);
    $produto->setCodigoBrinq($codigoBrinq);
    $produto->setNomeBrinq($nomeBrinq);
    $produto->setPrecoBrinq($precoBrinq);
    $produto->setNota($notaBrinq);
    $produto->setFabricante($fabriBrinq);
    $produto->setDescricao($descBrinq);
    $produto->setFaixaEtaria($faixaBrinq);
    $produto->setStatus($status);

    
    $produtoDao->editaImagem($imagem1, $codigoImagem1, $codigoBrinq, $numImagem1);
    $produtoDao->editaImagem($imagem2, $codigoImagem2, $codigoBrinq, $numImagem2);
    $produtoDao->editaImagem($imagem3, $codigoImagem3, $codigoBrinq, $numImagem3);
    

    $produtoDao->atualizaP($produto, true);
}elseif($tipo === "Pesquisa"){ // entra aqui caso $tipo tenha o valor Pesquisa
    $nomeBrinq = filter_input(INPUT_POST, "Nome_Brinq");

    if($nomeBrinq){ // verifica se o campo está preenchido
        $produtoDao = new ProdutoDAO($conn,$BASE_URL);
        $produtos = $produtoDao->pesquisarPorNome($nomeBrinq);

        if($produtos){
            $_SESSION['produtos'] = $produtos;
            header("Location: ../html/catalogo.php");
        } else{
            $_SESSION['produtos'] = [];
            $message->setMessage("Nenhuma correspondência","Nenhum brinquedo encontrado","error","../html/catalogo.php");
        }
    }else{
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }   
}elseif ($tipo === "Filtragem") {
    // recebe como string pra poder trocar , pra .
    $precoMin = filter_input(INPUT_POST, "precoMin");
    $precoMax = filter_input(INPUT_POST, "precoMax");

    if ($precoMin) {
        $precoMin = str_replace(',', '.', $precoMin);
    }
    if ($precoMax) {
        $precoMax = str_replace(',', '.', $precoMax);
    }

    // verifica que os valores recebidos são preços válidos
    $precoMin = filter_var($precoMin, FILTER_VALIDATE_FLOAT);
    $precoMax = filter_var($precoMax, FILTER_VALIDATE_FLOAT);

    $precoFix = filter_input(INPUT_POST, "precoFix");

    if ($precoFix) {
        switch ($precoFix) {
            case '0-45':
                $precoMin = 0;
                $precoMax = 45;
                break;
            case '45-100':
                $precoMin = 45;
                $precoMax = 100;
                break;
            case '100+':
                $precoMin = 100;
                $precoMax = 999999999;
                break;
            default:
                $precoMin = null;
                $precoMax = null;
                break;
        }
    }
    $produtos = $produtoDao->filtraProdutos($precoMin, $precoMax);
    $_SESSION['produtos'] = $produtos;

    if (!$produtos) {
        $message->setMessage("Nenhuma correspondência", "Nenhum brinquedo encontrado", "error", "../html/catalogo.php");
    } else {
        header("Location: ../html/catalogo.php");
    }
}else{
    $message->setMessage("Erro!","Informações invalidas","error","back");
}
?>