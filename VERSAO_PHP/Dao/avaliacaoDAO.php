<?php 

require_once("../models/Avaliacao.php");
require_once("../models/message.php");
require_once("../controller/conexao.php");

class AvaliacaoDAO implements AvaliacaoDAOInterface {   
    private $conexao;
    private $url;
    private $message;

    public function __construct(PDO $conexao, $url){
        $this->conexao = $conexao;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function deleta(Avaliacao $avaliacao, $redirect = true){
        $stmt = $this->conexao->prepare("DELETE FROM avaliacao WHERE Codigo_Ava = :codigoAva");

        $codigoAva = $avaliacao->getCodigoAva();
        $stmt->bindParam(":codigoAva", $codigoAva);

        $stmt->execute();

        if($redirect) {
            $this->message->setMessage("Avaliação deletada","A avaliação foi removida com sucesso!","success","back");
        }
    }
    public function criarA(Avaliacao $avaliacao){
        $stmt = $this->conexao->prepare("INSERT INTO avaliacao(
            Codigo_Brinq,Codigo_Usu,Nota_Ava,Comentario,Titulo_Ava
        ) VALUES (
            :codB, :codU, :notaA, :comentA, :tituloA
        )");

        $codBrinq = $avaliacao->getCodigoBrinq();
        $codUsu = $avaliacao->getCodigoUsu();
        $notaAva = $avaliacao->getNotaAva();
        $comentAva = $avaliacao->getComentario();
        $tituloAva = $avaliacao->getTituloAva();

        $stmt->bindParam(":codB", $codBrinq);
        $stmt->bindParam(":codU", $codUsu);
        $stmt->bindParam(":notaA", $notaAva);
        $stmt->bindParam(":comentA", $comentAva);
        $stmt->bindParam(":tituloA", $tituloAva);

        $stmt->execute();
    }
}

?>