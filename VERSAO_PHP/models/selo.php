<?php
class Selo {

    private $Codigo_Selo;
    private $Nome_Selo;
    private $Icon_Selo;

    public function getCodigoSelo() {
        return $this->Codigo_Selo;
    }

    public function getNomeSelo() {
        return $this->Nome_Selo;
    }

    public function getIconSelo() {
        return $this->Icon_Selo;
    }

    public function setCodigoSelo($Codigo_Selo) {
        $this->Codigo_Selo = $Codigo_Selo;
    }

    public function setNomeSelo($Nome_Selo) {
        $this->Nome_Selo = $Nome_Selo;
    }

    public function setIconSelo($Icon_Selo) {
        $this->Icon_Selo = $Icon_Selo;
    }
}
?>