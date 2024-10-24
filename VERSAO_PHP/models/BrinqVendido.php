<?php
class BrinqVendido {
    private $Codigo_BrinqVendido;
    private $Codigo_Pedido;
    private $Codigo_Brinq;
    private $Quantidade;
    private $Preco_Total;

    // Getters
    public function getCodigoBrinqVendido() {
        return $this->Codigo_BrinqVendido;
    }

    public function getCodigoPedido() {
        return $this->Codigo_Pedido;
    }

    public function getCodigoBrinq() {
        return $this->Codigo_Brinq;
    }

    public function getQuantidade() {
        return $this->Quantidade;
    }

    public function getPrecoTotal() {
        return $this->Preco_Total;
    }

    // Setters
    public function setCodigoBrinqVendido($Codigo_BrinqVendido) {
        $this->Codigo_BrinqVendido = $Codigo_BrinqVendido;
    }

    public function setCodigoPedido($Codigo_Pedido) {
        $this->Codigo_Pedido = $Codigo_Pedido;
    }

    public function setCodigoBrinq($Codigo_Brinq) {
        $this->Codigo_Brinq = $Codigo_Brinq;
    }

    public function setQuantidade($Quantidade) {
        $this->Quantidade = $Quantidade;
    }

    public function setPrecoTotal($Preco_Total) {
        $this->Preco_Total = $Preco_Total;
    }
}
?>
