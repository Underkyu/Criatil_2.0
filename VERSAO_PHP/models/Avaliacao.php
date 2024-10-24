<?php
class Avaliacao {
    private $Codigo_Ava;
    private $Codigo_Brinq;
    private $Codigo_Cli;
    private $Nota_Ava;
    private $Comentario;
    private $Titulo_Ava;

    public function getCodigoAva() {
        return $this->Codigo_Ava;
    }

    public function getCodigoBrinq() {
        return $this->Codigo_Brinq;
    }

    public function getCodigoCli() {
        return $this->Codigo_Cli;
    }

    public function getNotaAva() {
        return $this->Nota_Ava;
    }

    public function getComentario() {
        return $this->Comentario;
    }

    public function getTituloAva() {
        return $this->Titulo_Ava;
    }

    public function setCodigoAva($Codigo_Ava) {
        $this->Codigo_Ava = $Codigo_Ava;
    }

    public function setCodigoBrinq($Codigo_Brinq) {
        $this->Codigo_Brinq = $Codigo_Brinq;
    }

    public function setCodigoCli($Codigo_Cli) {
        $this->Codigo_Cli = $Codigo_Cli;
    }

    public function setNotaAva($Nota_Ava) {
        $this->Nota_Ava = $Nota_Ava;
    }

    public function setComentario($Comentario) {
        $this->Comentario = $Comentario;
    }

    public function setTituloAva($Titulo_Ava) {
        $this->Titulo_Ava = $Titulo_Ava;
    }
}
?>
