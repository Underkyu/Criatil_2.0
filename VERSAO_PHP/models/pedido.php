<?php
class Pedido {
    private $Codigo_Pedido;
    private $Codigo_Brinq;
    private $Codigo_Cli;
    private $Codigo_Cupom;
    private $Preco_Total;
    private $Data;
    private $Status_Pedido;

    public function getCodigoPedido() {
        return $this->Codigo_Pedido;
    }

    public function getCodigoBrinq() {
        return $this->Codigo_Brinq;
    }

    public function getCodigoCli() {
        return $this->Codigo_Cli;
    }

    public function getCodigoCupom() {
        return $this->Codigo_Cupom;
    }

    public function getPrecoTotal() {
        return $this->Preco_Total;
    }

    public function getData() {
        return $this->Data;
    }

    public function getStatusPedido() {
        return $this->Status_Pedido;
    }

    public function setCodigoPedido($Codigo_Pedido) {
        $this->Codigo_Pedido = $Codigo_Pedido;
    }

    public function setCodigoBrinq($Codigo_Brinq) {
        $this->Codigo_Brinq = $Codigo_Brinq;
    }

    public function setCodigoCli($Codigo_Cli) {
        $this->Codigo_Cli = $Codigo_Cli;
    }

    public function setCodigoCupom($Codigo_Cupom) {
        $this->Codigo_Cupom = $Codigo_Cupom;
    }

    public function setPrecoTotal($Preco_Total) {
        $this->Preco_Total = $Preco_Total;
    }

    public function setData($Data) {
        $this->Data = $Data;
    }

    public function setStatusPedido($Status_Pedido) {
        $this->Status_Pedido = $Status_Pedido;
    }
}
?>
