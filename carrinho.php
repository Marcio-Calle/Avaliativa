<?php
include 'class/Produto.class.php';
include 'diversos/sql.php';
session_start();
$id = $_GET['id'];
$sql = 'select * from produtos where id_produto = '.$id.'';
$result = $conn->query($sql);
$result = $result->fetch_assoc();
if($result['promocao'] == 1){
    $preco = $result['preco']*(100 - $result['promocao_valor'])/100;
}else $preco = $result['preco'];
$nome = $result['descricao'];

$qtd = $_POST['quant'];
$sql = 'select * from imagens where id_imagem = '.$result['imagem'].'';
$result = $conn->query($sql);
$result = $result->fetch_assoc();
$img = $result['nome_imagem'];

$prod= new Produto;

$prod->Criar($nome,$preco,$qtd,$img,$id);



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



header("location: index.php");
?>