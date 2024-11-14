<?php
require_once("global.php");
require_once("conexao.php");
require_once("../Dao/usuarioDAO.php");
require_once("../models/usuario.php");
require_once("../models/message.php");

$message = new Message($BASE_URL); //Criação de uma objeto de mansagem

$userDao = new UsuarioDAO($conn,$BASE_URL);

$tipo = filter_input(INPUT_POST,"Tipo"); //Atibui o valor o input nomeado como "Tipo" a varivel $tipo

$user = new Usuario();
if($tipo === "Atualizar"){
    $userData = $userDao->verificarToken();

    $nome = filter_input(INPUT_POST,"Nome_Usu");
    $nasc = filter_input(INPUT_POST,"Nasc_Usu");
    $email = filter_input(INPUT_POST,"Email_Usu");
    $celular = filter_input(INPUT_POST,"Celular_Usu");
    $tipo_usu = filter_input(INPUT_POST,"Tipo_Usu");

    $userData->setEmail($email);
    $userData->setNasc($nasc);   
    $userData->setCelular($celular);
    $userData->setNome($nome);
    $userData->setTipo($tipo_usu);
    $userData->setToken($_SESSION["token"]);

    //Parte que cria imagem
    if(isset($_FILES["imagem_file"]) && !empty($_FILES["imagem_file"]["tmp_name"])){
        $image = $_FILES["imagem_file"];
        $tiposImagem = ["image/jpeg", "image/jpg", "image/png"];
        $jpgArray = ["image/jpeg","image/jpg"];

        if(in_array($image["type"],$tiposImagem)){
            if(in_array($image["type"],$jpgArray)){
                $imagefile = imagecreatefromjpeg($image["tmp_name"]);
            }else{//Imagem é png
                $imagefile = imagecreatefrompng($image["tmp_name"]);
            }

            $imageNome = $user->imageGenerateName();

            // Salva a imagem como JPEG no diretório especificado
            if (imagejpeg($imagefile, "../imagens/usuarios/" . $imageNome .".jpeg", 100)) {
                // Define a imagem no usuário
                $userData->setImagem($imageNome);
            } else {
                $message->setMessage("Erro!", "Erro ao salvar a imagem","error","../html/principal.php");
            }
            
    }else{
        $message->setMessage("Erro!","Tipo de imagem invalido, insira png ou jpg","error","../html/principal.php");
    }
}

    $userDao->atualiza($userData, true);

    
}else if($tipo === "Senha"){

    $userData = $userDao->verificarToken();

    $senhaAtual = filter_input(INPUT_POST,"Atual_Senha");
    $senhaNova = filter_input(INPUT_POST,"Nova_Senha");
    $codigo = $userData->getCodigo();

    if(password_verify($senhaAtual, $userData->getSenha())){
        $senhaFinal = $userData->gerarSenha($senhaNova);
        $userData->setSenha($senhaFinal);

        $userDao->atualiza($userData,true);
    }else{
        $message->setMessage("Erro!","Senha atual incorreta","error","back");
    }
}elseif ($tipo === "updateImagem"){
    $userData = $userDao->verificarToken();

    // Parte que cria imagem
    if(isset($_FILES["imagem_file"]) && !empty($_FILES["imagem_file"]["tmp_name"])){
        $image = $_FILES["imagem_file"];
        $tiposImagem = ["image/jpeg", "image/jpg", "image/png"];
        $jpgArray = ["image/jpeg","image/jpg"];

        if(in_array($image["type"],$tiposImagem)){
            if(in_array($image["type"],$jpgArray)){
                $imagefile = imagecreatefromjpeg($image["tmp_name"]);
            } else {// Imagem é png
                $imagefile = imagecreatefrompng($image["tmp_name"]);
            }

            $imageNome = $user->imageGenerateName();

            // Salva a imagem como JPEG no diretório especificado
            if (imagejpeg($imagefile, "../imagens/usuarios/" . $imageNome .".jpeg", 100)) {
                // Define a imagem no usuário
                $userData->setImagem($imageNome);
                $userDao->atualiza($userData, true);
                $message->setMessage("Sucesso!", "Foto de perfil atualizada com sucesso!", "success", "back");
            } else {
                $message->setMessage("Erro!", "Erro ao salvar a imagem","error","back");
            }
        } else {
            $message->setMessage("Erro!","Tipo de imagem invalido, insira png ou jpg","error","back");
        }
    }
} else {
    $message->setMessage("Erro!","Informações invalidas","error","back");
}