<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/usuarioDAO.php");
require_once("../models/usuario.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$userDao = new UsuarioDAO($conn,$BASE_URL);

$tipo = filter_input(INPUT_POST,"Tipo"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo

if($tipo === "Atualizar"){
    print_r($_POST);
}else if($tipo === "Senha"){

} else {
    $message->setMessage("Erro!","Informações invalidas $tipo a sda","error","../html/principal.php");
}