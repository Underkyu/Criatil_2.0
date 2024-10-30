<?php
require_once("../controller/conexao.php");
require_once("../controller/global.php");
require_once("../Dao/usuarioDAO.php");

$userDao = new UsuarioDAO($conn,$BASE_URL);

$usuarioData = $userDao->verificarToken(false);

if($usuarioData){
    $userDao->destroirToken();
}
?>