<?php
class Produto {
    private $Codigo_Brinq;
    private $Codigo_Selo;
    private $Codigo_Categoria;
    private $Nome_Brinq;
    private $Preco_Brinq;
    private $Nota;
    private $Fabricante;
    private $Descricao;
    private $Faixa_Etaria;
    private $Status;

    public function getCodigoBrinq() {
        return $this->Codigo_Brinq;
    }

    public function getCodigoSelo() {
        return $this->Codigo_Selo;
    }

    public function getCodigoCategoria() {
        return $this->Codigo_Categoria;
    }

    public function getNomeBrinq() {
        return $this->Nome_Brinq;
    }

    public function getPrecoBrinq() {
        return $this->Preco_Brinq;
    }

    public function getNota() {
        return $this->Nota;
    }

    public function getFabricante() {
        return $this->Fabricante;
    }

    public function getDescricao() {
        return $this->Descricao;
    }

    public function getFaixaEtaria() {
        return $this->Faixa_Etaria;
    }

    public function getStatus() {
        return $this->Status;
    }

    public function setCodigoBrinq($Codigo_Brinq) {
        $this->Codigo_Brinq = $Codigo_Brinq;
    }

    public function setCodigoSelo($Codigo_Selo) {
        $this->Codigo_Selo = $Codigo_Selo;
    }

    public function setCodigoCategoria($Codigo_Categoria) {
        $this->Codigo_Categoria = $Codigo_Categoria;
    }

    public function setNomeBrinq($Nome_Brinq) {
        $this->Nome_Brinq = $Nome_Brinq;
    }

    public function setPrecoBrinq($Preco_Brinq) {
        $this->Preco_Brinq = $Preco_Brinq;
    }

    public function setNota($Nota) {
        $this->Nota = $Nota;
    }

    public function setFabricante($Fabricante) {
        $this->Fabricante = $Fabricante;
    }

    public function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }

    public function setFaixaEtaria($Faixa_Etaria) {
        $this->Faixa_Etaria = $Faixa_Etaria;
    }

    public function setStatus($Status) {
        $this->Status = $Status;
    }
}

interface ProdutoDAOInterface {
    public function buildProduct($data);
    public function criarP(Produto $produto, Imagem $imagem);
    public function atualizaP(Produto $produto, $redirect = true);
}
?>
