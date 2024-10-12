<!DOCTYPE html>
<html>
<head>
    <title>Tela de Cadastro</title>
</head>
<body>
    <div>&nbsp;</div>
    <div class="container">
        <h2>Cadastro</h2> <!--Título-->
        <form method="POST" action="controller/usuarioController.php?acao=inserir"><!--Formulario onde os dados serão inseridos-->
            <!--Campos de inserção de dados (um para cada atributo da classe "Usuario")-->
<!-- começo -->
            <br>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="Nome_Usu" placeholder="Digite o nome"><br>
            <br>
                <label for="nascimento">Data de nascimento:</label>
                <input type="date" id="nascimento" name="Nasc_Usu" placeholder="Digite o nascimento"><br>
            <br>
                <label for="celular">Celular:</label>
                <input type="text" id="celular" name="Celular_Usu" placeholder="Digite o celular"><br>
            <br>
                <label for="email">Email:</label>
                <input type="text" id="email" name="Email_Usu" placeholder="Digite o email"><br>
            <br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="Senha_Usu" placeholder="Digite a senha"><br>
            <br>
                <label for="tipo">Tipo de conta:</label>
                <input type="text" id="tipo" name="Tipo_Usu" placeholder="Digite o tipo"><br>
            <br>
<!-- fim -->
                <input type="hidden" class="form-control" name="crud" value="INSERT" disable >
            <!--Botão que executa as funções necessaria para mandar as informações passadas para o banco de dados-->
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>