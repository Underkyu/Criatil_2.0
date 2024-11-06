<?php
require_once("../controller/global.php");
require_once("../controller/conexao.php");
require_once("../Dao/usuarioDAO.php");
require_once("../models/usuario.php");


$userDao = new UsuarioDAO($conn,$BASE_URL);

$usuarioData = $userDao->verificarToken(true);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- link da fonte pro css saber que fonte usar -->
    <link rel="stylesheet" href="../css/conta.css">
    <script src="../js/menuSanduicheCONTA.js" defer></script>
    <script src="../js/conta.js" defer></script>
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Criatil - Conta</title>
</head>
<body>

<?php include("header.php");?>

    <div class="container">
    <!-- página da conta -->
                <!-- 'navbar-conta' é a barra da esquerda com as páginas -->
         <div class="navbar-container" id="navbar-conta"> 
             <div class="lateral-conta">
                  <img class="img-lateral" src=<?php
                        if($usuarioData->getImagem() == "vazio") {;
                            print_r("../imagens/usuarios/usuario.png"); 
                            
                        }else{
                            print_r("../imagens/usuarios/".$usuarioData->getImagem().".jpeg");
                        }?>>
                  <h1 class="nome-lateral"><?php print_r($usuarioData->getNome());?></h1>
             </div>
             <div class="paginas">
                  <a href="#" class="pagina-selecionada">Perfil</a>
                  <a href="./pedidos.php" class="paginas-navbar">Pedidos</a>
                  <a href="./desejos.php" class="paginas-navbar">Lista de Desejos</a>
                  <a href="./cartoes.php" class="paginas-navbar">Cartões</a>
                  <a href="../controller/logout.php" class="paginas-navbar" id="sair">Sair</a>
             </div>
        </div>
                 <!-- botão do menu sanduíche-->
                  <div class="sanduiche-div">
                       <button class="menuSanduiche" onclick="blockConta()">
                        <h1>Minha Conta </h1>
                          <img id="imagemSanduiche" src="../imagens/Icons/arrow2.png" alt="Menu Sanduiche" class="menuSanduiche">
                        </button>
                  </div>
                  <!-- fim do botão do menu sanduíche-->

                <!-- div do menu sanduíche -->
                        <div class="menuSanduicheConta" id="menuSanduicheConta">
                            <div class="link_header link_sanduiche">
                                <a href="#" class="pagina-selecionada">Perfil</a>
                            </div>
            
                            <div class="link_header link_sanduiche">
                                <a href="./pedidos.php" class="paginas-navbar">Pedidos</a>
                            </div>
            
                          <div class="link_header link_sanduiche">
                            <a href="./desejos.php" class="paginas-navbar">Lista de Desejos</a>
                          </div>

                          <div class="link_header link_sanduiche">
                            <a href="./cartoes.php" class="paginas-navbar">Cartões</a>
                          </div>

                          <div class="link_header link_sanduiche">
                            <a href="../controller/logout.php" class="paginas-navbar">Sair</a>
                          </div>
                        </div>
                <!-- fim da div do menu sanduíche-->

        <!-- 'box' é a caixa da direita com a informação da página escolhida -->
        <div class="box-container" id="box">
            <h1 class="titulo-box">Perfil</h1>
               <div class="perfil-container" id="perfil">
                <div class="informacoes">
                     <!--Formulario de troca de dados-->   
                    <form action="../controller/usuarioProccess.php" method="POST" enctype="multipart/form-data">
                    <div class="info-item">
                        <div class="info-label">Nome completo:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" value="<?php echo htmlspecialchars($usuarioData->getNome()); ?>" name="Nome_Usu">
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Data de nascimento:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="date" value=<?php print_r($usuarioData->getNasc());?> name="Nasc_Usu">
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" value=<?php print_r($usuarioData->getEmail());?> name="Email_Usu" readonly>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Celular:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" value="<?php echo htmlspecialchars($usuarioData->getCelular()); ?>" name="Nome_Usu">
                        </div>
                    </div>
                    <input type="hidden" name="Tipo" value="Atualizar"> <!--Input para identificar que operação será feita-->
                    <input type="file" name="imagem_file" id="imagem_file">
                    <input type="hidden" id="tipo" name="Tipo_Usu" placeholder="Carregando.." class="input-login" value="Cliente">
                    <button class="editar" type="submit">Editar</button>
                    </form>
                    
                    <!--Formulario de troca de senha-->
                    <form action="../controller/usuarioProccess.php" method="POST">
                    <h2 class="troque_senha">Troque sua senha</h2>
                    <div class="info-item">
                        <div class="info-label">Senha atual:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" placeholder="Senha atual" name="Atual_Senha">
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Senha nova:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" placeholder="Senha nova" name="Nova_Senha">
                        </div>
                    </div>
                    <input type="hidden" name="Tipo" value="Senha"> <!--Input para identificar que operação será feita-->
                    <button class="editar" type="submit">Atualizar</button>
                    </form>
                </div>

                <div class="conta-box">
                    <div class="img-container" id="img-container"> 
                        <img src=<?php
                        if($usuarioData->getImagem() == "vazio") {;
                            print_r("../imagens/usuarios/usuario.png"); 
                            
                        }else{
                            print_r("../imagens/usuarios/".$usuarioData->getImagem().".jpeg");
                        }?> class="img-conta">


                        <div class="editar-icone">
                        <button class="editar-img"> <!-- botão pra editar imagem do usuário-->
                            <img src="../imagens/Icons/Editar.png" class="icone-editar">
                        </button>
                        </div>
                    </div>
                    <h2 class="nome-conta"><?php print_r($usuarioData->getNome()) ?></h2>
                </div>
               </div>   
        </div>
            <!-- fim da página da conta -->
    </div>

<?php include("footer.php") ?>
</body>
</html>