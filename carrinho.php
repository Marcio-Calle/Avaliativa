<?php
include 'class/Produto.class.php';
session_start();

$id = $_GET['id'];


$nome = $_SESSION["lista"][$id]->Nome;
$preco = $_SESSION["lista"][$id]->Valor;
$qtd = $_POST['quant'];
$img = $_SESSION["lista"][$id]->Img;
$prod= new Produto;

$prod->Nome = $nome;
$prod->Valor = $preco;
$prod->Quantidade = $qtd;
$prod->Img = $img;



$new = true;
if(!empty($_SESSION['carrinho'])){

    foreach($_SESSION['carrinho'] as $v => $p){
        if($p->Nome == $prod->Nome && $p->Valor == $prod->Valor){
            $_SESSION['carrinho'][$v]->Quantidade += $prod->Quantidade;
            $new = false;
            break;
        }
        
    }
    if($new == true){
        $_SESSION['carrinho'][] = $prod;
        $_SESSION['acao'][0]++;
        $new == false;
    }
    
}else{
    $_SESSION['carrinho'][] = $prod;
    $_SESSION['acao'][0]++;
}

$_SESSION['lista'][$id]->Quantidade = 1;

header("location: index.php");
?>