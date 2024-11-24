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
    
    public function calculaMediaNota($codigoBrinq) {
        $stmt = $this->conexao->prepare("SELECT AVG(Nota_Ava) as media FROM avaliacao WHERE Codigo_Brinq = :codigoBrinq");
        $stmt->bindParam(":codigoBrinq", $codigoBrinq);
        $stmt->execute();
    
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado['media']) {
            return round($resultado['media'] * 2) / 2; // arrendonda de .5 em .5
        } else {
            return 0; // retorna 0 se não tiverem avaliações nesse brinquedo
        }
    }

    public function atualizaNota($codigoBrinq, $nota) {
        $notaArredondada = round($nota * 2) / 2; // arrendonda de .5 em .5
        
        $stmt = $this->conexao->prepare("UPDATE brinquedo SET Nota = :nota WHERE Codigo_Brinq = :codigoBrinq");
        $stmt->bindParam(":nota", $notaArredondada);
        $stmt->bindParam(":codigoBrinq", $codigoBrinq);
        return $stmt->execute();
    }
}

?>