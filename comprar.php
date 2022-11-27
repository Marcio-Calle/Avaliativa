<?php
include "diversos/sql.php";
include "class/Cliente.class.php";
include "class/Produto.class.php";
session_start();
if($_SESSION['conta']['logado'] != 0){

    $id = $_SESSION['conta']['user']->Id;
    $sql= "insert into pedidos (id_cliente,date_time_pedido) values($id,NOW())";
    $conn->query($sql);
    $sql = 'SELECT LAST_INSERT_ID()';
    $pedido = $conn->query($sql);
    $pedido = $pedido->fetch_assoc();
    $pedido = $pedido['LAST_INSERT_ID()'];
    foreach($_SESSION['carrinho'] as $value){
    $qtd = $value->Quantidade;
    $prod = $value->Id;
    $sql= "insert into itenspedidos(id_pedido,id_produto,quantidade) values($pedido,$prod,$qtd)";
    $conn->query($sql);}

    unset($_SESSION['carrinho']);
    $_SESSION['acao'][0] = 0;
    header('location: listar.php?pedido='.$pedido.'');
}else header('location: login.php');





?>