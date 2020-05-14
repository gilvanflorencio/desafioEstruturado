<?php
include('functions.php');
include('index');
//include ('index.php');
//include ('produtos.json');

/*
session_start();
if (!$_SESSION) {
  header('location:login.php');
}
*/
$id = $_GET['id'];
echo "$id";
if($id){
$produto = produtoPorId($id);

echo "<pre>";
var_dump($produto);
echo "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
      <button class="btn btn-primary"><a href="index.php"><= Voltar para a lista de produtos</a></button>
      </article>
<main>
    
    <h1> <a href="<?= $produto['id'] ?>"></a> </h1>
    <img src="<?= $produto['foto'] ?>" alt="<?= $produto['nomeProduto'] ?>">
    <span>  <?= $produto['preco'] ?> </span>
    <span> <?= $produto['descricaoProduto'] ?> </span>
    
</main>  

   </body>
</html>