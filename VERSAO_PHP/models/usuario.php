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
    private $imagem;
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

    public function getImagem(){
        return $this->imagem;
    }

    public function setImagem($imagem){
        $this->imagem = $imagem;
    }

    public function getToken(){
        return $this->token;
    }

    public function setToken($token){
        $this->token = $token;
    }

    public function gerarToken(){
        return bin2hex(random_bytes(50));
    }

    public function gerarSenha($senha){
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    public function imageGenerateName(){
        return bin2hex(random_bytes(60));
    }
}


interface UsuarioDAOInterface {
    public function buildUser($data);
    public function criar(Usuario $usuario, $authUser = false);
    public function atualiza(Usuario $usuario, $redirect = true);
    public function pesquisarPorToken($token);
    public function verificarToken($protected = false);
    public function tokenParaSessao($token, $redirect = true);
    public function autenticarUsuario($email, $password);
    public function pesquisarPorEmail($email);
    public function findById($codigo);
    public function changePassword(Usuario $user);
    public function destroirToken();
}

?>