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

    $stmt->bindParam(':nome', $selo->getNomeCategoria());

    return $stmt->execute();
}
}
?>