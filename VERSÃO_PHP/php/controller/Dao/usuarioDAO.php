<?php 

require_once("../../models/usuario.php");

class UsuarioDAO implements UsuarioDAOInterface {   
    private $conexao;
    private $url;

    public function __construct(PDO $conexao, $url){
        $this->conexao = $conexao;
        $this->url = $url;
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
    public function criar(Usuario $usuario, $authUser = false){
        $stmt = $this->conexao->prepare("INSERT INTO usuario(
            Nome_Usu,Nasc_Usu,Celular_Usu,Email_Usu,Senha_Usu,Tipo_usu,Token
        ) VALUES (
            :nome, :nasc, :cel, :email, :senha, :tipo, :token
        )");

        $user = $usuario->getNome();
        $nasci = $usuario->getNasc();
        $cel = $usuario->getCelular();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $tipo = $usuario->getTipo();
        $token = $usuario->getToken(); 

        $stmt->bindParam(":nome", $user);
        $stmt->bindParam(":nasc", $nasci);
        $stmt->bindParam(":cel", $cel);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":token", $token);

        $stmt->execute();
    }
    public function update(Usuario $user){

    }
    public function findByToken($token){

    }
    public function verifyToken($protected = false){

    }
    public function setTokenToSession($token, $redirect = true){

    }
    public function authenticateUser($email, $password){

    }
    public function pesquisarPorEmail($email){
        if($email != ""){
            $stmt = $this->conexao->prepare("SELECT * FROM usuario WHERE Email_Usu = :email"); //Prepara para executar esse comando sql
            $stmt->bindParam(":email",$email); //Troca o :email na mensagem pelo valor da variavel email
            $stmt->execute(); //Executa o comando

            if($stmt->rowCount() > 0){ //Ve se o número de linhas retornada é maior que zero, basicamente vendo se retornou algo do banco
                $data = $stmt->fetch();
                $user = $this->buildUser($data); 
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
}

?>
