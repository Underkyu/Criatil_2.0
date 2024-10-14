<?php
//Importa arquivo "usuario.php"
//require_once '../model/usuario.php'; Vesão manual
require_once $_SERVER['DOCUMENT_ROOT'] . '/Criatil_2.0/VERSÃO_PHP/php/model/usuario.php';

//Classe que atribui os valores passados no "index.php" aos atributos da classe "Usuario"
class UsuarioController{
    private $usuario; //Variável que armazenará objeto da classe "Usuario"

    //Método construtor (executado quando a classe é instanciada)
    public function __construct() {
        
        $this->usuario = new Usuario(); //Objeto da classe "Usuario" é armazenado na variável "usuario"
        
        if(isset($_POST['crud'])){
           
            if($_POST['crud']=="INSERT"){
                $this->inserir();
            }elseif($_POST['crud']=="UPDATE"){
                 $this->atualizar();
            }elseif($_POST['crud']=="DELETE"){
                $this->deletar();
            }
        }else{
            $this->listar();
        }
        
    }

    //Função que insere informações da classe usuario
    public function inserir(){
        // Atribui os valores do formulário
        $this->usuario->setNome($_POST['Nome_Usu']);
        $this->usuario->setNasc($_POST['Nasc_Usu']);
        $this->usuario->setCelular($_POST['Celular_Usu']);
        $this->usuario->setEmail($_POST['Email_Usu']);
        $this->usuario->setSenha($_POST['Senha_Usu']);
        $this->usuario->setTipo($_POST['Tipo_Usu']);
    
        // Tenta inserir os dados
        if ($this->usuario->inserir()) {
            // Redireciona para a página de sucesso
            header("Location: /Criatil_2.0/VERSÃO_PHP/php/sucesso.php");
        } else {
            // Redireciona para a página de erro
            header("Location: /Criatil_2.0/VERSÃO_PHP/php/erro.php");
        }
        exit; // Para garantir que nada mais seja executado após o redirecionamento
    }
    
    
    //Chama a função listar da classe usuario
    public function listar(){
        return $this->usuario->listar(); //Executa e retorna o valor da função listar da classe usuario
    }  

    public function buscarPorCodigo($codigo){
        return $this->usuario->buscarPorCodigo($codigo);
    }
    public function atualizar(){
        $this->usuario->setCodigo($_POST['Codigo_Usu']);
        $this->usuario->setNome($_POST['Nome_Usu']);
        $this->usuario->setNasc($_POST['Nasc_Usu']);
        $this->usuario->setCelular($_POST['Celular_Usu']);
        $this->usuario->setEmail($_POST['Email_Usu']);
        $this->usuario->setSenha($_POST['Senha_Usu']);
        $this->usuario->setTipo($_POST['Tipo_Usu']);

        $this->usuario->atualizar($this->usuario->getCodigo());
    }

    public function deletar(){
        $this->usuario->setCodigo($_POST['Codigo_Usu']);
        return $this->usuario->delete($this->usuario->getCodigo());

    }
}

//Instancia a classe "UsuarioController"
new UsuarioController();

?>