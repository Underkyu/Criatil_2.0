<?php
require_once("../global.php");
require_once("../conexao.php");
require_once("../Dao/usuarioDAO.php");
require_once("../../models/usuario.php");
require_once("../../models/message.php");

$message = new Message($BASE_URL);

$nome = filter_input(INPUT_POST, "Nome_Usu");
$nasc = filter_input(INPUT_POST, "Nasc_Usu");
$email = filter_input(INPUT_POST, "Email_Usu");
$senha = filter_input(INPUT_POST, "Senha_Usu");
$confirmar = filter_input(INPUT_POST, "Senha_Usu_Confirm");
$celular = filter_input(INPUT_POST, "Celular_Usu");
$tipo = filter_input(INPUT_POST, "Tipo_Usu");

if($nome && $nasc && $email && $senha && $confirmar && $celular && $tipo){
    if($senha === $confirmar){
        
    }else{
        $message->setMessage("Falha na senha","A senha e confirmação são diferente","error","back");
    }

} else{
    $message->setMessage("Erro!","Por favor, preeencha os campos faltantes","error","back");
}
?>