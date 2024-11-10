<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/compraDAO.php");
require_once("../models/message.php");
require_once("../models/pedido.php");
require_once("../Dao/usuarioDAO.php");


$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$compraDao = new compraDao($conn,$BASE_URL);

    $codigoUsu = filter_input(INPUT_POST,"codigoUsu");
    $dataPedido = filter_input(INPUT_POST,"dataPedido");
    $precoTotal = filter_input(INPUT_POST,"precoTotal");
    $statusPedido = filter_input(INPUT_POST,"statusPedido");
    $formaPagamento = filter_input(INPUT_POST,"formaPagamento");
    $cupom = filter_input(INPUT_POST,"cupom");

    $pedido = new Pedido();

    $pedido->setCodigoUsu($codigoUsu);
    $pedido->setDataPedido($dataPedido);
    $pedido->setPrecoTotal($precoTotal);
    $pedido->setStatusPedido($statusPedido);
    $pedido->setFormaPagamento($formaPagamento);
    $pedido->setCodigoCupom($cupom);

    $compraDao->buildPedido($pedido);

?>