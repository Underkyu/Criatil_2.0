<?php
require_once("../controller/conexao.php");
require_once("../controller/global.php");

$stmt = $conn->prepare("SELECT * FROM usuario");
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes cadastrados</title>
    <link rel="stylesheet" href="../css/clientesGrnt.css">
    <script src="../js/grntPesquisa.js"></script>
    <script src="../js/grntDetalhes.js"></script>
</head>
<body>

<?php include("headerGrnt.php") ?> 
    <div class="container">

        <h1 class="titulo">Clientes Cadastrados</h1> <!--Titulo em cima da caixa dos clientes-->


        <div class="fundo"> <!--Fundo azul que fica atrás dos clientes-->

            <div class="box_brinquedos" id="brinquedos-container"><!--Div que contem os clientes-->

            <div class="titulos"> <!--Titulos que mostram a qual informação o valor é relativo-->
                    <div class="titulo">Foto</div>
                    <div class="titulo">Nome</div>
                    <div class="titulo">ID</div>
                    <div class="titulo">Tipo</div>
                    <div class="titulo">Ver detalhes</div>
                </div>
 <!--Div que contem um dos clientes-->
                <?php 
                    foreach ($usuarios as $usuario) {
                ?>
                <div class="brinquedo">
                    <div class="foto">
                        <img src="<?php echo $usuario['Imagem']; ?>" alt="Foto de Perfil" class="foto"><!--Foto-->
                    </div>
                    <p class="informacao"><?php echo $usuario['Nome_Usu']; ?></p> <!--Nome-->
                    <p class="informacao"><?php echo $usuario['Codigo_Usu']; ?></p> <!--Id-->
                    <p class="informacao"><?php echo $usuario['Tipo_Usu']; ?></p> <!--Status-->
                    
                    <form method="POST" action="" class="form-flex" id="detalhes-form-<?php echo $usuario['Codigo_Usu']; ?>">
                        <input type="hidden" name="codigo_usuario" value="<?php echo $usuario['Codigo_Usu']; ?>">
                            <div class="botao_detalhes">
                            <!-- 'data-' é um tipo de atributo q guarda data; nesse caso tá guardando
                                  a info do usuário do foreach atual e enviando pro JS (grntDetalhes.js),
                                  que vai colocar essa informação no form usando as IDs das inputs -->
                            <button type="button" class="detalhes" 
                                data-codigo="<?php echo $usuario['Codigo_Usu']; ?>"
                                data-nome="<?php echo $usuario['Nome_Usu']; ?>"
                                data-nascimento="<?php echo $usuario['Nasc_Usu']; ?>"
                                data-celular="<?php echo $usuario['Celular_Usu']; ?>"
                                data-email="<?php echo $usuario['Email_Usu']; ?>"
                                data-tipo="<?php echo $usuario['Tipo_Usu']; ?>">
                                Detalhes
                            </button>
                            </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="acoes">
            <div class="pesquisar">
                <input type="text" id="txtPesquisa" class="pesquisar" placeholder="Pesquisar cliente">
            </div>
        </div>
    </div>

    <div id="form-container" class="formInsert">
    <form id="formInsert-Brinquedo" class="formInsert-Brinquedo">
        <h2>Informação do Cliente</h2>
        
        <label for="nome">Código do Usuário:</label>
        <input type="text" id="codigo" name="Codigo_Usu">

        <label for="preco">Nome do Usuário:</label>
        <input type="text" id="nome" name="Nome_Usu">

        <label for="nascimento">Data de Nascimento:</label>
        <input type="text" id="nascimento" name="Nasc_Usu">

        <label for="celular">Celular:</label>
        <input type="text" id="celular" name="Celular_Usu">

        <label for="email">E-mail:</label>
        <input type="text" id="email" name="Email_Usu">

        <label for="tipo">Tipo de Usuário:</label>
        <input type="text" id="tipo" name="Tipo_Usu">

    </form>
</body>
</html>