<?php
require_once("../models/selo.php");
require_once("../models/message.php");

class SeloDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

public function inserirSelo(Selo $selo) {
    $stmt = $this->conn->prepare("INSERT INTO sac (Nome_Selo, Icon_Selo) VALUES (:nome, :icon)");

    $stmt->bindParam(':nome', $selo->getNomeSelo());
    $stmt->bindParam(':email', $selo->getIconSelo());

    return $stmt->execute();
}
}
?>