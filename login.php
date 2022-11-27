<?php
include 'class\Produto.class.php';
include 'diversos\sql.php';
include 'diversos\header.php'; 
include "class/Cliente.class.php";
session_start();
$carrinho = false;
$estava = false;
if(isset($_GET['sair'])){
    if($_GET['sair']== 'sim'){
        unset($_SESSION['conta']);
        unset($_SESSION['carrinho']);
        $_SESSION['acao'][0]=0;
        $estava = true;
    }
 }
include 'diversos\navbar.php';

?>
<body>
    <div class="container mt-5">
        <form action="logar.php?estava=<?php echo $estava?>" method="post">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Login</h2>
                </div>
                <div class="card-body mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label class="h4 form-label">Usuário</label>
                            <input class="form-control mb-3" name="login" type="text">
                            <label class="h4 form-label">Senha</label>
                            <input class="form-control mb-1" name="senha" type="password">
                            <a href="registro.php" class="text-dark">Não possue conta ? cadastre-se</a><br>
                            <div class="text-center">
                                <input type="submit" class="btn btn-outline-dark mb-5 mt-3" value="ENTRAR">
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</body>
<?php
include 'diversos\footer.php';
?>