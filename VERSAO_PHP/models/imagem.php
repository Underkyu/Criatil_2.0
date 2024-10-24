<?php
class Imagem {
    private $Codigo_Imagem;
    private $Codigo_Brinq;
    private $Imagem;
    private $Num_Imagem;


    public function getCodigoImagem() {
        return $this->Codigo_Imagem;
    }

    public function getCodigoBrinq() {
        return $this->Codigo_Brinq;
    }

    public function getImagem() {
        return $this->Imagem;
    }

    public function getNumImagem() {
        return $this->Num_Imagem;
    }

    public function setCodigoImagem($Codigo_Imagem) {
        $this->Codigo_Imagem = $Codigo_Imagem;
    }

    public function setCodigoBrinq($Codigo_Brinq) {
        $this->Codigo_Brinq = $Codigo_Brinq;
    }

    public function setImagem($Imagem) {
        $this->Imagem = $Imagem;
    }

    public function setNumImagem($Num_Imagem) {
        $this->Num_Imagem = $Num_Imagem;
    }
}
?>
