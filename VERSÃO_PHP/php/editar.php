<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/Criatil_2.0/VERSÃO_PHP/php/controller/usuarioController.php";

$codigo = $_GET['Codigo_Usu'];

$usuariocontroller = new usuarioController();
$usuarios = $usuariocontroller->buscarPorCodigo($codigo);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tela de Cadastro</title>
</head>
<body>
<div class="container">
        <h2>Cadastro</h2> <!--Título-->
        <form method="POST" action="controller/usuarioController.php"><!--Formulario onde os dados serão inseridos-->
<!-- começo -->
        <br>
            <label for="nome">Nome:</label>
         <input type="text" id="nome" name="Nome_Usu" value="<?= $usuarios['Nome_Usu'] ?>" placeholder="Digite o nome"><br>
        <br>
          <label for="nascimento">Data de nascimento:</label>
            <input type="date" id="nascimento" name="Nasc_Usu" value="<?= $usuarios['Nasc_Usu'] ?>" placeholder="Digite o nascimento"><br>
        <br>
          <label for="celular">Celular:</label>
          <input type="text" id="celular" name="Celular_Usu" value="<?= $usuarios['Celular_Usu'] ?>" placeholder="Digite o celular"><br>
        <br>
           <label for="email">Email:</label>
           <input type="text" id="email" name="Email_Usu" value="<?= $usuarios['Email_Usu'] ?>" placeholder="Digite o email"><br>
        <br>
           <label for="senha">Senha:</label>
           <input type="password" id="senha" name="Senha_Usu" value="<?= $usuarios['Senha_Usu'] ?>" placeholder="Digite a senha"><br>
        <br>
          <label for="tipo">Tipo de conta:</label>
        <input type="text" id="tipo" name="Tipo_Usu" value="<?= $usuarios['Tipo_Usu'] ?>" placeholder="Digite o tipo"><br>
        <br>
<!-- fim -->
 
            <input type="hidden" class="form-control" name="crud" value="UPDATE">
            <input type="hidden" class="form-control" name="Codigo_Usu" value="<?= $usuarios['Codigo_Usu'] ?>">
            <!-- Botão para submeter o formulário -->
            <button type="submit" class="btn btn-primary">Editar</button>
            
            </form>
        </div>
</body>
</html>