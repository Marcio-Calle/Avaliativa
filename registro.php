<?php
include "class/Cliente.class.php";
session_start();
$carrinho = false;
include 'diversos/header.php';
include 'diversos/navbar.php';
?>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-5">
                <div class="card mb-5">
                    <div class="card-header text-center h3">Cadatro de Clientes</div>
                    <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="registrar.php?acao=registro-clientes">
                <div class="mb-3">
                    <label class="form-label">Foto de perfil</label>
                    <input type="file" name="img" class="form-control" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Nome Completo</label>
                    <input type="text" name="nome" class="form-control" >
                </div>
                <div class="mb-3">
                    <label  class="form-label">Usuário</label>
                    <input type="text" name="user" class="form-control" >
                </div>
                <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" id="tel" class="form-control" placeholder="Ex.: (00) 00000-0000">               
                </div>
                <div calss="mb-3">
                    <Label class="form-label">Senha</label>
                    <input type="password" name="senha"class="form-control" >
                </div>
                <div calss="mb-3">
                    <Label class="form-label">Confirme Senha</label>
                    <input type="password" name="confsenha"class="form-control"required>
                </div>
                
                <?php
                if(isset($_GET['ERRO'])){

                    if($_GET['ERRO']=='telefone'){
                        echo '<br><label class="mb-3" style="color: red">informações imcorretas</label>';
                    }else
                    if($_GET['ERRO']=='senha'){
                        echo '<br><label class="mb-3" style="color: red">Senhas não coecidem!</label>';
                    }
                } 
                ?>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-dark mt-3 mb-3">Confirmar</button>
                </div>
                </form>
                    </div>
                </div>
           
            </div>
        </div>
    </div>

</body>

<?php
include 'diversos/footer.php';

?>