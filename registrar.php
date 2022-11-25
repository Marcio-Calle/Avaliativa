<?php
include 'diversos/sql.php';


$acao = $_GET['acao'];

if($acao == 'cadastro-prod'){
  $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $imagem = $_FILES['img']['name'];
if($_FILES['img']['error'] === 0){
    
   
    $image_nome = uniqid();
    $extensao = strtolower(pathinfo($imagem,PATHINFO_EXTENSION));
    if($extensao != 'jpg' && $extensao != 'png'){
        die(header('location: cadastroprod.php?erro=32'));
    }
   
    if($nome != '' && $preco != '' && $estoque != ''){

        $imagem = $image_nome.'.'.$extensao;

        move_uploaded_file($_FILES['img']['tmp_name'],'img/'.$imagem);
        
    
        $sql = "Insert into imagens (nome_imagem) values ('$imagem')";
    
        $conn->query($sql);
    
        $sql = 'SELECT LAST_INSERT_ID()';
        
        $result = $conn->query($sql);
    
        $imagem = $result->fetch_assoc()['LAST_INSERT_ID()'];

        $sql ="Insert into produtos (descricao,quantidade,preco,imagem) values ('$nome','$estoque','$preco','$imagem')";

        $conn->query($sql);
        
    }else die(header('location: cadastroprod.php?erro=34&&nome='.$nome.'&&preco='.$preco.'&&estoque='.$estoque.''));

    header('location: cadastroprod.php');
}else if( $_FILES['img']['error'] == 4){
    die(header('location: cadastroprod.php?erro=33&&nome='.$nome.'&&preco='.$preco.'&&estoque='.$estoque.''));

};
   
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