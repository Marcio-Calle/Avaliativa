<?php
session_start();
$carrinho = false;
include "diversos\header.php";
include "diversos/navbar.php";

?>
<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-5">
                <div class="card mb-5">
                    <div class="card-header text-center mt-2 ">
                        <h3>
                            <p>Cadastro de Produtos</p>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="registrar.php?acao=cadastro-prod" enctype="multipart/form-data" method="post">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Imagem do produto</label>
                                <input class="form-control" name="img" type="file">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nome do produto</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Quantidade em estoque</label>
                                <div class="col-2">
                                    <input type="text" name="preco" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mb-5">
                                    <label for="exampleFormControlInput1" class="form-label">Preço do produto</label>
                                    <input type="text" name="preco" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

<?php
include "diversos/footer.php";

?>