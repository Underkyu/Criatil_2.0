<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/carrinhoDAO.php");
require_once("../models/message.php");


$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$carrinhoDao = new carrinhoDao($conn,$BASE_URL);

$operacao = filter_input(INPUT_POST,"Operacao"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo
$codigo = filter_input(INPUT_POST,"Codigo"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo
$carrinho = $carrinhoDao->getCarrinho() ;

if($operacao == "Adicionar"){
    foreach($carrinho as $produto){
        if($produto == $codigo){
            $flag = true;
        }
    }

    if($flag == false){
        $a = $carrinho;
        $carrinhoDao->adicionarItemCarrinho($codigo);
        $message->setMessage("Adicionado","Item adicionado no carrinho ","success","back");
    }
    else{
        $message->setMessage("Brinquedo já adicionado ", "Este brinquedo já foi adicionado no carrinho", "error", "back");
    }
}else if($operacao == "Deletar"){
    $carrinhoDao->deletarTodosItensCarrinho();
    $message->setMessage("Itens deletados","Todos os itens dos carrinhos foram deletados","success","back");
}

?>