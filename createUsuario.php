<?php

//includes
include('functions.php');

$nome = "";
$email = "";
$senha = "";
$confirmacao = "";

$nomeOk = true;
$emailOk = true;
$senhaOk  = true;

if ($_POST) {
   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $senha = $_POST['senha'];
   $confirmacao = $_POST['confirmacao'];

   if (strlen($nome) < 6) {
       $nomeOk = false;
   }
   
   if(strlen($email) < 7){
      $emailOk = false;
   }

   if($senha !== $confirmacao || strlen($senha) < 6){
    $senhaOk = false;
   }

   if($nomeOk && $senhaOk){
     //Salvando Usuario Novo
     addUsuario($nome, $email ,$senha);
     
     //Redirecionando isiario para a lista de usuarios
     header('location: list-usuarios.php');
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
    <title>Cadastrar Usuario</title>
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
    
  <form action="" method="post">
     <label for="nome">
        Nome:
        <input  type="text" name="nome" id="nome" value="<?= $nome ?>">
        <?= $nomeOk?'': '<span class="erro">Nome Deverá ter mais de 6 letras.</span>' ?>
     </label>
    <label for="email">
       Email:
    <input type="email" name="email" id="email" value="<?= $email ?>">
    <?= $emailOk?'' : '<span class="erro">Email Ínvalido!</span>' ?>
   </label>
  <label for="senha">
    Senha:
    <input type="password" name="senha" id="senha">
    <?= $senhaOk? '':'<span class="erro">Senha Inválida</span>' ?> 
   </label>
   <label for="confirmacao">
    Confirmação:
    <input type="password" name="confirmacao" id="confirmacao"> 
  </label>
  <button class="btn btn-primary" type="submit">CADASTRAR</button>
  </form>

</body>
</html>