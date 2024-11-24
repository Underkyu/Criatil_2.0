<?php
require_once("../models/pedido.php");
require_once("../models/BrinqVendido.php");
require_once("../models/message.php");

class pedidosDao {   
    private $conexao;
    private $url;
    private $message;


    public function __construct(PDO $conexao, $url){
        $this->conexao = $conexao;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildBrinqVendido($data){

        $brinqVendido = new BrinqVendido();
        $brinqVendido->setCodigoBrinqVendido($data["Codigo_BrinqVendido"]);
        $brinqVendido->setCodigoPedido($data["Codigo_Pedido"]);
        $brinqVendido->setCodigoBrinq($data["Codigo_Brinq"]);
        $brinqVendido->setQuantidade($data["Quantidade"]);

        return $brinqVendido;

    }

    public function getBrinqPedidos($codigo_usu){
        $stmt = $this->conexao->prepare("SELECT * FROM pedido WHERE Codigo_Usu = :codigo_usu");
        $stmt->bindParam(":codigo_usu",$codigo_usu);
        $stmt->execute();

        if($stmt->rowCount() > 0){ //Ve se o número de linhas retornada é maior que zero, basicamente vendo se retornou algo do banco
            $dataPedido = $stmt->fetchAll();
            $brinquedos = [];

            foreach ($dataPedido as $item) {
                $stmt = $this->conexao->prepare("SELECT * FROM brinqvendido WHERE Codigo_Pedido = :codigo_pedido");
                $stmt->bindParam(":codigo_pedido",$item["Codigo_Pedido"]);
                $stmt->execute();

                $dataBrinqVendido = $stmt->fetchAll();

                foreach ($dataBrinqVendido as $item) {
                    $brinquedos[] = $this->buildBrinqVendido($item);
                }
            }
        
            return $brinquedos;
        }else{
            return false;
        }
}   

public function getPedidoPorCodigo($codigo_pedido){
    $stmt = $this->conexao->prepare("SELECT * FROM pedido WHERE Codigo_Pedido = :codigo_pedido");
    $stmt->bindParam(":codigo_pedido",$codigo_pedido);
    $stmt->execute();

    if($stmt->rowCount() > 0){ //Ve se o número de linhas retornada é maior que zero, basicamente vendo se retornou algo do banco
        $dataPedido = $stmt->fetch();
    
        return $dataPedido;
    }else{
        return false;
    }
}
}