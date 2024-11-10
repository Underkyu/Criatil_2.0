<?php 

require_once("../models/pedido.php");
require_once("../models/BrinqVendido.php");
require_once("../models/message.php");

class compraDao {   
    private $conexao;
    private $url;
    private $message;


    public function __construct(PDO $conexao, $url){
        $this->conexao = $conexao;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildPedido($data){
        $pedido = new Pedido();
        $pedido->setCodigoPedido($data["Codigo_Pedido"]);
        $pedido->setCodigoUsu($data["Codigo_Usu"]);
        $pedido->setCodigoCupom($data["Codigo_Cupom"]);
        $pedido->setPrecoTotal($data["Preco_Total"]);
        $pedido->setFormaPagamento($data["Forma_Pagamento"]);
        $pedido->setData($data["Data_Pedido"]);
        $pedido->setStatusPedido($data["Status_Pedido"]);

        return $pedido;

    }

    public function buildBrinqVendido($data){
        $brinqVendido= new BrinqVendido();
        $brinqVendido->setCodigoBrinqVendido($data["Codigo_BrinqVendido"]);
        $brinqVendido->setCodigoPedido($data["Codigo_Pedido"]);
        $brinqVendido->setCodigoBrinq($data["Codigo_Brinq"]);
        $brinqVendido->setQuantidade($data["Quantidade"]);

        return $brinqVendido;

    }
    public function setPedido(Pedido $pedido) {//Funação que irá registrar um pedido no banco de dados
        //Preparando comando sql
        $stmt = $this->conexao->prepare("INSERT INTO pedido(
            Codigo_Usu,Codigo_Cupom,Preco_Total,Forma_Pagamento,Data_Pedido,Status_Pedido
        ) VALUES (
             :codigo_usu, :codigo_cupom, :preco_total, :forma_pagamento, :data_pedido, :status_pedido
        )");
    
        //Pegando as informações do pedido passadoi como parametro e salvando em variaveis
        $codigo_usu = $pedido->getCodigoUsu(); 
        $codigo_cupom = $pedido->getCodigoCupom(); 
        $preco_total = $pedido->getPrecoTotal();
        $forma_pagamento = $pedido->getFormaPagamento();
        $data_pedido =  $pedido->getDataPedido();
        $status_pedido = $pedido->getStatusPedido();   
        
        //Trocando valores no comando sql, pelos valores do objeto de pedido
        $stmt->bindParam(":codigo_usu", $codigo_usu);
        $stmt->bindParam(":codigo_cupom", $codigo_cupom);
        $stmt->bindParam(":preco_total", $preco_total);
        $stmt->bindParam(":forma_pagamento", $forma_pagamento);
        $stmt->bindParam(":data_pedido", $data_pedido);
        $stmt->bindParam(":status_pedido", $status_pedido);

        $stmt->execute();
}
public function setBrinqVendido(BrinqVendido $brinqVendido) {//Funação que irá registrar um brinquedo vendido no banco de dados
    //Preparando comando sql
    $stmt = $this->conexao->prepare("INSERT INTO brinqvendido(
        Codigo_Pedido,Codigo_Brinq,Quantidade
    ) VALUES (
         :codigo_pedido, :codigo_brinq, :quantidade
    )");

    //Pegando as informações do brinquedo vendido passado como parametro e salvando em variaveis
    $codigo_pedido = $brinqVendido->getCodigoPedido();
    $codigo_brinq = $brinqVendido->getCodigoBrinq();
    $quantidade = $brinqVendido->getQuantidade();
    
    //Trocando valores no comando sql, pelos valores do objeto de brinquedo vendido
    $stmt->bindParam(":codigo_pedido", $codigo_pedido);
    $stmt->bindParam(":codigo_brinq", $codigo_brinq);
    $stmt->bindParam(":quantidade", $quantidade);

    $stmt->execute();

}
}