<?php
class Pedido {
    private $Codigo_Pedido;
    private $Codigo_Usu;
    private $Codigo_Cupom;
    private $Preco_Total;
    private $Forma_Pagamento;
    private $Data_Pedido;
    private $Status_Pedido;

    public function getCodigoPedido() {
        return $this->Codigo_Pedido;
    }
    public function getCodigoUsu() {
        return $this->Codigo_Usu;
    }

    public function getCodigoCupom() {
        return $this->Codigo_Cupom;
    }

    public function getPrecoTotal() {
        return $this->Preco_Total;
    }

    public function getFormaPagamento() {
        return $this->Forma_Pagamento;
    }

    public function getDataPedido() {
        return $this->Data_Pedido;
    }

    public function getStatusPedido() {
        return $this->Status_Pedido;
    }

    public function setCodigoPedido($Codigo_Pedido) {
        $this->Codigo_Pedido = $Codigo_Pedido;
    }
    
    public function setCodigoUsu($Codigo_Usu) {
        $this->Codigo_Usu = $Codigo_Usu;
    }

    public function setCodigoCupom($Codigo_Cupom) {
        $this->Codigo_Cupom = $Codigo_Cupom;
    }

    public function setPrecoTotal($Preco_Total) {
        $this->Preco_Total = $Preco_Total;
    }

    public function setFormaPagamento($Forma_Pagamento) {
        $this->Forma_Pagamento = $Forma_Pagamento;
    }

    public function setDataPedido($Data_Pedido) {
        $this->Data_Pedido = $Data_Pedido;
    }

    public function setStatusPedido($Status_Pedido) {
        $this->Status_Pedido = $Status_Pedido;
    }
}
?>
