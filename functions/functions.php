<?php

//              PRODUTOS
function carregaProdutos(){
/* Carrega os Produtos  do arquivo produtos.json*/
echo ('Produto adiciona com sucesso');
//ler o arquivo para uma variavel string
$strJson = file_get_contents("../produtos/produtos.json");

// transformar a string em array assoc (json_decode)
$produtos = json_decode($strJson, true);

//retornar o array assoc
 return $produtos;
}

function addProdutos($nomeProduto,$preco,$foto,$descricaoProduto){
   //$carrega produtos usando a funcao anterior
   $produtos = carregaProdutos();

   //cria um array assiciativo com os dados passados por parametro
   $novo = ['nomeProduto'=>$nomeProduto,'preco'=>$preco,'foto'=>$foto,'descricaoProduto'=>$descricaoProduto];

   //adiciona $novo ao final do array
   $produtos[] = $novo;

   $stringJson = json_encode($produtos);
   //verifica se existi algum caractere na stringjson
   //se tiver, salva no arquivo produtos.json
   if($stringJson){
       //salvar a string json no arquivo produtos.json
       file_put_contents('../produtos/produtos.json', $stringJson);
   }
}

//                      Usuarios 

function carregaUsuarios(){
    /* Carrega os Produtos  do arquivo produtos.json*/
echo ('Usuarios adiciona com sucesso');
//ler o arquivo para uma variavel string
$strJson = file_get_contents("../usuarios/usuarios.json");

// transformar a string em array assoc (json_decode)
$usuarios = json_decode($strJson, true);

//retornar o array assoc
 return $usuarios;
}

 function addUsuario($nome, $email, $senha){
   //carrega usuarios usando a funcao anterior
   $usuarios = carregaUsuarios();

   //cria um array associativo com os dados passados por parametro
   $u = ['nome'=>$nome, 'email'=>$email,'senha'=>password_hash($senha,PASSWORD_DEFAULT)];

   //Adiciona novo no final do array
  $usuarios[] = $u;

  $stringJson = json_encode($usuarios);
  //verificanco se existi algum caractere na stringjson
    // se tiver, salva no arquivo usuarios.json
    if ($stringJson) {
        //salvar a string json no arquivo usuarios.json
        file_put_contents('../usuarios/usuarios.json', $stringJson);
    }
}

?>