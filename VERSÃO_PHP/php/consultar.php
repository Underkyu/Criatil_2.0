<?php
    require_once  $_SERVER['DOCUMENT_ROOT'] . '/Criatil_2.0/VERSÃO_PHP/php/controller/usuarioController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tela de Consulta</title>
</head>
<body>
    <div class="container">
        <h2>Consulta</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $usuarioController = new usuarioController();
                    $usuarios = $usuarioController->listar();
                    foreach ($usuarios as $usuario){
                ?>
                    <tr>
                        <th><?php echo $usuario['Nome_Usu']; ?></th>
                        <th><?php echo $usuario['Celular_Usu']; ?></th>
                        <th><?php echo $usuario['Tipo_Usu']; ?></th>
                        
                        <th>
                        <a href="editar.php?Codigo_Usu=<?php echo $usuario['Codigo_Usu'];?>">Editar</a>
                        <a href="excluir.php?Codigo_Usu=<?php echo $usuario['Codigo_Usu'];?>">Excluir</a>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <style>
    th {
        padding-right: 30px;
    }
</style>
</body>
</html>