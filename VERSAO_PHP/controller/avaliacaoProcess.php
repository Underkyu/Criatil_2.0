<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/avaliacaoDAO.php");
require_once("../Dao/usuarioDAO.php");
require_once("../models/Avaliacao.php");
require_once("../models/message.php");

$userDao = new UsuarioDAO($conn,$BASE_URL);

$avaliacaoDao = new AvaliacaoDAO($conn,$BASE_URL);

$avaliacao = new Avaliacao();

$usuarioData = $userDao->verificarToken(true);

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem
$tipo = filter_input(INPUT_POST,"Tipo"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo
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
}elseif($tipo === "Criar") {
    $codBrinq = filter_input(INPUT_POST, "Codigo_Brinq");
    $codUsu = $usuarioData->getCodigo();
    $notaAva = filter_input(INPUT_POST, "Nota_Ava");
    $comentAva = filter_input(INPUT_POST, "Comentario");
    $tituloAva = filter_input(INPUT_POST, "Titulo_Ava");

    $notaAva = str_replace(',', '.', $notaAva);
    if(isset($notaAva, $comentAva, $tituloAva) && $notaAva !== '' && $comentAva !== '' && $tituloAva !== '') {
        $avaliacao = new Avaliacao();

        $avaliacao->setCodigoBrinq($codBrinq);
        $avaliacao->setCodigoUsu($codUsu);
        $avaliacao->setNotaAva($notaAva);
        $avaliacao->setComentario($comentAva);
        $avaliacao->setTituloAva($tituloAva);

        $avaliacaoDao->criarA($avaliacao);

        // atualiza a nota do brinquedo no banco
        $mediaNota = $avaliacaoDao->calculaMediaNota($codBrinq);
        $resultado = $avaliacaoDao->atualizaNota($codBrinq, $mediaNota); 
        if($resultado !== false){
        $message->setMessage("Avaliação adicionada", "A avaliação foi adicionada ao site.", "success", "back");
    }else{
        $message->setMessage("Erro", "Erro ao adicionar a avaliação ao site, tente novamente", "error", "back");
    }
    } else {
        $message->setMessage("Campos vazios","Alguns campos não foram preenchidos, tente novamente","error","back");
    }
}