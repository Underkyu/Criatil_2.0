<?php
class Categoria {
    private $Codigo_Categoria;
    private $Nome_Categoria;

    public function getCodigoCategoria() {
        return $this->Codigo_Categoria;
    }

    public function getNomeCategoria() {
        return $this->Nome_Categoria;
    }

    public function setCodigoCategoria($Codigo_Categoria) {
        $this->Codigo_Categoria = $Codigo_Categoria;
    }

    public function setNomeCategoria($Nome_Categoria) {
        $this->Nome_Categoria = $Nome_Categoria;
    }
}
?>
