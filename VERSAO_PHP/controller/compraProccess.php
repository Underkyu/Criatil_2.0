<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/CompraDAO.php");
require_once("../models/message.php");
require_once("../models/pedido.php");
require_once("../Dao/carrinhoDAO.php");


$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$compraDao = new compraDao($conn,$BASE_URL);
$carrinhoDao = new carrinhoDao($conn,$BASE_URL);

    $codigoUsu = filter_input(INPUT_POST,"codigoUsu");
    $dataPedido = filter_input(INPUT_POST,"dataPedido");
    $precoTotal = filter_input(INPUT_POST,"precoTotal");
    $statusPedido = filter_input(INPUT_POST,"statusPedido");
    $formaPagamento = filter_input(INPUT_POST,"formaPagamento");
    $cupom = filter_input(INPUT_POST,"cupom");

    if ($formaPagamento != "vazio"){
        $pedido = new Pedido();

    $pedido->setCodigoUsu($codigoUsu);
    $pedido->setDataPedido($dataPedido);
    $pedido->setPrecoTotal($precoTotal);
    $pedido->setStatusPedido($statusPedido);
    $pedido->setFormaPagamento($formaPagamento);
    $pedido->setCodigoCupom($cupom);

    $compraDao->setPedido($pedido);

    $lastInsertId = $conn->lastInsertId();

    $carrinho = $carrinhoDao->getCarrinho();
    
    $contador = 0;

    foreach ($carrinho as $produto) {
        $brinqVendido = new BrinqVendido();

        $brinqVendido->setCodigoPedido($lastInsertId);
        $brinqVendido->setCodigoBrinq($produto);
        $brinqVendido->setQuantidade($carrinhoDao->getItemQuantidade($contador));

        $compraDao->setBrinqVendido($brinqVendido);
        
        $contador++;
}

        $carrinhoDao->deletarTodosItensCarrinho();

        $message->setMessage("Compra finalizada", "Sua compra foi realizada com sucesso", "success", "../html/principal.php");
    }else{
        $message->setMessage("Escolha o método de pagamento","Escolha um método de pagamento para proseguir com a compra","error","back");
    }

?>