<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/desejosDAO.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$desejosDao = new desejosDao($conn,$BASE_URL);

$operacao = filter_input(INPUT_POST,"Operacao"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo

if($operacao == "Adicionar"){
    //Pegando valores dos inputs ocultos na paginade conta
    $Codigo_Usu = filter_input(INPUT_POST,"codigoUsu");
    $Codigo_Brinq = filter_input(INPUT_POST,"codigoBrinq");

    if($Codigo_Usu == ""){
        $message->setMessage("Por favor faça login","É necessário fazer login para adicionar itens à lista de favoritos","error","back");
    }

    else{
    if($desejosDao->checarSeExiste($Codigo_Usu, $Codigo_Brinq)){
    $item = new ListaDeFavoritos($conn,$BASE_URL);
    $item->setCodigoBrinq($Codigo_Brinq);
    $item->setCodigoUsu($Codigo_Usu);

    $desejosDao->setItemLista($item);

    $message->setMessage("Item adicionado","Item adicionado à lista de favoritos com sucesso","success","back");
    }else{
        $message->setMessage("Item já adicionado","Esse item já foi adicionado na lista de desejos","error","back");
    }
}
}else if($operacao == "Excluir"){
    $Codigo_Usu = filter_input(INPUT_POST,"codigoUsu");
    $Codigo_Brinq = filter_input(INPUT_POST,"codigoBrinq");

    $desejosDao->deletaritem($Codigo_Usu,$Codigo_Brinq);

    $message->setMessage("Item excluido","O item foi excluido da lista de desejos","success","back");
}
?>