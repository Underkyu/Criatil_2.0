<?php
require_once("../controller/conexao.php");
require_once("../controller/global.php");
require_once("../Dao/usuarioDAO.php");

$stmt = $conn->prepare("SELECT * FROM usuario");
$stmt->execute();

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
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
                    <div class="titulo">Código</div>
                    <div class="titulo">Tipo</div>
                    <div class="titulo">Ver detalhes</div>
                </div>
 <!--Div que contem um dos clientes-->
                <?php 
                    foreach ($usuarios as $usuario) {

                    $usuarioData = $userDao->pesquisarPorEmail($usuario['Email_Usu']);    
                ?>
                <div class="brinquedo">
                    <div class="foto">
                    <img src=<?php
                        if($usuarioData->getImagem() == "vazio") {;
                            print_r("../imagens/usuarios/usuario.png"); 
                            
                        }else{
                            print_r("../imagens/usuarios/".$usuarioData->getImagem().".jpeg");
                        }?> alt="Foto de perfil" class="foto"/><!--Foto-->
                    </div>
                    <p class="informacao"><?php echo $usuarioData->getNome(); ?></p> <!--Nome-->
                    <p class="informacao"><?php echo $usuarioData->getCodigo(); ?></p> <!--Id-->
                    <p class="informacao"><?php echo $usuarioData->getTipo(); ?></p> <!--Status-->
                    
                    <form method="POST" action="" class="form-flex" id="detalhes-form-<?php echo $usuario['Codigo_Usu']; ?>">
                            <div class="botao_detalhes">
                            <!-- 'data-' é um tipo de atributo q guarda data; nesse caso tá guardando
                                  a info do usuário do foreach atual e enviando pro JS (grntDetalhes.js),
                                  que vai colocar essa informação no form usando as IDs das inputs -->
                            <button type="button" class="detalhes" 
                                data-tipo="usuario"
                                data-codigoUsu="<?php echo $usuario['Codigo_Usu']; ?>"
                                data-nomeUsu="<?php echo $usuario['Nome_Usu']; ?>"
                                data-nascimentoUsu="<?php echo $usuario['Nasc_Usu']; ?>"
                                data-celularUsu="<?php echo $usuario['Celular_Usu']; ?>"
                                data-emailUsu="<?php echo $usuario['Email_Usu']; ?>"
                                data-tipoUsu="<?php echo $usuario['Tipo_Usu']; ?>">
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
    <form id="formInsert-Brinquedo" class="formInsert-Brinquedo" method="POST" action="../controller/usuarioProccess.php">
        <h2>Informação do Cliente</h2>
        
        <label for="nome">Código do Usuário:</label>
        <input type="text" id="codigo" name="Codigo_Usu" readonly>

        <label for="preco">Nome do Usuário:</label>
        <input type="text" id="nome" name="Nome_Usu" readonly>

        <label for="nascimento">Data de Nascimento:</label>
        <input type="text" id="nascimento" name="Nasc_Usu" readonly>

        <label for="celular">Celular:</label>
        <input type="text" id="celular" name="Celular_Usu" readonly>

        <label for="email">E-mail:</label>
        <input type="text" id="email" name="Email_Usu" readonly>

        <label for="tipo">Tipo de Usuário:</label>
        <select id="tipo" name="Tipo_Usu" onchange="this.form.submit()" class="select-tipo">
            <option value="Cliente" <?php if (isset($usuario['Tipo_Usu']) && $usuario['Tipo_Usu'] === 'Cliente') echo 'selected'; ?>>Cliente</option>
            <option value="Gerente" <?php if (isset($usuario['Tipo_Usu']) && $usuario['Tipo_Usu'] === 'Gerente') echo 'selected'; ?>>Gerente</option>
            <option value="Bloqueado" <?php if (isset($usuario['Tipo_Usu']) && $usuario['Tipo_Usu'] === 'Bloqueado') echo 'selected'; ?>>Bloqueado</option>
        </select>
        <input type="hidden" name="Tipo" value="AtualizarTipo">
    </form>
</div>

<?php include("footer.php") ?>
</body>
</html>