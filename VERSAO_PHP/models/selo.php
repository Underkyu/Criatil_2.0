<?php
class Selo {
    private $Codigo_Selo;
    private $Nome_Selo;
    private $Imagem_Selo;

    public function getCodigoSelo() {
        return $this->Codigo_Selo;
    }

    public function getNomeSelo() {
        return $this->Nome_Selo;
    }

    public function getImagemSelo() {
        return $this->Imagem_Selo;
    }

    public function setCodigoSelo($Codigo_Selo) {
        $this->Codigo_Selo = $Codigo_Selo;
    }

    public function setNomeSelo($Nome_Selo) {
        $this->Nome_Selo = $Nome_Selo;
    }

    public function setImagemSelo($Imagem_Selo) {
        $this->Imagem_Selo = $Imagem_Selo;
    }
}
?>