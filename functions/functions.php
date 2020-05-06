<?php
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

?>