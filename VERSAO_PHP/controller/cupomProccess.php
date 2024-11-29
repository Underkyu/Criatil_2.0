<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/cupomDAO.php");
require_once("../models/cupom.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$cupomDao = new cupomDao($conn,$BASE_URL);

//$operacao = filter_input(INPUT_POST,"Operacao"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo

$cupom_nome = filter_input(INPUT_POST,"cupomCliente");

$cupom = $cupomDao->getCupomPorNome($cupom_nome);

if($cupom != false){
    if($cupom->getStatusCupom() == 0){
        $message->setMessage("O cupom expirou","O cupom informado já expirou","error","back");
        return false;
    }else{
        print_r($cupom);
        $_SESSION['cupom'] = $cupom->getNomeCupom();
        print_r($_SESSION['cupom']);
        $message->setMessage("Cupom inserido com sucesso","O cupom foi inserido com sucesso","success","back");
    }
}else{
    $message->setMessage("Cupom não existe","O cupom informado não existe","error","back");
    return false;
}

?>