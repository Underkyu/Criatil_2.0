<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/compraDAO.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$desejosDao = new desejosDao($conn,$BASE_URL);

$operacao = filter_input(INPUT_POST,"Operacao"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo

if($operacao == "Adicionar"){
    //Pegando valores dos inputs ocultos na paginade conta
    $Codigo_Usu = filter_input(INPUT_POST,"codigoUsu");
    $Codigo_Brinq = filter_input(INPUT_POST,"codigoBrinq");

    $item = new ListaDeFavoritos($conn,$BASE_URL);
    $item->setCodigoBrinq($Codigo_Brinq);
    $item->setCodigoUsu($Codigo_Usu);

    $desejos->setItemLista($item);

    $message->setMessage("Item adicionado","Item adicionado à lista de favoritos com sucesso","success","back");
}





?>