<?php
include('functions.php');

//include ('index.php');
//include ('produtos.json');

/*
session_start();
if (!$_SESSION) {
  header('location:login.php');
}
*/

$id = $_GET['id'];

$produto = produtoPorId($id);

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
    <title>SHOW PRODUTOS</title>

    <style>
* {
	box-sizing: border-box;
	font-family: 'Montserrat', sans-serif;
}

html{
	font-size: 16px;
}

body {
	margin: 0;
    width: 100%;       
    }

main {
width: 80%;
margin-left: auto;
margin-right: auto;
border: 2px solid  #bfbfbf;

}
   </style>

</head>
   <body>
    <article>
      <button class="btn btn-outline-secondary ">
      <a href="index.php">
      << Voltar para a lista de produtos
       </a></button>
      </article>
<main>
    
    <h1> <?= $produto['nomeProduto'] ?> </h1>
    <img src="<?= $produto['foto'] ?>" alt="<?= $produto['nomeProduto'] ?>">
    <span>  <?= $produto['preco'] ?> </span>
    <span> <?= $produto['descricaoProduto'] ?> </span>
    
</main>  

   </body>
</html>