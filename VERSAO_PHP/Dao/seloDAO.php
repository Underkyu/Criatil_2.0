<?php
require_once("../models/selo.php");
require_once("../models/message.php");

class SeloDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

public function inserirSelo(Selo $selo) {
    $stmt = $this->conn->prepare("INSERT INTO selo (Nome_Selo, Imagem_Selo) VALUES (:nome, :imagem)");

    $stmt->bindParam(':nome', $selo->getNomeSelo());
    $stmt->bindParam(':imagem', $selo->getImagemSelo());

    return $stmt->execute();
}
}
?>