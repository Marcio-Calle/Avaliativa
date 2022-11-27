<?php
include 'class\Produto.class.php';
include 'diversos\sql.php';
include 'diversos\header.php'; 
include 'class\Cliente.class.php';
session_start();
$carrinho = false;
include 'diversos\navbar.php'; 
$img =$_SESSION['conta']['user']->Img;
$nome = $_SESSION['conta']['user']->Nome_cliente;
?>
<body>
    <div class="container">
        <div class="card mt-5 mb-5">
            <div class="card-header">
                <div class="text-center" >
                    <img style="width: 30%;" src="img/perfils/<?php echo $img;?>" alt="">
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">
                        <h1 class="h1">Olá, <?php echo $nome?></h1>
                        
                    </li>
                </ul>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-2">
                        <a class="btn btn-dark btn-lg"  href="pedidos.php"><h1>PEDIDOS</h1></a>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-md-2">
                        <a class="btn btn-dark btn-lg"  href="login.php?sair=sim"><h1>SAIR</h1></a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include 'diversos\footer.php';
?>