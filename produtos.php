<?php
include 'class\Produto.class.php';
session_start();
$carrinho = false;
include 'diversos\header.php'; 
include 'diversos\navbar.php'; 


// session_destroy();
$cont = 0;
?>
<body>
    <div class="container">
        
        <?php
            
            foreach ( $_SESSION['lista'] as $key => $value) {
                if($cont <= 3){
                    $cont += 1;
                    if($cont == 1){
                        echo '<div class="row mt-5 text-center mb-5">';
                    }
                ?>
                   
                   
                        <div class="col-4 align-self-center">
                            
                                <div class="card" style="width: 18rem; margin-left: 60px">
                                <img <?php echo $value->Img?> style=" border: solid #D3D3D3  ;border-width: 0  0 1px  0" class="card-img-top">
                                <div class="card-body">
                                    
                                    <h5 class="card-title"><?php echo $value->Nome?></h5>
                                   
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">R$ <?php echo $value->Valor?></li>
                                    <li class="list-group-item">promoção</li>
                                    <li class="list-group-item">12X sem juros</li>
                                </ul>
                                <div class="card-body mx-auto">
                                    <p></p>
                                <form  action="carrinho.php?id=<?php echo $key?>" method="post">
                                    
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <button type="button"  onclick=" if(document.getElementById(<?php echo $key?>).value != 1){ document.getElementById(<?php echo $key?>).value--}" class="btn btn-default btn-number"  data-type="minus" data-field="quant[1]">
                                                <span class="menos">-</span>
                                        </button>
                                        </span>
                                        <input type="text" name="quant" id="<?php echo $key?>" style="width: 40px;"  class="form-control input-number" value="1" min="1" max="100">
                                        <span class="input-group-btn">
                                        <button type="button" onclick="document.getElementById(<?php echo $key?>).value++; "  class="btn btn-default btn-number">
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

        ?>
        
    </div>
    
</body>
<?php
include 'diversos\footer.php'; 
?>