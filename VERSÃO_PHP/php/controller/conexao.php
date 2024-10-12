<?php

//Classe que conecta o php ao banco de dados
class Conexao {
    private $host = "localhost"; //nome do host do banco de dados
    private $usuario = "root"; //Nome do usuario
    private $senha = ""; //Senha
    private $banco = "criatil"; //Nome do banco
    private $conexao;   //Variável que conectará o banco

    //Método construtor (executado quando a classe é instanciada)
    public function __construct() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco); //Variável "conexao" realizando a conexão com o banco

        //Excessão para caso ocorra algum erro durante a conexão
        if($this->conexao->connect_error){
            die("Falha na conexão: " . $this->conexao->connect_error); //Mensagem de erro que é emitida, caso um erro ocorra (Falaha na conexão: + nome do erro)
        }
    }

    //Função getter da variável conexao
    public function getConexao(){
        return $this->conexao; //Retorna o valor da variável conexão
    }
}

?>