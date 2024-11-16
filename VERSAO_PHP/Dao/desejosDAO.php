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
        $stmt = $this->conexao->prepare("INSERT INTO listadefavoritos(
            Codigo_Brinq,Codigo_Usu
        ) VALUES (
             :codigo_brinq, :codigo_usu
        )");

        //Pegando as informações do item da lista de favoritos passado como parametro e salvando em variaveis
        $codigo_usu = $itemLista->getCodigoUsu(); 
        $codigo_brinq = $itemLista->getCodigoBrinq();
        
        //Trocando valores no comando sql, pelos valores do objeto de pedido
        $stmt->bindParam(":codigo_usu", $codigo_usu);
        $stmt->bindParam(":codigo_brinq", $codigo_brinq);

        $stmt->execute();
    
    }

    public function getItensLista($codigo_usu){
        $stmt = $this->conexao->prepare("SELECT * FROM listadefavoritos WHERE Codigo_Usu = :codigo_usu");
        $stmt->bindParam(":codigo_usu",$codigo_usu);
        $stmt->execute();

        if($stmt->rowCount() > 0){ //Ve se o número de linhas retornada é maior que zero, basicamente vendo se retornou algo do banco
            $data = $stmt->fetchAll();
            $users = [];

            foreach ($data as $item) {
                $users[] = $this->buildItemLista($item);    
            }
        
            return $users;
        }else{
            return false;
        }
}
}


?>