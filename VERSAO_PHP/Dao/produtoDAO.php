<?php 

require_once("../models/brinquedo.php");
require_once("../models/message.php");

class ProdutoDAO implements ProdutoDAOInterface {   
    private $conexao;
    private $url;
    private $message;

    public function __construct(PDO $conexao, $url){
        $this->conexao = $conexao;
        $this->url = $url;
        $this->message = new Message($url);
    }
    
    public function buildProduct($data){
        $produto = new Produto();
        $produto->setCodigoBrinq($data["Codigo_Brinq"]);
        $produto->setCodigoSelo($data["Codigo_Selo"]);
        $produto->setCodigoCategoria($data["Codigo_Categoria"]);
        $produto->setNomeBrinq($data["Nome_Brinq"]);
        $produto->setPrecoBrinq($data["Preco_Brinq"]);
        $produto->setNota($data["Nota"]);
        $produto->setFabricante($data["Fabricante"]);
        $produto->setDescricao($data["Descricao"]);
        $produto->setFaixaEtaria($data["Faixa_Etaria"]);

        return $produto;
    }
    // usei 'produto' ao invés de brinquedo em muitos lugares, me confundi, mas ainda funciona, só n confunda
    public function criarP(Produto $produto){
        $stmt = $this->conexao->prepare("INSERT INTO brinquedo(
            Codigo_Selo, Codigo_Categoria, Nome_Brinq, Preco_Brinq, Nota, Fabricante, Descricao, Faixa_Etaria

        ) VALUES (
            :codigoS, :codigoCat, :nome, :preco, :nota, :fabricante, :descricao, :faixaEtaria
        )"); 

        $codigoCategoria = $produto->getCodigoCategoria();
        $codigoSelo = $produto->getCodigoSelo();
        $nomeBrinq = $produto->getNomeBrinq();
        $precoBrinq = $produto->getPrecoBrinq();
        $nota = $produto->getNota();
        $fabricante = $produto->getFabricante();
        $descricao = $produto->getDescricao();
        $faixaEtaria = $produto->getFaixaEtaria();

        $stmt->bindParam(":codigoS", $codigoSelo);
        $stmt->bindParam(":codigoCat", $codigoCategoria);
        $stmt->bindParam(":nome", $nomeBrinq);
        $stmt->bindParam(":preco", $precoBrinq);
        $stmt->bindParam(":nota", $nota);
        $stmt->bindParam(":fabricante", $fabricante);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":faixaEtaria", $faixaEtaria);

        $stmt->execute();

    }
public function atualizaP(Produto $produto, $redirect = true){
    $stmt = $this->conexao->prepare("UPDATE brinquedo SET
    Codigo_Selo = :codigoSelo,
    Codigo_Categoria = :codigoCategoria,
    Nome_Brinq = :nome,
    Preco_Brinq = :preco,
    Nota = :nota,
    Fabricante = :fabricante,
    Descricao = :descricao,
    Faixa_Etaria = :faixaEtaria
    WHERE Codigo_Brinq = :codigo");

    $codigoSelo = $produto->getCodigoSelo();
    $codigoCategoria = $produto->getCodigoCategoria();
    $nomeBrinq = $produto->getNomeBrinq();
    $precoBrinq = $produto->getPrecoBrinq();
    $nota = $produto->getNota();
    $fabricante = $produto->getFabricante();
    $descricao = $produto->getDescricao();
    $faixaEtaria = $produto->getFaixaEtaria();
    $codigo = $produto->getCodigoBrinq();

    $stmt->bindParam(":codigoSelo", $codigoSelo);
    $stmt->bindParam(":codigoCategoria", $codigoCategoria);
    $stmt->bindParam(":nome", $nomeBrinq);
    $stmt->bindParam(":preco", $precoBrinq);
    $stmt->bindParam(":nota", $nota);
    $stmt->bindParam(":fabricante", $fabricante);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":faixaEtaria", $faixaEtaria);
    $stmt->bindParam(":codigo", $codigo);

    $stmt->execute();

    if($redirect) {
        $this->message->setMessage("Informações alteradas!","Os dados do produto foram alterados com sucesso","success","../html/conta.php");
    }
}
public function pesquisarPorNome($nomeBrinq) {
    if($nomeBrinq != "") {
        // coloca % antes e depois da variável pra achar resultados parecidos
        $nomeBrinq = '%' . $nomeBrinq . '%';
        $stmt = $this->conexao->prepare("SELECT * FROM brinquedo WHERE Nome_Brinq LIKE :nome");
        $stmt->bindParam(":nome", $nomeBrinq);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    } else {
        return false;
    }
}
public function getSelos() {
    $stmt = $this->conexao->prepare("SELECT Codigo_Selo, Nome_Selo FROM selo");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getCategorias() {
    $stmt = $this->conexao->prepare("SELECT Codigo_Categoria, Nome_Categoria FROM categoria");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function renderizarEstrelas($nota) {
    $estrelasInteiras = floor($nota);
    $meiaEstrela = ($nota - $estrelasInteiras) >= 0.5 ? 1 : 0;
    $estrelasVazias = 5 - ($estrelasInteiras + $meiaEstrela);

    $htmlEstrelas = '';

    for ($i = 0; $i < $estrelasInteiras; $i++) {
        $htmlEstrelas .= '<img src="../imagens/Icons/estrela.png" alt="estrela" class="estrela" />';
    }

    if ($meiaEstrela) {
        $htmlEstrelas .= '<img src="../imagens/Icons/meia_estrela.png" alt="meia estrela" class="estrela" />';
    }

    for ($i = 0; $i < $estrelasVazias; $i++) {
        $htmlEstrelas .= '<img src="../imagens/Icons/estrela_vazia.png" alt="estrela vazia" class="estrela" />';
    }

    return $htmlEstrelas;
}
}
?>
