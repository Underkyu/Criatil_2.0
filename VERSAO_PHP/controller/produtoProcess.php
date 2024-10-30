<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/produtoDAO.php");
require_once("../models/brinquedo.php");
require_once("../models/message.php");

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
    $imagemBrinq = filter_input(INPUT_POST, "Imagem");

    if($codSelo && $codCat && $nomeBrinq && $precoBrinq && $notaBrinq && $fabriBrinq && $descBrinq && $faixaBrinq && $imagemBrinq){ //Verifica se todos os campos estão preenchidos
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
                $imagem->setImagem($imagemBrinq);

                $produtoDao->criarP($produto);
    }else{
        $message->setMessage("Campos vazios","Alguns campos não foram preenchidos, tente novamente","error","back");
    }
}


if($tipo === "Pesquisa"){ // entra aqui caso $tipo tenha o valor Pesquisa
    $nomeBrinq = filter_input(INPUT_POST, "Nome_Brinq");

    if($nomeBrinq){ // verifica se o campo está preenchido
        $produtoDao = new ProdutoDAO($conn,$BASE_URL);
        $produtos = $produtoDao->pesquisarPorNome($nomeBrinq);

        if($produtos){
            $_SESSION['produtos'] = $produtos;
            header("Location: ../html/catalogo.php");
        } else{
            $message->setMessage("Nenhuma correspondência","Nenhum brinquedo encontrado","error","../html/catalogo.php");
        }
    }else{
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }   
}
?>