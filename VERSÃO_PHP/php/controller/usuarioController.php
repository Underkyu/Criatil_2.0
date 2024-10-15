<?php
//Importa arquivo "usuario.php"
//require_once '../model/usuario.php'; Vesão manual
require_once $_SERVER['DOCUMENT_ROOT'] . '/Criatil_2.0/VERSÃO_PHP/php/models/usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Criatil_2.0/VERSÃO_PHP/php/models/message.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Classe que atribui os valores passados no "index.php" aos atributos da classe "Usuario"
class UsuarioController{
    private $usuario; //Variável que armazenará objeto da classe "Usuario"
    private $message; //variável que armazena a mensagem do sistema 

    //Método construtor (executado quando a classe é instanciada)
    public function __construct() {
        $this->usuario = new Usuario();
        $this->message = new Message("http://" . $_SERVER['HTTP_HOST'] . "/Criatil_2.0/VERSÃO_PHP/");

        if (isset($_POST['crud'])) {
            switch ($_POST['crud']) {
                case "INSERT":
                    $this->inserir();
                    break;
                case "UPDATE":
                    $this->atualizar();
                    break;
                case "DELETE":
                    $this->deletar();
                    break;
                case "SELECT":
                    $this->entrar();
                    break;
                default:
                    $this->listar();
                    break;
            }
        } else {
            $this->listar();
        }
    }

    public function buscarPorCodigo($codigo){
        return $this->usuario->buscarPorCodigo($codigo);
    }

    public function inserir() {
        $this->usuario->setNome($_POST['Nome_Usu']);
        $this->usuario->setNasc($_POST['Nasc_Usu']);
        $this->usuario->setEmail($_POST['Email_Usu']);
        $this->usuario->setSenha($_POST['Senha_Usu']);
        $this->usuario->setCelular($_POST['Celular_Usu']);
        $this->usuario->setTipo($_POST['Tipo_Usu']);

        if ($this->usuario->inserir()) {
            $this->message->setMessage("Cadastro realizado com sucesso!", "success");
        } else {
            $this->message->setMessage("Erro ao cadastrar, tente novamente.", "error");
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    public function atualizar(){
        $this->usuario->setCodigo($_POST['Codigo_Usu']);
        $this->usuario->setNome($_POST['Nome_Usu']);
        $this->usuario->setNasc($_POST['Nasc_Usu']);
        $this->usuario->setCelular($_POST['Celular_Usu']);
        $this->usuario->setEmail($_POST['Email_Usu']);
        $this->usuario->setSenha($_POST['Senha_Usu']);
        $this->usuario->setTipo($_POST['Tipo_Usu']);

        if ($this->usuario->atualizar($this->usuario->getCodigo())) {
            $this->message->setMessage("Dados atualizados com sucesso!", "success");
        } else {
            $this->message->setMessage("Erro ao atualizar a conta.", "error");
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    public function deletar() {
        $this->usuario->setCodigo($_POST['Codigo_Usu']);
        if ($this->usuario->delete($this->usuario->getCodigo())) {
            $this->message->setMessage("Usuário deletado com sucesso.", "success");
        } else {
            $this->message->setMessage("Erro ao deletar o usuário.", "error");
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    public function entrar() {
        $this->usuario->setEmail($_POST['Email_Usu']);
        $this->usuario->setSenha($_POST['Senha_Usu']);

        $fazerLogin = $this->usuario->entrar();

        if ($fazerLogin) {
            $this->message->setMessage("Login realizado com sucesso!", "sucesso");
        } else {
            $this->message->setMessage("E-mail ou senha incorretos, tente novamente.", "erro");
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    public function listar(){
        return $this->usuario->listar();
    }  
}

new UsuarioController();

?>