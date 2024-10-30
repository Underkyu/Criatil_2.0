<?php 

require_once("../models/avaliacao.php");
require_once("../models/message.php");

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
    /* deixando os outros métodos comentados por enq, se necessário fazer dps
    public function atualiza(Usuario $usuario, $redirect = true){
        $stmt = $this->conexao->prepare("UPDATE usuario SET
        Nome_Usu = :nome,
        Nasc_Usu = :nasc,
        Celular_Usu = :cel,
        Email_Usu = :email,
        Senha_Usu = :senha,
        Tipo_Usu = :tipo,
        Token = :token,
        Imagem = :imagem 
        WHERE Codigo_Usu = :codigo");

        $user = $usuario->getNome();
        $nasci = $usuario->getNasc();
        $cel = $usuario->getCelular();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $tipo = $usuario->getTipo();
        $token = $usuario->getToken(); 
        $imagem = $usuario->getImagem();
        $codigo = $usuario->getCodigo();

        $stmt->bindParam(":nome", $user);
        $stmt->bindParam(":nasc", $nasci);
        $stmt->bindParam(":cel", $cel);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":codigo", $codigo);
        $stmt->bindParam(":imagem", $imagem);

        $stmt->execute();

        if($redirect) {
            $this->message->setMessage("Informações alteradas!","Seus dados foram alterados com sucesso!","success","../html/conta.php");
        }
    }
    
    
    public function buildAva($data){
        $user = new Usuario();
        $user->setCodigo($data["Codigo_Usu"]);
        $user->setNome($data["Nome_Usu"]);
        $user->setNasc($data["Nasc_Usu"]);
        $user->setCelular($data["Celular_Usu"]);
        $user->setEmail($data["Email_Usu"]);
        $user->setSenha($data["Senha_Usu"]);
        $user->setTipo($data["Tipo_Usu"]);
        $user->setImagem($data["Imagem"]);
        $user->setToken($data["Token"]);

        return $user;
    }
    public function criar(Usuario $usuario, $authUsario = false){
        $stmt = $this->conexao->prepare("INSERT INTO usuario(
            Nome_Usu,Nasc_Usu,Celular_Usu,Email_Usu,Senha_Usu,Tipo_Usu,Token,Imagem
        ) VALUES (
            :nome, :nasc, :cel, :email, :senha, :tipo, :token, :imagem
        )");

        $user = $usuario->getNome();
        $nasci = $usuario->getNasc();
        $cel = $usuario->getCelular();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $tipo = $usuario->getTipo();
        $token = $usuario->getToken(); 
        $imagem = $usuario->getImagem();

        $stmt->bindParam(":nome", $user);
        $stmt->bindParam(":nasc", $nasci);
        $stmt->bindParam(":cel", $cel);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":imagem", $imagem);

        $stmt->execute();

        if($authUsario){
            $this->tokenParaSessao($usuario->getToken());
        }
    }
     */
}

?>