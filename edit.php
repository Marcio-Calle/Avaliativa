<?php
    include 'class\Produto.class.php';
    session_start();

        $index = $_GET['index'];
        $op = $_GET['op'];
        $lista = $_GET['lista'];
    
            if($op == 'mais'){
                $_SESSION[$lista][$index]->Adcionar();
            }else if($op == 'menos'){
                $_SESSION[$lista][$index]->Remover();
                if($_SESSION['carrinho'][$index]->Quantidade <=0){
                    unset($_SESSION['carrinho'][$index]);
                    $_SESSION['acao'][0]--;
                }
            }else if($op == 'deletar'){
                unset($_SESSION['carrinho'][$index]);
                $_SESSION['acao'][0]--;

            } 
            if($lista == 'lista'){
                header('location: index.php'); 
            }else{
                header('location: listar.php');
            }


 
   
   
  
?>