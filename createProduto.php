
<?php
//includes
include('functions.php');
/*
session_start();
if (!$_SESSION) {
  header('location:login.php');
}
*/

 //valores Padrão
 $nomeProduto =  "";
 $preco = "";
 $descricaoProduto = "";

 //Variaveis de controle
 $nomeProdutoOk =  "tue";
 $precoOk = "true";
 $descricaoProdutoOk = "true";


 if($_POST){
//Guardando as variaveis
$nomeProduto = $_POST['nomeProduto'];
$preco = $_POST['preco'];
$descricaoProduto = $_POST['descricaoProduto'];

//verificar se o $_FILES esta vindo
      if($_FILES){

      //Separando informacoes uteis do $_FILES
      $tmpName = $_FILES['foto']['tmp_name'];
      $fileName = uniqid(). '-' . $_FILES['foto']['name'];
      $error = $_FILES['foto']['error'];

  //salvar o arquivo numa pasta do meu sistema
  move_uploaded_file($tmpName, 'img/'.$fileName);

        //salvar o nome do arquivo em $imagem
         $imagem = 'img/'.$fileName;
         }else{
          $imagem = null;
       }

    if(empty($nomeProduto) || strlen($nomeProduto) < 3){
        $nomeProdutoOk = false;
    }
    if(empty($preco)){
       $precoOk = false;
    }

    if ($nomeProdutoOk  && $precoOk) {
      //salvando novos produtos
      addProdutos($nomeProduto, $preco, $imagem, $descricaoProduto);

      //redirecionando produtos para a lista de produtos
      header('location: list-produtos.php');
    }

 }

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

    <title>Criar Produtos</title>
</head>

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
  background-color: #e6e6e6;
}

form{
  display: block;
   max-width: 550px;height: auto;
   background: #FAFAFA;
   padding: 30px;
   box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
   border-radius: 10px;
   border:6px solid #305A72;
  margin:10px  auto;
}

label{
display: block
}

form label input,textarea,button{
  display: block;
}

form label input{
  width: 100%;
}

li{
  list-style: none;
}

.erro{
  color: red;
  }


</style>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="nomeProduto" required>
        Nome do Produto:
      <input type="text" name="nomeProduto" id="nomeProduto" value="<?= $nomeProduto ?>">
      <?= ($nomeProdutoOk?'':'<span class="erro">Preencha o campo com um nome válido</span>');  ?>
    </label>
    <label for="preco">
        Preço: R$
      <input type="text" name="preco" id="preco" value="<?= $preco ?>">
      <?= ($precoOk?'':'<span class="erro">Valor invalido</span>');  ?>
    </label>
    <label>
      <div>Clique para selecionar sua foto</div>
      <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png,.gif" required>
    </label>  
    <li> 
      <label for="descricaoProduto">
        Descrição do Produto:
        <textarea id="descricaoProduto" name="descricaoProduto"></textarea>
    </label>
  </li>
      <button type="submit">Cadastrar</button>
    </form>

    <script>
        document.getElementById("foto").onchange = (evt) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("foto-carregada").src = e.target.result;
            };
            reader.readAsDataURL(evt.target.files[0]);
        };
    </script>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</html>