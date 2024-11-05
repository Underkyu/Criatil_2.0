<?php 

require_once("../models/pedido.php");
require_once("../models/BrinqVendido.php");
require_once("../models/message.php");

class carrinhoDao {   
    private $conexao;
    private $url;
    private $message;


    public function __construct(PDO $conexao, $url){
        $this->conexao = $conexao;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function setCompra() {
}