<?php
require_once("../models/pedido.php");
require_once("../models/listaDeFavorito.php");
require_once("../models/message.php");

class desejosDao {   
    private $conexao;
    private $url;
    private $message;


    public function __construct(PDO $conexao, $url){
        $this->conexao = $conexao;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildItemLista($data){

        $itemLista = new ListaDeFavoritos();
        $itemLista->setCodigoBrinq($data["Codigo_Brinq"]);
        $itemLista->setCodigoUsu($data["Codigo_Usu"]);

        return $itemLista;

    }

    public function setItemLista(ListaDeFavoritos $itemLista){
        $stmt = $this->conexao->prepare("INSERT INTO pedido(
            Codigo_Brinq,Codigo_Usu
        ) VALUES (
             :codigo_brinq, :codigo_usu
        )");

        //Pegando as informações do item da lista de favoritos passado como parametro e salvando em variaveis
        $codigo_usu = $itemLista->getCodigoUsu(); 
        $codigo_brinq = $itemLista->getCodigoBrinq();
        
        //Trocando valores no comando sql, pelos valores do objeto de pedido
        $stmt->bindParam(":codigo_usu", $codigo_usu);
        $stmt->bindParam(":codigo_cupom", $codigo_cupom);

        $stmt->execute();
    
    }

}

?>