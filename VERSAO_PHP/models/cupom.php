<?php
class Cupom {
    private $Codigo_Cupom;
    private $Nome_Cupom;
    private $Status_Cupom;
    private $Porcentagem_Cupom;

    public function getCodigoCupom() {
        return $this->Codigo_Cupom;
    }

    public function getNomeCupom() {
        return $this->Nome_Cupom;
    }

    public function getStatusCupom() {
        return $this->Status_Cupom;
    }

    public function getPorcentagemCupom() {
        return $this->Porcentagem_Cupom;
    }


    public function setCodigoCupom($Codigo_Cupom) {
        $this->Codigo_Cupom = $Codigo_Cupom;
    }

    public function setNomeCupom($Nome_Cupom) {
        $this->Nome_Cupom = $Nome_Cupom;
    }

    public function setStatusCupom($Status_Cupom) {
        $this->Status_Cupom = $Status_Cupom;
    }
    public function setPorcentagemCupom($Porcentagem_Cupom) {
        $this->Porcentagem_Cupom = $Porcentagem_Cupom;
    }
}
?>