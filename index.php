<?php
    include 'class\Produto.class.php';
    session_start();
    include 'diversos\sql.php';


    if(empty($_SESSION['lista'])){
        $prod1 = new Produto;
        $prod2 = new Produto;
        $prod3 = new Produto;
        $prod4 = new Produto;
        $prod5 = new Produto;
        $prod6 = new Produto;
    
        $prod1->Criar('Mouse Gamer',100,'src="img\mouse.png"');
        $prod2->Criar('Fone Gamer',100,'src="img\fone.png"');
        $prod3->Criar('Gabinete Gamer',300,'src="img\cpu.png"');
        $prod4->Criar('Gtx 1660 super',1300,'src="img\placadevideo.png"');
        $prod5->Criar('Teclado Gamer',200,'src="img\teclado.png"');
        $prod6->Criar('Monitor Gamer',2300,'src="img\monitor.png"');
        
        $produtos = array($prod1,$prod2,$prod3,$prod4,$prod5,$prod6);

        foreach($produtos as $value) $_SESSION['lista'][]=$value;
        
        $_SESSION['acao'][] = 0;
    
       
    }
  
    

    
    
    
    // session_destroy();
    header('location: produtos.php');
?>