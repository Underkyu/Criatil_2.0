<?php
class Carrinho {
    private $Codigo_Brinq;
    private $Codigo_Cli;
    private $Quantidade;

    // Métodos GET (para obter os valores)
    public function getCodigoBrinq() {
        return $this->Codigo_Brinq;
    }

    public function getCodigoCli() {
        return $this->Codigo_Cli;
    }

    public function getQuantidade() {
        return $this->Quantidade;
    }

    // Métodos SET (para definir os valores)
    public function setCodigoBrinq($Codigo_Brinq) {
        $this->Codigo_Brinq = $Codigo_Brinq;
    }

    public function setCodigoCli($Codigo_Cli) {
        $this->Codigo_Cli = $Codigo_Cli;
    }

    public function setQuantidade($Quantidade) {
        $this->Quantidade = $Quantidade;
    }
}
?>
