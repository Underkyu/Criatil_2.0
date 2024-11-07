<?php 

require_once("../models/usuario.php");
require_once("../models/message.php");

class UsuarioDAO implements UsuarioDAOInterface {   
    private $conexao;
    private $url;
    private $message;

    public function __construct(PDO $conexao, $url){
        $this->conexao = $conexao;
        $this->url = $url;
        $this->message = new Message($url);
    }
    
    public function buildUser($data){
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
    public function pesquisarPorToken($token){
        if($token != ""){
            $stmt = $this->conexao->prepare("SELECT * FROM usuario WHERE Token = :token"); //Prepara para executar esse comando sql
            $stmt->bindParam(":token",$token); //Troca o :email na mensagem pelo valor da variavel email
            $stmt->execute(); //Executa o comando

            if($stmt->rowCount() > 0){ //Ve se o número de linhas retornada é maior que zero, basicamente vendo se retornou algo do banco
                $data = $stmt->fetch();
                $user = $this->buildUser($data); 

                return $user;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function verificarToken($protected = false){
        if(!empty($_SESSION["token"])){
            $token = $_SESSION["token"];

            $user = $this->pesquisarPorToken($token);

            if($user){
               return $user;
            } else if($protected){
                $this->message->setMessage("Login expirado","Por favor fazer login novamente!","error","principal.php");
            }
        }else if($protected){
            $this->message->setMessage("Login expirado","Por favor fazer login novamente!","error","principal.php");
        }
    }
    public function tokenParaSessao($token, $redirect = true){
        $_SESSION["token"] = $token;

        if($redirect) {
            $this->message->setMessage("Login bem sucedido","Bem vindo!","success","../html/conta.php");
        }
    }
    public function autenticarUsuario($email, $password){
        $user = $this->pesquisarPorEmail($email);
        if($user){
            if(password_verify($password, $user->getSenha())){
                $token = $user->gerarToken();

                $this->tokenParaSessao($token, false);

                $user->setToken($token);    
                $this->atualiza($user);
                $this->atualiza($user, false);
                return true;
            }
            else{
                return false;   
            }
        }else{
            return false;
        }
    }
    public function pesquisarPorEmail($email){
        if($email != ""){
            $stmt = $this->conexao->prepare("SELECT * FROM usuario WHERE Email_Usu = :email"); //Prepara para executar esse comando sql
            $stmt->bindParam(":email",$email); //Troca o :email na mensagem pelo valor da variavel email
            $stmt->execute(); //Executa o comando

            if($stmt->rowCount() > 0){ //Ve se o número de linhas retornada é maior que zero, basicamente vendo se retornou algo do banco
                $data = $stmt->fetch();
                $user = $this->buildUser($data); 

                return $user;   
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function findById($codigo){

    }
    public function changePassword(Usuario $user){

    }
    public function destroirToken(){
        $_SESSION["token"] = "";//Apaga o token da sessão
        
        $this->message->setMessage("Saida bem sucedida","Você saiu da sua conta com sucesso!","success","../html/principal.php");//Mensagem indicando que a saida da conta foi bem sucedida
    }
}

?>
