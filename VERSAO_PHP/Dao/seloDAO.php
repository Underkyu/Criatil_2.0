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

public function atualizarSelo(Selo $selo) {
    if ($selo->getImagemSelo() !== null) {
        $stmt = $this->conn->prepare("UPDATE selo SET Nome_Selo = :nome, Imagem_Selo = :imagem WHERE Codigo_Selo = :codigo");
        $stmt->bindParam(':imagem', $selo->getImagemSelo());
    } else { // se não tiver imagem definida, atualiza só o nome
        $stmt = $this->conn->prepare("UPDATE selo SET Nome_Selo = :nome WHERE Codigo_Selo = :codigo");
    }

    $stmt->bindParam(':codigo', $selo->getCodigoSelo());
    $stmt->bindParam(':nome', $selo->getNomeSelo());

    return $stmt->execute();
}
}
?>