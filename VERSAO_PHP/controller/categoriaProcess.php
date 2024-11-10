<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/categoriaDAO.php");
require_once("../models/categoria.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$categoriaDao = new CategoriaDAO($conn,$BASE_URL);

// Captura os dados do formulário
$nome = filter_input(INPUT_POST, 'nome');

if ($nome && $imagem) {
    $categoria = new Categoria();

    $categoria->setNomeCategoria($nome);

    if ($categoriaDao->inserirCategoria($categoria)) {
        $message->setMessage("Categoria adicionada", "A categoria foi adicionada ao site", "success", "back");
    } else {
        $message->setMessage("Erro", "Houve um erro ao inserir a categoria", "error", "back");
    }
} else {
    $message->setMessage("Erro!", "Por favor, preencha o campo.", "error", "back");
}
?>