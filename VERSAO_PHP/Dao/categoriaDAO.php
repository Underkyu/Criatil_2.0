<?php
require_once("../models/categoria.php");
require_once("../models/message.php");

class CategoriaDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

public function inserirCategoria(Categoria $categoria) {
    $stmt = $this->conn->prepare("INSERT INTO categoria (Nome_Categoria) VALUES (:nome)");

    $stmt->bindParam(':nome', $categoria->getNomeCategoria());

    return $stmt->execute();
}

public function atualizarCategoria(Categoria $categoria){
    $stmt = $this->conn->prepare("UPDATE categoria SET Nome_Categoria = :nome WHERE Codigo_Categoria = :codigo");

    $stmt->bindParam(':nome', $categoria->getNomeCategoria());
    $stmt->bindParam(':codigo', $categoria->getCodigoCategoria());

    return $stmt->execute();
}

public function deletarCategoria(Categoria $categoria){
    $stmt = $this->conn->prepare("DELETE FROM categoria WHERE Codigo_Categoria = :codigo");

    $stmt->bindParam(':codigo', $categoria->getCodigoCategoria());

    return $stmt->execute();
}
}
?>