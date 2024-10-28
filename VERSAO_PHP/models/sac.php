<?php
class Sac {
    private $Codigo_Sac;
    private $Nome_Sac;
    private $Email_Sac;
    private $Mensagem_Sac;

public function getCodigoSac() {
    return $this->Codigo_Sac;
}
public function getNomeSac() {
    return $this->Nome_Sac;
}
public function getEmailSac() {
    return $this->Email_Sac;
}
public function getMensagemSac() {
    return $this->Mensagem_Sac;
}

public function setCodigoSac($Codigo_Sac) {
    $this->Codigo_Sac = $Codigo_Sac;
}
public function setNomeSac($Nome_Sac) {
    $this->Nome_Sac = $Nome_Sac;
}
public function setEmailSac($Email_Sac) {
    $this->Email_Sac = $Email_Sac;
}
public function setMensagemSac($Mensagem_Sac) {
    $this->Mensagem_Sac = $Mensagem_Sac;
}
}

?>