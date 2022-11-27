<?php
include 'class\Produto.class.php';
include 'diversos\sql.php';
include 'diversos\header.php'; 
include 'class\Cliente.class.php';
session_start();
$carrinho = false;
include 'diversos\navbar.php'; 
$conta = $_SESSION['conta']['user']->Id;


?>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <h1>Pedidos</h1>
            </div>
            <div class="card-body">
                <table class="table">
                <?php
                    $sql = "select id_pedido, date_format(date_time_pedido,'%d/%m/%Y') as data, date_format(date_time_pedido,'%h:%m:%s') as hora from pedidos where id_cliente=$conta";
                    $pedidos = $conn->query($sql);
                    if($pedidos->num_rows>0){
                        $resultado = $pedidos->fetch_assoc();
                        $data = $resultado['data'];
                     
                        $sql = "select id_pedido, date_format(date_time_pedido,'%d/%m/%Y') as data, date_format(date_time_pedido,'%h:%m:%s') as hora from pedidos where id_cliente=$conta";
                        $pedidos = $conn->query($sql);
                ?>
                <thead class="text-center">
                    <tr class='table-dark'>
                        <th class="text-center display-6" colspan="4">
                            Pedidos do dia <?php echo $data?> 
                        </th>
                    </tr>
                   
                    <tr class='table-dark'>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Horario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $total = 0;
                     $pedidore = 0;
                     while($row3 = $pedidos->fetch_assoc()){
                        $pedidore++;
                        
                        $hora = $row3['hora'];
                        $pedido = $row3['id_pedido'];
                        $sql2 = "select * from itenspedidos where id_pedido =$pedido";
                   
                        $prod= $conn->query($sql2);

                   while( $row2= $prod->fetch_assoc()){
                    $qtd = $row2['quantidade'];
                    $idprd = $row2['id_produto'];
                    $sql3 = "select * from produtos where id_produto =$idprd";
                    $produto = $conn->query($sql3);
                    
                    while($row = $produto->fetch_assoc()){
                        
                        $nome = $row['descricao'];
                        if($row['promocao'] == 1){
                            $preco = $row['preco'] *(100 - $row['promocao_valor'])/100;
                            $preco = $preco * $qtd;
                            $total += $preco;
                            $preco = $preco.'.00';
                        }else{$preco = $row['preco'];
                            $preco = $preco * $qtd;
                            $total += $preco;
                        }
                        
                    ?>
                    <tr class='table-light text-center'>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $qtd ?></td>
                        <td><?php echo 'R$ '.$preco?></td>
                        <td><?php echo $hora ?></td>
                    </tr>
                    <?php }
                    
                
                }
                echo "<tr class='table-dark text-center'>
                    <td colspan='4' class='h4' >Total do pedido ".$pedidore." : R$".$total."</td>
                   
                </tr>";
                ?>
                </tbody>
                <?php
                        
                    }
                }else{
                    ?>
                     <thead class="text-center">
                   
                    <tr class='table-dark'>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Horario</th>
                    </tr>
                </thead>
                <tbody>
                <tr class='table-light text-center'>
                       <td colspan="4" class="h1">
                        <a href="index.php">Sem pedidos <br> Comece a pedir agora!</a>
                       </td>
                    </tr>
                </tbody>
                    <?php
                }
                ?>
                </table>
            </div>
        </div>
        
    </div>
</body>
<?php
include 'diversos\footer.php';
?>