<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/carrinhoDAO.php");
require_once("../models/message.php");
require_once("../Dao/usuarioDAO.php");


$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$carrinhoDao = new carrinhoDao($conn,$BASE_URL);

$operacao = filter_input(INPUT_POST,"Operacao"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo
$codigo = filter_input(INPUT_POST,"Codigo"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo
$carrinho = $carrinhoDao->getCarrinho();
$userDao = new UsuarioDAO($conn,$BASE_URL);

if ($operacao == "AdicionarQuant") {
    $contador = filter_input(INPUT_POST,"Contador");
    $carrinhoDao->adicionarUmQuantidade($contador);
    header("Location:" . $_SERVER["HTTP_REFERER"]);
}else if ($operacao == "Diminuir") {
    $contador = filter_input(INPUT_POST,"Contador");
    $carrinhoDao->diminuirUmQuantidade($contador);
    header("Location:" . $_SERVER["HTTP_REFERER"]);
}    
else if($operacao == "Adicionar"){
    foreach($carrinho as $produto){
        if($produto == $codigo){
            $flag = true;
        }
    }

    if($flag == false){
        $a = $carrinho;
        $carrinhoDao->adicionarItemCarrinho($codigo);
        $carrinhoDao->adicionarItemQuantidade();
        $message->setMessage("Adicionado","Item adicionado no carrinho ","success","back");
    }
    else{
        $message->setMessage("Brinquedo já adicionado ", "Este brinquedo já foi adicionado no carrinho", "error", "back");
    }
}else if($operacao == "Compra"){
    $usuarioData = $userDao->verificarToken(false);
    if($usuarioData){
        if(count($carrinho) == 0){
            $message->setMessage("Carrinho vazio","O carrinho está vazio, coloque brinquedos nele para realizar uma compra","error","back");
        }else{
            header("Location: ../html/Pagamento.php");
        }
    }else{
        $message->setMessage("Faça login","É obrigatório entrar em uma conta antes de finalizar a compra","error","back");
    }
}
else if($operacao == "Deletar"){
    $carrinhoDao->deletarTodosItensCarrinho();
    $message->setMessage("Itens deletados","Todos os itens dos carrinhos foram deletados","success","back");
} 
else if($operacao == "Excluir"){
    $contador = filter_input(INPUT_POST,"Contador"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo
    $carrinhoDao->deletarItemCarrinho($contador);
    $message->setMessage("Item deletado","O produto requisitado foi deletado","success","back");
}

?>