<?php
class ListaDeFavoritos {
    private $Codigo_Brinq;
    private $Codigo_Cli;

    public function getCodigoBrinq() {
        return $this->Codigo_Brinq;
    }

    public function getCodigoCli() {
        return $this->Codigo_Cli;
    }

    public function setCodigoBrinq($Codigo_Brinq) {
        $this->Codigo_Brinq = $Codigo_Brinq;
    }

    public function setCodigoCli($Codigo_Cli) {
        $this->Codigo_Cli = $Codigo_Cli;
    }
}
?>
