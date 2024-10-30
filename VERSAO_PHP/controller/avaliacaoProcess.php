<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/avaliacaoDAO.php");
require_once("../models/avaliacao.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$avaliacaoDao = new AvaliacaoDAO($conn,$BASE_URL);

$tipo = filter_input(INPUT_POST,"Tipo"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo

$avaliacao = new Avaliacao();

if($tipo === "Deletar"){
    $codAva = filter_input(INPUT_POST, "codigoAva");
    $nomeUsu = filter_input(INPUT_POST, "nomeUsu");

    if($codAva && $nomeUsu){
        $avaliacao = new Avaliacao();

        $avaliacao->setCodigoAva($codAva);
        $avaliacao->setCodigoUsu($nomeUsu);

        $avaliacaoDao->deleta($avaliacao);
    }else{
        $message->setMessage("Erro", "Informações da avaliação não encontradas","error","back");
    }
}