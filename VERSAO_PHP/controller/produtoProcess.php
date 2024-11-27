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

    $status = filter_input(INPUT_POST, "Status", FILTER_VALIDATE_INT);
    if ($status === null) {
        $status = 0;  // se não estiver marcada, retorna 0 (não oculto)
    }

    if($codSelo && $codCat){
        if($nomeBrinq === null || $nomeBrinq === "" || $precoBrinq === null || $precoBrinq === "" ||
         $notaBrinq === null || $notaBrinq === "" || $fabriBrinq === null || $fabriBrinq === "" ||
          $descBrinq === null || $descBrinq === "" || $faixaBrinq === null || $faixaBrinq === ""){
            $message->setMessage("Campos vazios","Alguns campos não foram preenchidos, tente novamente","error","back");
            exit();
        }

        $produto = new Produto();
        $produto->setCodigoSelo($codSelo);
        $produto->setCodigoCategoria($codCat);
        $produto->setNomeBrinq($nomeBrinq);
        $produto->setPrecoBrinq($precoBrinq);
        $produto->setNota($notaBrinq);
        $produto->setFabricante($fabriBrinq);
        $produto->setDescricao($descBrinq);
        $produto->setFaixaEtaria($faixaBrinq);
        $produto->setStatus($status);


     //Parte que cria imagem
     $imagem = new Imagem();
     
    $imageNome = $imagem->imageGenerateName();
    $imageNome2 = $imagem->imageGenerateName();
    $imageNome3 = $imagem->imageGenerateName();

     if(isset($_FILES["Imagem1"]) && !empty($_FILES["Imagem1"]["tmp_name"])){
        $image = $_FILES["Imagem1"];
        $tiposImagem = ["image/jpeg", "image/jpg", "image/png"];
        $jpgArray = ["image/jpeg","image/jpg"];

        if(in_array($image["type"],$tiposImagem)){
            if(in_array($image["type"],$jpgArray)){
                $imagefile = imagecreatefromjpeg($image["tmp_name"]);
            }else{//Imagem é png
                $imagefile = imagecreatefrompng($image["tmp_name"]);
            }

            // Salva a imagem como JPEG no diretório especificado 
            if (imagejpeg($imagefile, "../imagens/Produtos/" . $imageNome .".jpeg", 100)) {
                
                $imagem->setImagem($imageNome);
                $imagem->setNumImagem(1); // associa numimagem1 a imagem1
            } else {
                $message->setMessage("Erro!", "Erro ao salvar a imagem #1","error","back");
            }

            // se tiver segunda imagem
            if (isset($_FILES["Imagem2"]) && !empty($_FILES["Imagem2"]["tmp_name"])) {
                $image2 = $_FILES["Imagem2"];
                if (in_array($image2["type"], $tiposImagem)) {
                    if (in_array($image2["type"], $jpgArray)) {
                        $imagefile2 = imagecreatefromjpeg($image2["tmp_name"]);
                    } else {
                           $imagefile2 = imagecreatefrompng($image2["tmp_name"]);
                    }
                    if (imagejpeg($imagefile2, "../imagens/Produtos/" . $imageNome2 . "_2.jpeg", 100)) {
                        $imagem2 = new Imagem();
                        $imagem2->setImagem($imageNome2 . "_2");
                        $imagem2->setNumImagem(2); // associa numimagem2 a imagem2
                    }
                }
            }
    
            // se tiver terceira imagem
            if (isset($_FILES["Imagem3"]) && !empty($_FILES["Imagem3"]["tmp_name"])) {
                $image3 = $_FILES["Imagem3"];
                if (in_array($image3["type"], $tiposImagem)) {
                    if (in_array($image3["type"], $jpgArray)) {
                        $imagefile3 = imagecreatefromjpeg($image3["tmp_name"]);
                    } else {
                        $imagefile3 = imagecreatefrompng($image3["tmp_name"]);
                    }
                    if (imagejpeg($imagefile3, "../imagens/Produtos/" . $imageNome3 . "_3.jpeg", 100)) {
                        $imagem3 = new Imagem();
                        $imagem3->setImagem($imageNome3 . "_3");
                        $imagem3->setNumImagem(3); // associa numimagem3 a imagem3
                    }
                }
            }

    }else{
        $message->setMessage("Erro!","Tipo de imagem inválido, insira um arquivo .PNG ou .JPG","error","back");
    }

        
            // variável codigoBrinq recebe o retorno da função criarP (o lastinsertid)
            $codigoBrinq = $produtoDao->criarP($produto);
            if($codigoBrinq !== false){
            // envia a instância da imagem e a variável codigoBrinq pra inserir a imagem
            if($produtoDao->inserirImagem($imagem, $codigoBrinq)){
                $message->setMessage("Sucesso", "O brinquedo foi adicionado ao catálogo com sucesso.", "success", "back");
            }
            if (isset($imagem2)) { // se tiver imagem #2
                $produtoDao->inserirImagem($imagem2, $codigoBrinq);
            }
            if (isset($imagem3)) { // se tiver imagem #3
                $produtoDao->inserirImagem($imagem3, $codigoBrinq);
            }
        }else{
            $message->setMessage("Erro!", "Erro ao inserir o brinquedo no catálogo", "error", "back");
        }
    } else {
        $message->setMessage("Campos vazios","Por favor, envie uma imagem para o produto.","error","back");
    }
}
}elseif($tipo === "Atualizar") {

    $codSelo = filter_input(INPUT_POST, "Codigo_Selo");
    $codCat = filter_input(INPUT_POST,"Codigo_Categoria");
    $codigoBrinq = filter_input(INPUT_POST, "codigoBrinq");
    $nomeBrinq = filter_input(INPUT_POST,"Nome_Brinq");
    $precoBrinq = filter_input(INPUT_POST,"Preco_Brinq");
    $precoBrinq = str_replace(',', '.', $precoBrinq);
    $notaBrinq = filter_input(INPUT_POST,"Nota");
    $notaBrinq = str_replace(',', '.', $notaBrinq);
    $fabriBrinq = filter_input(INPUT_POST,"Fabricante");
    $descBrinq = filter_input(INPUT_POST,"Descricao");
    $faixaBrinq = filter_input(INPUT_POST,"Faixa_Etaria");
    $status = filter_input(INPUT_POST, "Status", FILTER_VALIDATE_INT);
    if ($status === null) {
        $status = 0;  // se não estiver marcada, retorna 0 (não oculto)
    }

    $produto = new Produto();
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

    // Parte que cria imagem
    $codigoImagem1 = filter_input(INPUT_POST, "codigoImagem1");
    $codigoImagem2 = filter_input(INPUT_POST, "codigoImagem2");
    $codigoImagem3 = filter_input(INPUT_POST, "codigoImagem3");

    $tiposImagem = ["image/jpeg", "image/jpg", "image/png"];
    $jpgArray = ["image/jpeg", "image/jpg"];

    // imagem principal
    if (isset($_FILES["Imagem1"]) && !empty($_FILES["Imagem1"]["tmp_name"])) {
        $image = $_FILES["Imagem1"];
        if (in_array($image["type"], $tiposImagem)) {
            if (in_array($image["type"], $jpgArray)) {
                $imagefile = imagecreatefromjpeg($image["tmp_name"]);
            } else { // Imagem é png
                $imagefile = imagecreatefrompng($image["tmp_name"]);
            }

            // Salva a imagem como JPEG no diretório especificado 
            $imageNome = pathinfo($image["name"], PATHINFO_FILENAME);
            if (imagejpeg($imagefile, "../imagens/Produtos/" . $imageNome . ".jpeg", 100)) {
                $produtoDao->editaImagem($imageNome, $codigoImagem1, $codigoBrinq, 1);
            } else {
                $message->setMessage("Erro!", "Erro ao salvar a imagem #1", "error", "back");
            }
        } else {
            $message->setMessage("Erro!", "Tipo da imagem #1 incorreto", "error", "back");
        }
    }

        // se tiver imagem #2
    if (isset($_FILES["Imagem2"]) && !empty($_FILES["Imagem2"]["tmp_name"])) {
        $image2 = $_FILES["Imagem2"];
        if (in_array($image2["type"], $tiposImagem)) {
            if (in_array($image2["type"], $jpgArray)) {
                $imagefile2 = imagecreatefromjpeg($image2["tmp_name"]);
            } else {
                $imagefile2 = imagecreatefrompng($image2["tmp_name"]);
            }
            $imageNome2 = pathinfo($image2["name"], PATHINFO_FILENAME);
            if (imagejpeg($imagefile2, "../imagens/Produtos/" . $imageNome2 . "_2.jpeg", 100)) {
                $produtoDao->editaImagem($imageNome2 . "_2", $codigoImagem2, $codigoBrinq, 2); // Corrigido para incluir "_2"
            } else {
                $message->setMessage("Erro", "Erro ao atualizar a imagem #2", "error", "back");
            }
        } else {
            $message->setMessage("Erro", "Tipo da imagem #2 incorreto", "error", "back");
        }
    }

    // se tiver imagem #3
    if (isset($_FILES["Imagem3"]) && !empty($_FILES["Imagem3"]["tmp_name"])) {
        $image3 = $_FILES["Imagem3"];
        if (in_array($image3["type"], $tiposImagem)) {
            if (in_array($image3["type"], $jpgArray)) {
                $imagefile3 = imagecreatefromjpeg($image3["tmp_name"]);
            } else {
                $imagefile3 = imagecreatefrompng($image3["tmp_name"]);
            }
            $imageNome3 = pathinfo($image3["name"], PATHINFO_FILENAME);
            if (imagejpeg($imagefile3, "../imagens/Produtos/" . $imageNome3 . "_3.jpeg", 100)) {
                $produtoDao->editaImagem($imageNome3 . "_3", $codigoImagem3, $codigoBrinq, 3); // Corrigido para incluir "_3"
            } else {
                $message->setMessage("Erro", "Erro ao atualizar a imagem #3", "error", "back");
            }
        } else {
            $message->setMessage("Erro", "Tipo da imagem #3 incorreto", "error", "back");
        }
    }

    // Atualiza o produto no banco de dados
    if ($produtoDao->atualizaP($produto, $codigoBrinq)) {
        $message->setMessage("Sucesso", "O brinquedo foi atualizado com sucesso.", "success", "back");
    } else {
        $message->setMessage("Erro", "Erro ao atualizar o brinquedo.", "error", "back");
    }
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


    $precoFix = filter_input(INPUT_POST, "precoFix");

    if (isset($precoFix)) {
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
    }elseif(!empty($precoMin || !empty($precoMax))){
        $precoMin = filter_var($precoMin, FILTER_VALIDATE_FLOAT);
        $precoMax = filter_var($precoMax, FILTER_VALIDATE_FLOAT);
        if(($precoMin > $precoMax) && (!empty($precoMin) && !empty($precoMax))){
            $message->setMessage("Parâmetros incorretos", "Por favor tente novamente.", "error", "back");
            exit();
        }
    }
    if((empty($precoMax) || empty($precoMin)) && (!isset($precoFix))){
        $message->setMessage("Campos vazios", "Por favor, insira algo nos campos.", "warning", "back");
        exit();
    }

    if(isset($precoMin) && isset($precoMax)){
    $produtos = $produtoDao->filtraProdutos($precoMin, $precoMax);
    $_SESSION['produtos'] = $produtos;
    header("Location: ../html/catalogo.php");
    }
}elseif($tipo === "FiltragemC"){
    $categoriaArte = filter_input(INPUT_POST, 'categoriaArte');
    $categoriaCarrinhos = filter_input(INPUT_POST, 'categoriaCarrinhos');
    $categoriaCartas = filter_input(INPUT_POST, 'categoriaCartas');
    $categoriaEducativos = filter_input(INPUT_POST, 'categoriaEducativos');
    $categoriaEletronica = filter_input(INPUT_POST, 'categoriaEletronica');
    $categoriaEsportes = filter_input(INPUT_POST, 'categoriaEsportes');
    $categoriaFunko = filter_input(INPUT_POST, 'categoriaFunko');
    $categoriaPelucias = filter_input(INPUT_POST, 'categoriaPelucias');
    $categoriaQuebra = filter_input(INPUT_POST, 'categoriaQuebra');
    $categoriaTabuleiro = filter_input(INPUT_POST, 'categoriaTabuleiro');

    if (!empty($categoriaArte)) {
        $categoria = $categoriaArte;
    } elseif (!empty($categoriaCarrinhos)) {
        $categoria = $categoriaCarrinhos;
    } elseif (!empty($categoriaCartas)) {
        $categoria = $categoriaCartas;
    } elseif (!empty($categoriaEducativos)) {
        $categoria = $categoriaEducativos;
    } elseif (!empty($categoriaEletronica)) {
        $categoria = $categoriaEletronica;
    } elseif (!empty($categoriaEsportes)) {
        $categoria = $categoriaEsportes;
    } elseif (!empty($categoriaFunko)) {
        $categoria = $categoriaFunko;
    } elseif (!empty($categoriaPelucias)) {
        $categoria = $categoriaPelucias;
    } elseif (!empty($categoriaQuebra)) {
        $categoria = $categoriaQuebra;
    } elseif (!empty($categoriaTabuleiro)) {
        $categoria = $categoriaTabuleiro;
    }

    if(!empty($categoria)){
        $produtos = $produtoDao->filtraCategorias($categoria);
        $_SESSION['produtos'] = $produtos;
        header("Location: ../html/catalogo.php");
    }

}elseif($tipo === "FiltragemS"){
    $defVisual = filter_input(INPUT_POST, 'defVisual');
    $defMotor = filter_input(INPUT_POST, 'defMotor');
    $defAuditivo = filter_input(INPUT_POST, 'defAuditivo');

    if (!empty($defVisual)) {
        $selo = $defVisual;
    } elseif (!empty($defMotor)) {
        $selo = $defMotor;
    } elseif (!empty($defAuditivo)) {
        $selo = $defAuditivo;
    }

    if(!empty($selo)){
        $produtos = $produtoDao->filtraSelos($selo);
        $_SESSION['produtos'] = $produtos;
        header("Location: ../html/catalogo.php");
    }
}else{
    $message->setMessage("Erro!","Informações invalidas","warning","back");
}
?>