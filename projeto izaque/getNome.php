<?php
    $dados = array();
    $dados['nome']="izaque";
    $dados['idade']="40";
    $dados['msg'] = $_GET['oi'];
    
    echo json_encode($dados);
?>