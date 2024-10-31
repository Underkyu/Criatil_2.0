<?php 

require_once("../models/usuario.php");
require_once("../models/message.php");

class carrinhoDao {   
    private $conexao;
    private $url;
    private $message;


    public function __construct(PDO $conexao, $url){
        $this->conexao = $conexao;
        $this->url = $url;
        $this->message = new Message($url);
        $arrayCarrinho = [];
        
        // Verifique se o cookie "carrinho" não existe antes de inicializá-lo
        if (!isset($_COOKIE["carrinho"])) {
            $arrayCarrinho = [];
            setcookie("carrinho", json_encode($arrayCarrinho), time() + (86400 * 30), "/"); // Cookie expira em 30 dias
        }
    }

    public function getCarrinho(){
        $carrinhoArray = json_decode($_COOKIE["carrinho"], true); // Decodifica o JSON em array associativo
        return $carrinhoArray;
    }

    public function adicionarItemCarrinho($codigo){
        if (isset($_COOKIE["carrinho"])) {
            $carrinhoArray = json_decode($_COOKIE["carrinho"], true); // Decodifica o JSON em array associativo
            
            $carrinhoArray[] = $codigo;
            
            // Atualiza o cookie com o novo array
            setcookie("carrinho", json_encode($carrinhoArray), time() + (86400 * 30), "/"); // Renova por mais 30 dias
        }
        else{
            return false;
        }
    }

    public function deletarItemCarrinho($codigo){
        if (isset($_COOKIE["carrinho"])) {
            $carrinhoArray = json_decode($_COOKIE["carrinho"], true); // Decodifica o JSON em array associativo
            
            unset($carrinhoArray[$codigo]);
            
            // Atualiza o cookie com o novo array
            setcookie("carrinho", json_encode($carrinhoArray), time() + (86400 * 30), "/"); // Renova por mais 30 dias
        }else{
            return false;
        }
    }
    public function deletarTodosItensCarrinho(){
        if (isset($_COOKIE["carrinho"])) {
            $carrinhoArray = json_decode($_COOKIE["carrinho"], true); // Decodifica o JSON em array associativo
            
            array_splice($carrinhoArray, 0);  // Remove todos os itens do array
            
            // Atualiza o cookie com o novo array
            setcookie("carrinho", json_encode($carrinhoArray), time() + (86400 * 30), "/"); // Renova por mais 30 dias
        }else{
            return false;
        }
    }
}