<?php
include 'diversos/sql.php';

$acao = $_GET['acao'];

if($acao == 'cadastro-prod'){
    if($_FILES['img']['error'] === 0){

        $imagem = $_FILES['img']['name'];
        $image_nome = uniqid();
        $extensao = strtolower(pathinfo($imagem,PATHINFO_EXTENSION));
        if($extensao != 'jpg' && $extensao != 'png'){
            die(header('location: cadastroprod.php?erro=32'));
        }
        $imagem = $image_nome.'.'.$extensao;
    
        move_uploaded_file($_FILES['img']['tmp_name'],'img/'.$imagem);
        
    
        $sql = "Insert into imagens (nome_imagem) values ('$imagem')";
    
        $conn->query($sql);
        header('location: cadastroprod.php');
    }else{echo 'deu ruim';};
}


if($acao == 'registro-clientes'){
    $nome = $_POST['nome'];  
    if($_POST['nome'] == '' || $_POST['telefone'] == '' || $_POST['email'] == '' || $_POST['senha'] == '' || $_POST['confsenha'] == '')
    echo 'campos vazios';
    if($_POST["senha"] != $_POST["confsenha"]){
        echo 'senhas diferentes';
    } 
} 
?>