<?php
include 'diversos/sql.php';


$acao = $_GET['acao'];

if($acao == 'cadastro-prod'){
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $valor_promocao = $_POST['valor_desconto'];
    $imagem = $_FILES['img']['name'];
    if(isset($_POST['desconto'])){
        $promocao = 1;
        
    }else{ $promocao = 0; $valor_promocao = 0;}

    if($_FILES['img']['error'] === 0){
        
    
        $image_nome = uniqid();
        $extensao = strtolower(pathinfo($imagem,PATHINFO_EXTENSION));
        if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg'){
            die(header('location: cadastroprod.php?erro=32'));
        }
    
        if($nome != '' && $preco != '' && $estoque != ''){

            $imagem = $image_nome.'.'.$extensao;

            move_uploaded_file($_FILES['img']['tmp_name'],'img/produtos/'.$imagem);
            
        
            $sql = "Insert into imagens (nome_imagem) values ('$imagem')";
        
            $conn->query($sql);
        
            $sql = 'SELECT LAST_INSERT_ID()';
            
            $result = $conn->query($sql);
        
            $imagem = $result->fetch_assoc();
            $imagem = $imagem['LAST_INSERT_ID()'];

            $sql ="Insert into produtos (descricao,quantidade,preco,imagem,promocao,promocao_valor) values ('$nome',$estoque,$preco,'$imagem',$promocao,$valor_promocao)";

            $conn->query($sql);
            
        }else die(header('location: cadastroprod.php?erro=34&&nome='.$nome.'&&preco='.$preco.'&&estoque='.$estoque.''));

        header('location: cadastroprod.php');
    }else if( $_FILES['img']['error'] == 4){
        die(header('location: cadastroprod.php?erro=33&&nome='.$nome.'&&preco='.$preco.'&&estoque='.$estoque.''));

    };
   
}


if($acao == 'registro-clientes'){
    $enviou = false;
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];  
    $email = $_POST['email'];  
    $senha = $_POST['senha']; 
    $user = $_POST['user'];
    if( $_FILES['img']['error'] == 0){
        
        $enviou = true;
        $img = $_FILES['img']['name'];
        $image_nome = uniqid();
        $extensao = strtolower(pathinfo($img,PATHINFO_EXTENSION));
        if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg'){
            die(header('location: registro.php?erro=32'));
        }
        $imagem = $image_nome.'.'.$extensao;

    }; 
    if(isset($_POST['adm'])){
        $adm = 1;
    }else $adm = 0;

    if($_POST['nome'] == '' || $_POST['telefone'] == '' || $_POST['email'] == '' || $_POST['senha'] == '' || $_POST['confsenha'] == ''){

    
    header('location: registro.php?ERRO=telefone');}else
    if($_POST["senha"] != $_POST["confsenha"]){
        header('location: registro.php?ERRO=senha');

    }else{
        
    
        if($nome != '' && $email != '' && $senha != ''){


            if($enviou == true){
                move_uploaded_file($_FILES['img']['tmp_name'],'img/perfils/'.$imagem);
                $sql = "Insert into imagens (nome_imagem) values ('$imagem')";
        
                $conn->query($sql);
            
                $sql = 'SELECT LAST_INSERT_ID()';
                
                $result = $conn->query($sql);
            
                $imagem = $result->fetch_assoc();
                $imagem = $imagem['LAST_INSERT_ID()'];

            }else{$imagem = 0;}
        
          
            $nome = $nome.' usuario';
            $sql ="Insert into clientes (nome_completo,email,telefone,adm,username,password,imagem) values ('$nome','$email','$telefone',$adm,'$user','$senha',$imagem)";

            $conn->query($sql);
            header('location: login.php');
        }

       
    }
} 


  

?>