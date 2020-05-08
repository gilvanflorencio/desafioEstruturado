<?php
include('../functions/functions.php');

//carrega Usuarios
$usuario = carregaUsuarios();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
    echo "<pre>";
    print_r($usuario);
    echo "</pre>";

    ?>
</body>
</html>