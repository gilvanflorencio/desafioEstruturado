<?php 

// Includes
include('../functions/functions.php');


// Carregando produtos
$produtos = carregaProdutos();

// Mostrar usuários
echo "<pre>";
print_r($produtos);
echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($produtos as $produto){
       echo $produto['nomeProduto']."<br>";
       echo  $produto['preco']."<br>";

    }  
    
    ?>
</body>
</html>