<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/usuarioDAO.php");
require_once("../models/usuario.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$userDao = new UsuarioDAO($conn,$BASE_URL);

$tipo = filter_input(INPUT_POST,"Tipo"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo

if($tipo === "Cadastro"){ //Entra aqui caso $tipo tenha o valor Cadastro
    $nome = filter_input(INPUT_POST, "Nome_Usu");
    $nasc = filter_input(INPUT_POST, "Nasc_Usu");
    $email = filter_input(INPUT_POST, "Email_Usu");
    $senha = filter_input(INPUT_POST, "Senha_Usu");
    $confirmar = filter_input(INPUT_POST, "Senha_Usu_Confirm");
    $celular = filter_input(INPUT_POST, "Celular_Usu");
    $tipo = filter_input(INPUT_POST, "Tipo_Usu");

    if($nome && $nasc && $email && $senha && $confirmar && $celular && $tipo){ //Verifica se todos os campos estão preenchidos
        if($senha == $confirmar){//Verifica se a senha e confirmação são iguais
            if(strlen($senha)>10){//Confere se a senha possui mais de dez caracteres
                if($userDao->pesquisarPorEmail($email) === false){
                $usuario = new Usuario();

                //Criando token e senha
                $usuarioToken = $usuario->gerarToken();
                $senhaFinal = $usuario->gerarSenha($senha);

                $usuario->setNome($nome);
                $usuario->setNasc($nasc);
                $usuario->setEmail($email);
                $usuario->setCelular($celular);
                $usuario->setTipo($tipo);
                $usuario->setSenha($senhaFinal);
                $usuario->setToken($usuarioToken);

                $auth = true;

                $userDao->criar($usuario,$auth);
            }
            else{
                $message->setMessage("Email já Cadastrado","O email inserido já possui um cadastro","error","back"); 
            }
        }else{
            $message->setMessage("Falha na senha","A senha e a confirmação são diferente","error","back");
        }

    } else{
        $message->setMessage("Erro!","Por favor, preeencha os campos faltantes","error","back");
    }

    }
} else if ($tipo == "Login"){
    $email = filter_input(INPUT_POST, "Email_Usu");
    $senha = filter_input(INPUT_POST, "Senha_Usu");

    //Se login der certo
    if($userDao->autenticarUsuario($email,$senha)){

    }
    //Se não
    else{
        $message->setMessage("Erro!","Email e/ou senha incorretos","error","back");
    }
} else {
    $message->setMessage("Erro!","Informações invalidas","error","../html/principal.php");
}
?>