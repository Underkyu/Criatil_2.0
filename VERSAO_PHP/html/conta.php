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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="../js/cadastro.js"></script>
    <link rel="shortcut icon" href="../imagens/Logo/LogoAba32x32.png" type="image/x-icon">
    <title>Criatil - Conta</title>
</head>
<body>
<?php include("header.php");?>

    <div class="container">
    <!-- página da conta -->
            <div class="navbar-container">
                <div class="ft-nome-lateral">
                <div class="ft-lateral">
                  <img class="img-lateral" src=<?php
                        if($usuarioData->getImagem() == "vazio") {;
                            echo("../imagens/usuarios/usuario.png"); 
                        }else{
                            echo("../imagens/usuarios/".$usuarioData->getImagem().".jpeg");
                        }?>>
                        </div>
                        <div class="nomelat-div">
                         <h1 class="nome-lateral"><?php echo($usuarioData->getNome());?></h1>
                        </div>
                        </div>
                    <div class="paginas">
                        <a href="#" class="pagina-selecionada">Perfil</a>
                        <a href="./pedidos.php" class="paginas-navbar">Pedidos</a>
                        <a href="./desejos.php" class="paginas-navbar">Lista de Desejos</a>
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
                            <a href="../controller/logout.php" class="paginas-navbar">Sair</a>
                          </div>
                        </div>
                <!-- fim da div do menu sanduíche-->

        <!-- 'box' é a caixa da direita com a informação da página escolhida -->
        <div class="box-container" id="box">
            <h1 class="titulo-box">Perfil</h1>
               <div class="perfil-container" id="perfil">
                <div class="informacoes">
                    <div class="info-item">
                        <div class="info-label">Nome e sobrenome:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" value="<?php echo htmlspecialchars($usuarioData->getNome()); ?>" name="Nome_Usu" disabled>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Data de nascimento:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="date" value=<?php echo($usuarioData->getNasc());?> name="Nasc_Usu" disabled>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" value=<?php echo($usuarioData->getEmail());?> name="Email_Usu" disabled>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Celular:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" value="<?php echo htmlspecialchars($usuarioData->getCelular()); ?>" name="Celular_Usu" disabled>
                        </div>
                    </div>
                    <input type="hidden" name="Tipo" value="Atualizar">
                    <input type="hidden" id="tipo" name="Tipo_Usu" placeholder="Carregando.." class="input-login" value="Cliente">
                    
                    <div class="botoes">
                    <button class="editar" type="submit" id="btnEditarPerfil">Editar Perfil</button>
                    <button class="editar" type="submit" id="btnAtualizarSenha">Atualizar Senha</button>
                    </div>
                </div>

                <div class="conta-box">
                    <div class="img-container" id="img-container"> 
                        <img src=<?php
                        if($usuarioData->getImagem() == "vazio") {;
                            echo("../imagens/usuarios/usuario.png"); 
                            
                        }else{
                            echo("../imagens/usuarios/".$usuarioData->getImagem().".jpeg");
                        }?> class="img-conta">
                    <form action="../controller/usuarioProccess.php" method="POST" enctype="multipart/form-data" id="formSalvarFoto">
                        <div class="editar-icone">
                            <img src="../imagens/Icons/Editar.png" class="icone-editar">
                        </div>
                        </div>
                        <h2 class="nome-conta"><?php echo($usuarioData->getNome()) ?></h2>
                        <input type="file" name="imagem_file" id="imagem_file" required>
                        <input type="hidden" name="Tipo" value="updateImagem">
                        <button type="submit" class="editar">Salvar Foto</button>
                    </form>
                </div>
               </div>   
        </div>
            <!-- fim da página da conta -->

            <!--Formulario de troca de senha-->
            <div class="trocarSenha" id="formAtualizarSenha">
                    <form action="../controller/usuarioProccess.php" method="POST" class="form-bg-senha">
                    <h2 class="troque_senha">Troque sua senha</h2>
                    <div class="info-item">
                        <div class="info-label">Senha atual:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="password" placeholder="Senha atual" name="Atual_Senha">
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Senha nova:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="password" placeholder="Senha nova" name="Nova_Senha">
                        </div>
                    </div>
                    <input type="hidden" name="Tipo" value="Senha">
                    <button class="editar" type="submit">Confirmar</button>
                    </form>
                    </div>
             </div>

             <!--Formulario de troca de dados-->   
             <div class="editarPerfil" id="formEditarPerfil">
             <form action="../controller/usuarioProccess.php" method="POST" enctype="multipart/form-data" class="form-bg-perfil">
             <h2 class="edite_perfil">Altere suas informações</h2>
                    <div class="info-item">
                        <div class="info-label">Nome e sobrenome:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" value="<?php echo htmlspecialchars($usuarioData->getNome()); ?>" name="Nome_Usu">
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Data de nascimento:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="date" value=<?php echo($usuarioData->getNasc());?> name="Nasc_Usu">
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" value=<?php echo($usuarioData->getEmail());?> name="Email_Usu">
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Celular:</div>
                        <div class="info-value">
                        <input class="usuario-info" type="text" value="<?php echo htmlspecialchars($usuarioData->getCelular()); ?>" name="Celular_Usu" id="celular">
                        </div>
                    </div>
                    <input type="hidden" name="Tipo" value="Atualizar">
                    <input type="file" name="imagem_file" id="imagem_file">
                    <input type="hidden" id="tipo" name="Tipo_Usu" placeholder="Carregando.." class="input-login" value="Cliente">
                    <button class="editar" type="submit">Salvar</button>
                    </form>
                </div>
<?php include("footer.php") ?>
<!--JAVA LIBRAS-->
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
</body>
</html>