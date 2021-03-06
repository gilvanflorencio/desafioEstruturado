<?php


// Includes
include('functions.php');

/*
session_start();
if (!$_SESSION) {
  header('location:login.php');
}
*/

// Carregando Produtos
$produtos = carregaProdutos();


/* Mostrar Produtos
echo "<pre>";
print_r($produtos);
echo "</pre>";

// Mostrar Produtos
echo "<pre>";
print_r($usuario);
echo "</pre>";
*/

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>IndexProdutos.PHP</title>
</head>
<body>

<table class="table table-hover table-default">
  <thead>
    <tr>
      <th scope="col">Nº</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col">Descricao Produto</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($produtos as $produto): ?>
     <tr>   
      <th scope="row"><?= $produto['id'] ?> </th>
      <td> <?= $produto['nomeProduto'] ?> </td>
      <td> <?= $produto['preco'] ?></td>
      <td> <?= $produto['descricaoProduto'] ?> </td> 
      <td><a href="showProduto.php?id=<?= $produto['id'] ?>">Ver Mais</a></td>
      <!--<td><a href="teste.php?id=<?= $produto['id'] ?>">Ver Mais</a></td>  -->  
    </tr>

    <?php endforeach; ?>
   </tbody>
</table>
    
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</html>