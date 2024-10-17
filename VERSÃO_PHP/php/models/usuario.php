<?php
//Classe que serve como modelo da entidade usuario
class Usuario{

    private $codigo;
    private $nome;
    private $nasc;
    private $celular;
    private $email;
    private $senha;
    private $tipo;
    private $token;
   
    
    /*
    Getters e setters de cada variável
    Getter: Retorna o valor da variável
    Setter: Muda o valor da variável para o parametro passado
    */
    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNasc(){
        return $this->nasc;
    }

    public function setNasc($nasc){
        $this->nasc = $nasc;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
}


interface UsuarioDAOInterface {
    public function buildUser($data);
    public function create(User $user, $authUser = false);
    public function update(User $user);
    public function findByToken($token);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $password);
    public function findByEmail($email);
    public function findById($codigo);
    public function changePassword(User $user);
}

?>