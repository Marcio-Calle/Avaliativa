<?php
include "diversos/sql.php";
include "class/Cliente.class.php";
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$estava = $_GET['estava'];
$loge = true;
if(!empty($_SESSION['conta']['user'])){
    unset($_SESSION['carrinho']);
    $_SESSION['acao'][0] = 0;
    $loge = false;
}
$sql="select substring(nome_completo,1,locate(' ',nome_completo)-1) as nome,imagem,adm,id_cliente from clientes where username='$login' and password='$senha'";
$result = $conn->query($sql);

if($result->num_rows == 0){
    die(header('location: login.php?erro=login'));
}


$result = $result->fetch_assoc();


$conta = new Cliente;
$id = $result['id_cliente'];
if($result['imagem']==0){
    $img = 'padrao.jpg';
    $conta->Criar($result['nome'],$result['adm'],$img,$id);
}else {
    $img = $result['imagem'];
    $sql= "select nome_imagem from imagens where id_imagem =$img";
    $img = $conn->query($sql);
    $img = $img->fetch_assoc();
    $conta->Criar($result['nome'],$result['adm'],$img['nome_imagem'],$id);
}

$_SESSION['conta']['user'] = $conta;
$_SESSION['conta']['logado'] = 1;
$_SESSION['conta']['adm'] = $conta->Adm;
if($loge == true && $estava == false){
    header('location: comprar.php');
}else{
    header('location: index.php');

}

?>