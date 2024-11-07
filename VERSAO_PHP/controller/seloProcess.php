<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/seloDAO.php");
require_once("../models/selo.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$seloDao = new SeloDAO($conn,$BASE_URL);

// Captura os dados do formulário
$nome = filter_input(INPUT_POST, 'nome');
$icon = filter_input(INPUT_POST, 'icon');

if ($nome, $icon) {
    $selo = new Selo();

    $selo->setNomeSelo($nome);
    $selo->setIconSelo($icon);

    $seloDao = new SeloDao($conn);

    if ($seloDao->inserirSelo($selo)) {
        $message->setMessage("Selo adicionado", "A categoria foi adicionada ao site", "success", "back");
    } else {
        $message->setMessage("Erro", "Houve um erro ao inserir a categoria", "error", "back");
    }
} else {
    $message->setMessage("Erro!", "Por favor, preencha o campo.", "error", "back");
}
?>