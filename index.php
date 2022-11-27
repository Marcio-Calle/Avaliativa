<?php
include 'class\Produto.class.php';
include 'diversos\sql.php';
include 'diversos\header.php'; 
include 'class\Cliente.class.php';
session_start();
$carrinho = false;
if(empty($_SESSION['acao'])){
        
    $_SESSION['acao'][0] = 0; 
   
}
include 'diversos\navbar.php'; 




// session_destroy();
$cont = 0;
?>
<body>
    <div class="container">
        
        <?php

            $sql = 'select * from produtos';
            $result = $conn->query($sql);
            if($result->num_rows > 0){
            while( $produto = $result->fetch_assoc()) {
                $sql2 = 'select nome_imagem from imagens where id_imagem = '.$produto['imagem'].'';
                $img = $conn->query($sql2);
                $img = $img->fetch_assoc();
                if($cont <= 3){
                    $cont += 1;
                    if($cont == 1){
                        echo '<div class="row mt-5 text-center mb-5">';
                    }
                ?>
                   
                   
                        <div class="col-4 align-self-center">
                          
                                <div class="card" style="width: 18rem; margin-left: 60px">
                                <img src=<?php echo'img/produtos/'.$img['nome_imagem']?> style=" border: solid #D3D3D3  ;border-width: 0  0 1px  0" class="card-img-top">
                                <div class="card-body">
                                    
                                    <h5 class="card-title"><?php echo $produto['descricao']?></h5>
                                   
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php if($produto['promocao'] == 1){
                                        $desconto = $produto['preco'] * (100 - $produto['promocao_valor'])/100;
                                        echo'
                                        <li class="list-group-item" style="background-color: #d4af37"><p style="color: #f5f5f5">R$'.
                                        $produto['promocao_valor']
                                       .'% OFF</p></li>
                                        <del>De R$ '.$produto['preco'].'</del>
                                        <p class="h5" style="color: red">Por R$'.$desconto.'.00</p>
                                        ';
                                    }else echo'R$ '.$produto['preco']?></li>
                                    <?php if($produto['promocao'] == 0){
                                        echo '<li class="list-group-item">2% desconto no pix </li>
                                        <li class="list-group-item">12X sem juros</li>';}
                                    ?>
                                </ul>
                                <div class="card-body mx-auto">
                                    <p></p>
                                <form  action="carrinho.php?id=<?php echo $produto['id_produto']?>" method="post">
                                    
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <button type="button"  onclick=" if(document.getElementById(<?php echo $produto['id_produto']?>).value != 1){ document.getElementById(<?php echo $produto['id_produto']?>).value--}" class="btn btn-default btn-number"  data-type="minus" data-field="quant[1]">
                                                <span class="menos">-</span>
                                        </button>
                                        </span>
                                        <input type="text" name="quant" id="<?php echo $produto['id_produto']?>" style="width: 40px;"  class="form-control input-number" value="1" min="1" max="100">
                                        <span class="input-group-btn">
                                        <button type="button" onclick="document.getElementById(<?php echo $produto['id_produto']?>).value++; "  class="btn btn-default btn-number">
                                                <span class="mais">+</span>
                                        </button>
                                        </span>
                                    </div>
                                    <p></p>
                                    <button type="submit" class="card-link btn btn-primary">Adcionar</button>
                                </form>
                                </div>
                                </div>
                            
                        </div>
                    
                <?php
                } if($cont==3){
                    echo '</div>';
                    $cont = 0;
                }
                  
                
            }
        }

        ?>
        
    </div>
    
</body>
<?php
include 'diversos\footer.php'; 
?>