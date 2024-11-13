<?php
class ListaDeFavoritos {
    private $Codigo_Brinq;
    private $Codigo_Usu;

    public function getCodigoBrinq() {
        return $this->Codigo_Brinq;
    }

    public function getCodigoUsu() {
        return $this->Codigo_Usu;
    }

    public function setCodigoBrinq($Codigo_Brinq) {
        $this->Codigo_Brinq = $Codigo_Brinq;
    }

    public function setCodigoUsu($Codigo_Usu) {
        $this->Codigo_Usu = $Codigo_Usu;
    }
}
?>
