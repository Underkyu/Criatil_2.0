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
        $user->codigo = $data["codigo"];
        $user->codigo = ["nome"];
        $user->codigo = ["nasc"];
        $user->codigo = ["celular"];
        $user->codigo = ["email"];
        $user->codigo = ["senha"];
        $user->codigo = ["tipo"];
        $user->codigo = ["token"];

        return user;
    }
    public function create(User $user, $authUser = false){

    }
    public function update(User $user){

    }
    public function findByToken($token){

    }
    public function verifyToken($protected = false){

    }
    public function setTokenToSession($token, $redirect = true){

    }
    public function authenticateUser($email, $password){

    }
    public function findByEmail($email){

    }
    public function findById($codigo){

    }
    public function changePassword(User $user){

    }
}

?>
