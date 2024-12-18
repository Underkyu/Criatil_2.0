<?php 

require_once("../models/brinquedo.php");
require_once("../models/message.php");
require_once("../models/imagem.php");

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
        $produto->setStatus($data["Status"]);

        return $produto;
    }

    public function buildImagem($data){
        $imagem = new Imagem();
    
        $imagem->setCodigoImagem($data["Codigo_Imagem"]);
        $imagem->setCodigoBrinq($data["Codigo_Brinq"]);
        $imagem->setImagem($data["Imagem"]);
        $imagem->setNumImagem($data["Num_Imagem"]);
        return $imagem;
    }
    // usei 'produto' ao invés de brinquedo em muitos lugares, me confundi, mas ainda funciona, só n confunda
    public function criarP(Produto $produto){
        $stmt = $this->conexao->prepare("INSERT INTO brinquedo (Codigo_Selo, Codigo_Categoria, Nome_Brinq, Preco_Brinq, Nota, Fabricante, Descricao, Faixa_Etaria, Status)
         VALUES (:codigoSelo, :codigoCategoria, :nomeBrinq, :precoBrinq, :nota, :fabricante, :descricao, :faixaEtaria, :status)");
    
        $codigoSelo = $produto->getCodigoSelo();
        $codigoCategoria = $produto->getCodigoCategoria();
        $nomeBrinq = $produto->getNomeBrinq();
        $precoBrinq = $produto->getPrecoBrinq();
        $nota = $produto->getNota();
        $fabricante = $produto->getFabricante();
        $descricao = $produto->getDescricao();
        $faixaEtaria = $produto->getFaixaEtaria();
        $status = $produto->getStatus();
    
        $stmt->bindParam(":codigoSelo", $codigoSelo);
        $stmt->bindParam(":codigoCategoria", $codigoCategoria);
        $stmt->bindParam(":nomeBrinq", $nomeBrinq);
        $stmt->bindParam(":precoBrinq", $precoBrinq);
        $stmt->bindParam(":nota", $nota);
        $stmt->bindParam(":fabricante", $fabricante);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":faixaEtaria", $faixaEtaria);
        $stmt->bindParam(":status", $status);
    
        if($stmt->execute()){
        // a função "lastInsertId" pega o ultimo ID com auto_increment inserido
        $lastInsertId = $this->conexao->lastInsertId();
        return $lastInsertId;
        }else{
            return false;
        }
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
    Faixa_Etaria = :faixaEtaria,
    Status = :status
    WHERE Codigo_Brinq = :codigo");

    $codigoSelo = $produto->getCodigoSelo();
    $codigoCategoria = $produto->getCodigoCategoria();
    $nomeBrinq = $produto->getNomeBrinq();
    $precoBrinq = $produto->getPrecoBrinq();
    $nota = $produto->getNota();
    $fabricante = $produto->getFabricante();
    $descricao = $produto->getDescricao();
    $faixaEtaria = $produto->getFaixaEtaria();
    $status = $produto->getStatus();
    $codigo = $produto->getCodigoBrinq();

    $stmt->bindParam(":codigoSelo", $codigoSelo);
    $stmt->bindParam(":codigoCategoria", $codigoCategoria);
    $stmt->bindParam(":nome", $nomeBrinq);
    $stmt->bindParam(":preco", $precoBrinq);
    $stmt->bindParam(":nota", $nota);
    $stmt->bindParam(":fabricante", $fabricante);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":faixaEtaria", $faixaEtaria);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":codigo", $codigo);

    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
public function inserirImagem(Imagem $imagem, $codigoBrinq) {
    $stmt = $this->conexao->prepare("INSERT INTO imagem (Codigo_Brinq, Imagem, Num_Imagem) VALUES (:codigoBrinq, :imagem, :numImagem)");
    
    $Imagem = $imagem->getImagem();
    $numImagem = $imagem->getNumImagem();

    $stmt->bindParam(":codigoBrinq", $codigoBrinq);
    $stmt->bindParam(":imagem", $Imagem);
    $stmt->bindParam(":numImagem", $numImagem);
    
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
public function editaImagem($imagem, $codigoImagem, $codigoBrinq, $numImagem) {
    // Se não tiver código da imagem mas tiver a imagem, insere
    if (empty($codigoImagem) && !empty($imagem)) {
        $novaImagem = new Imagem($imagem, $numImagem);
        return $this->inserirImagem($novaImagem, $codigoBrinq);
    }

    // Se tiver código da imagem mas a imagem estiver vazia, deleta
    if (!empty($codigoImagem) && empty($imagem)) {
        return $this->deletaImagem($codigoImagem);
    }

    // Se tiver código de imagem e a imagem, atualiza
    if (!empty($codigoImagem) && !empty($imagem)) {
        $stmt = $this->conexao->prepare("UPDATE imagem SET Imagem = :imagem WHERE Codigo_Imagem = :codigoImagem");
        $stmt->bindParam(":imagem", $imagem);
        $stmt->bindParam(":codigoImagem", $codigoImagem);
        return $stmt->execute();
    }

    // se não encontrar imagem e código, não faz nada
    return true;
}

public function deletaImagem($codigoImagem) {
    // pra apagar a imagem do produto caso ela seja apagada na edição
    $stmt = $this->conexao->prepare("DELETE FROM imagem WHERE Codigo_Imagem  = :codigoImagem");
    
    $stmt->bindParam(":codigoImagem", $codigoImagem);

    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
public function pesquisarPorNome($nomeBrinq) {
    if($nomeBrinq != "") {
        // coloca % antes e depois da variável pra achar resultados parecidos
        $nomeBrinq = '%' . $nomeBrinq . '%';
        $stmt = $this->conexao->prepare("SELECT * FROM brinquedo WHERE Nome_Brinq LIKE :nome AND Status <> 1");
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

public function pesquisarPorCodigo($codigoBrinq) {
    if($codigoBrinq != "") {
        $stmt = $this->conexao->prepare("SELECT * FROM brinquedo WHERE Codigo_Brinq = :codigo");
        $stmt->bindParam(":codigo", $codigoBrinq);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $data = $stmt->fetch();
            $brinq = $this->buildProduct($data); 

            return $brinq;  
        } else {
            return false;
        }
    } else {
        return false;
    }
}

public function pesquisarImagemPorCodigoBrinq($codigoBrinq) {
    if($codigoBrinq != "") {
        $stmt = $this->conexao->prepare("SELECT * FROM imagem WHERE Codigo_Brinq = :codigo");
        $stmt->bindParam(":codigo", $codigoBrinq);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $imagens = [];
            $data = $stmt->fetchAll();
            foreach($data as $arrayData) {
                $imagens[] = $this->buildImagem($arrayData);
            }
            return $imagens;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
public function filtraProdutos($precoMin, $precoMax) {
    if ($precoMin !== false && $precoMax !== false) {
        $stmt = $this->conexao->prepare("SELECT * FROM brinquedo WHERE Preco_Brinq BETWEEN :precoMin AND :precoMax");
        $stmt->bindParam(':precoMin', $precoMin);
        $stmt->bindParam(':precoMax', $precoMax);

    } elseif ($precoMin !== false && $precoMax !== false) {
        $stmt = $this->conexao->prepare("SELECT * FROM brinquedo WHERE Preco_Brinq BETWEEN :precoMin AND :precoMax");
        $stmt->bindParam(':precoMin', $precoMin);
        $stmt->bindParam(':precoMax', $precoMax);

    } else {
        $stmt = $this->conexao->prepare("SELECT * FROM brinquedo");
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function filtraCategorias($categoria) {
    $stmt1 = $this->conexao->prepare("SELECT Codigo_Categoria FROM categoria WHERE Nome_Categoria = :categoria");
    $stmt1->bindParam(':categoria', $categoria);
    $stmt1->execute();
    $codigoCategoria = $stmt1->fetchColumn();

    $stmt = $this->conexao->prepare("SELECT * FROM brinquedo WHERE Codigo_Categoria = :codigoCategoria AND Status <> 1");
    $stmt->bindParam(':codigoCategoria', $codigoCategoria);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function filtraSelos($selo) {
    $stmt1 = $this->conexao->prepare("SELECT Codigo_Selo FROM selo WHERE Nome_Selo = :selo");
    $stmt1->bindParam(':selo', $selo);
    $stmt1->execute();
    $codigoSelo = $stmt1->fetchColumn();

    $stmt = $this->conexao->prepare("SELECT * FROM brinquedo WHERE Codigo_Selo = :codigoSelo AND Status <> 1");
    $stmt->bindParam(':codigoSelo', $codigoSelo);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function pesquisarPrimeiraImagemPorCodigoBrinq($codigoBrinq) {
    if($codigoBrinq != "") {
        $stmt = $this->conexao->prepare("SELECT * FROM imagem WHERE Codigo_Brinq = :codigo AND Num_Imagem = 1");
        $stmt->bindParam(":codigo", $codigoBrinq);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $data = $stmt->fetch();
            $imagem = $this->buildImagem($data);
            return $imagem;
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
