<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/produtoDAO.php");
require_once("../models/brinquedo.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$produtoDao = new ProdutoDAO($conn,$BASE_URL);

$tipo = filter_input(INPUT_POST,"Tipo"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo

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