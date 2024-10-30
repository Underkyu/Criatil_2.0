<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/sacDAO.php");
require_once("../models/sac.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$sacDao = new SacDAO($conn,$BASE_URL);

// Captura os dados do formulário
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$mensagem = filter_input(INPUT_POST, 'mensagem');

if ($nome && $email && $mensagem) {
    $sac = new Sac();

    $sac->setNomeSac($nome);
    $sac->setEmailSac($email);
    $sac->setMensagemSac($mensagem);

    $sacDao = new SacDAO($conn);

    if ($sacDao->inserirSac($sac)) {
        $message->setMessage("Mensagem enviada com sucesso!", "Sua mensagem foi enviada. Aguarde nosso contato pelo seu e-mail.", "success", "../html/principal.php");
    } else {
        $message->setMessage("Erro ao enviar a mensagem.", "Houve um erro ao enviar sua mensagem.", "error", "back");
    }
} else {
    $message->setMessage("Erro!", "Por favor, preencha todos os campos.", "error", "back");
}
?>