<?php


//        CARREGA PRODUTOS
function carregaProdutos(){
   $strJson = file_get_contents("produtos.json");
     $produtos = json_decode($strJson, true);
   return $produtos;
}

function addProdutos($nomeProduto,$preco,$foto,$descricaoProduto){
   //$carrega produtos usando a funcao anterior
   $produtos = carregaProdutos();

   //adiciona ID produto
   if(empty($produtos)){
    $id = 1;
   }else{
       $id = sizeof($produtos) + 1;
   }

   //cria um array assiciativo com os dados passados por parametro
   $novo = ['id'=> $id,'nomeProduto'=>$nomeProduto,'preco'=>$preco,'foto'=>$foto,'descricaoProduto'=>$descricaoProduto];

   //adiciona $novo ao final do array
   $produtos[] = $novo;

   $stringJson = json_encode($produtos);
   //verifica se existi algum caractere na stringjson
   //se tiver, salva no arquivo produtos.json
   if($stringJson){
       //salvar a string json no arquivo produtos.json
       file_put_contents('produtos.json', $stringJson);
   }
}

//             CARREGA USUARIOS

function carregaUsuarios(){
 $strJson = file_get_contents("usuarios.json");
  $usuarios = json_decode($strJson, true);
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
        file_put_contents('usuarios.json', $stringJson);
    }
}


function produtoPorId($id){
    $produtos = carregaProdutos();
       foreach($produtos as $produto){
           if($produto["id"] == $id){
              return $produto;
           }
       }
      return false;
 }

?>