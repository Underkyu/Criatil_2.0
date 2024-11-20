<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/seloDAO.php");
require_once("../models/selo.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$seloDao = new SeloDAO($conn,$BASE_URL);

$tipo = filter_input(INPUT_POST, "Tipo");

if($tipo === "Inserir") {
    $nome = filter_input(INPUT_POST, 'Nome');
$imagem = filter_input(INPUT_POST, 'Imagem');

if (!empty($nome) && !empty($imagem)) {
    $selo = new Selo();

    $selo->setNomeSelo($nome);
    $selo->setImagemSelo($imagem);

    if ($seloDao->inserirSelo($selo)) {
        $message->setMessage("Selo adicionado", "O selo foi adicionado ao sistema", "success", "back");
    } else {
        $message->setMessage("Erro", "Houve um erro ao inserir o selo", "error", "back");
    }
} else {
    $message->setMessage("Erro!", "Por favor, preencha todos os campos.", "error", "back");
}
}else{
    $message->setMessage("Erro!", "Tipo não encontrado.", "error", "back");
}
?>