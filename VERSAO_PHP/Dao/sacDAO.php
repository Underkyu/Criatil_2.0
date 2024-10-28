<?php
require_once("../models/sac.php");
require_once("../models/message.php");

class SacDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

public function inserirSac(Sac $sac) {
    $stmt = $this->conn->prepare("INSERT INTO sac (nome, email, mensagem) VALUES (:nome, :email, :mensagem)");

    $stmt->bindParam(':nome', $sac->getNomeSac());
    $stmt->bindParam(':email', $sac->getEmailSac());
    $stmt->bindParam(':mensagem', $sac->getMensagemSac());

    return $stmt->execute();
}
}
?>