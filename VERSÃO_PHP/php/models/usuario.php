<?php
//Importa arquivo "conexao.php"
require_once $_SERVER['DOCUMENT_ROOT'] . '/Criatil_2.0/VERSÃO_PHP/php/controller/conexao.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Classe que serve como modelo da entidade usuario
class Usuario{

    private $codigo;
    private $nome;
    private $nasc;
    private $celular;
    private $email;
    private $senha;
    private $tipo;
    // private $token;
    private $conexao;
    
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

    //Método construtor (executado quando a classe é instanciada)
    public function __construct(){
        $this->conexao = new Conexao(); //Cria um objeto da classe "Conexao" e armazena ele dentro da variável "conexao"
    }

    public function buscarPorCodigo($codigo){
        $sql = "SELECT * FROM usuario WHERE Codigo_Usu = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i',$codigo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function atualizar($codigo){
        $sql = "UPDATE usuario SET `Nome_Usu` = ?, `Nasc_Usu` = ?, `Celular_Usu` = ?, `Email_Usu` = ?, `Senha_Usu` = ?, `Tipo_Usu` = ? WHERE `Codigo_Usu` = ? ";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssssssi', $this->nome, $this->nasc, $this->celular, $this->email, $this->senha, $this->tipo, $codigo); 
        $stmt->execute();

    }

    public function entrar(){
        $sql = "SELECT `Email_Usu`, `Senha_Usu` FROM usuario WHERE `Email_Usu` = ? AND `Senha_Usu` = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ss', $this->email, $this->senha); //Insere o dados no banco, relacionando as variveis aos atributos que representam
        $stmt->execute();

        $resultado = $stmt->get_result();

        // verifica a quantidade de linhas encontradas no select, se for maior que 0, retorna true
        // para confirmar login
        if($resultado->num_rows > 0){
            return true;
        }
    }

    //Função para inserir os dados da classe usuario no banco de dados
    public function inserir(){
        $sql = "INSERT INTO usuario(`Nome_Usu`,`Nasc_Usu`,`Email_Usu`,`Senha_Usu`,`Celular_Usu`,`Tipo_Usu`) VALUES(?,?,?,?,?,?)";  // Declaração SQL que prepara a inserção de dados
        $stmt = $this->conexao->getConexao()->prepare($sql); //Prepara a declaração anterior
        $stmt->bind_param('ssssss', $this->nome, $this->nasc, $this->email, $this->senha, $this->celular, $this->tipo); //Insere o dados no banco, relacionando as variveis aos atributos que representam
        return $stmt->execute(); //Executa a declaração e retorna resultado da execução
    }

    public function listar(){
        $sql = "SELECT * FROM usuario";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuarios = [];
        while($usuario = $result->fetch_assoc()){
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }
    
    public function delete($codigo){
        
        $sql = "DELETE FROM usuario WHERE Codigo_Usu = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codigo); // Corrigido para usar $codigo em vez de $this->codigo
        $stmt->execute();
    }
}
/*
guardando método DAO do curso caso for precisar

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
*/
?>