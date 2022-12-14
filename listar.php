<?php
include 'class\Produto.class.php'; 
session_start();
$carrinho = true;
include 'diversos\header.php'; 
include 'diversos\navbar.php';



// session_destroy();

?>
<div class="container">
    
    <div class="row mt-5">
        <div class="col">
            <div class="card" style="background-color: #212429">
              
                <table class="table table-dark table-striped " >
                    
                        
                            <thead class="text-center">
                                <tr>
                                <th scope="col"><h3>Nome</h3></th>
                                <th scope="col"><h3>Valor</h3></th>
                                <th scope="col" ><h3> Quantidade </h3></th>
                                <th scope="col" colspan="2"><h3> Ações </h3></th>
                                
                                </tr>
                            </thead>
                    
                        
                            <tbody>
                                <?php
                                    if(!empty($_SESSION['carrinho'])){
                                        
                                        $total = 0;
                                        foreach($_SESSION['carrinho'] as $ind => $c){
                                            $total += $c->Valor * $c->Quantidade;
                                            ?>
                                             <div class="modal fade" id="exampleModal<?php echo $ind?>" tabindex="-1" aria-labelledby="exampleModalLabel <?php echo $ind?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel <?php echo $ind?>">Confirmação</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>Certeza que quer excluir ?</h3>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <a href="edit.php?index=<?php echo $ind?>&&op=deletar&&lista=carrinho" class="btn btn-primary">Excluir</a>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            <?php
                                            
                                ?>
                                            <tr >
                                            <td>
                                                <img class="float-start" style="border-radius: 50%;margin-left: 100px;margin-right: 30px; width: 50px"<?php echo $c->Img ?>>
                                                <p style="padding-top: 10px;"><?php echo $c->Nome?></p>
                                            </td>
                                            <td  style="text-align: center; vertical-align: middle;"><?php echo "R$ ",$c->Valor * $c->Quantidade?></td>
                                            
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a href="edit.php?index=<?php echo $ind?>&&op=mais&&lista=carrinho" style="margin-right: 25px;"><button class="btn btn-warning">+</button></a>
                                                <?php echo $c->Quantidade?>
                                                <a href="edit.php?index=<?php echo $ind?>&&op=menos&&lista=carrinho" style="margin-left: 25px;"><button class="btn btn-warning">-</button></a>
                                                
                                            </td>
                                            <td  style="text-align: center; vertical-align: middle;">
                                                <a ><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $ind?>">Excluir</button></a>
                                            </td>
                                           
                                            
                                            </tr>
                                <?php   }?>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">
                                                <a  href="limpar.php" class="btn btn-outline-light">Esvaziar Carrinho</a>
                                            </th>
                                            <th></th>
                                            <th colspan="3"  style="text-align: center; vertical-align: middle;">
                                                <h3>TOTAL: <?php echo $total?></h3>
                                            </th>
                                        </tr>    
                                <?php
                                        
                                    }else{   
                               
                                   echo' 
                                    <tr class="text-center">
                                        <td colspan="5" class="display-1">Carrinho Vazio <br>
                                        <a href="index.php">Comece a comprar</a>
                                        </td>
                                        
                                    </tr>
                                    ';
                               
                                
                                }
                            ?>
                            </tbody>
                    
                    
                
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include 'diversos\footer.php'; 
?>
