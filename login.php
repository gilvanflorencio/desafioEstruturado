<?php 
include('functions.php');


$loginOK = true;

if ($_POST) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuarios = carregaUsuarios();
   
/*echo "<pre>";
print_r($usuario);
echo "</pre>";*/
foreach($usuarios as $usuario){
 if ($usuario['email'] == $email) {
     //usuario Ok

     if (password_verify($senha,$usuario['senha'])) {
         
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['nome'];
        header('location:createUsuario.php');
        
     }
 }
}
$loginOK = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label for="email"><input type="text" name="email" id="email" placeholder="E-mail"></label>
        <label for="senha"><input type="password" name="senha" id="senha" placeholder="Senha"></label>
        <?= $loginOK?'':"<span> Login Incorreto </span>" ?>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>