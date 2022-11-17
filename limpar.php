<?php
session_start();

unset($_SESSION['carrinho']);
$_SESSION['acao'][0] = 0;


header('location: listar.php');
?>