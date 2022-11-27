<?php
include 'class/Cliente.class.php';
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
                                <?php
                                    $erro = 0;
                                    if(isset($_GET['erro'])){
                                        if($_GET['erro'] == '32'){
                                            echo "<label style='color: red;'> Tipo de arquivo não válido !</label><br>";
                                            
                                        }
                                        if($_GET['erro'] == '33'){
                                            echo "<label style='color: red;'> Necessário envio da imagem !</label><br>";
                                            $nome =  $_GET['nome'];
                                            $preco = $_GET['preco'];
                                            $estoque = $_GET['estoque'];
                                            $erro = 33;
                                        }
                                        if($_GET['erro'] == '34'){
                                          $nome =  $_GET['nome'];
                                          $preco = $_GET['preco'];
                                          $estoque = $_GET['estoque'];
                                          $erro = 34;
                                        }
                                    }
                                ?>
                                <label for="formFile" class="form-label">Imagem do produto</label>
                                <input class="form-control" name="img"  type="file">
                                <label for="formFile">Tipos aceito: JPG, PNG</label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nome do produto</label> 
                                <?php if($erro == 34 || $erro == 33){if($nome == ''){echo '<label style="color: red">* Informação obrigatória!!</label>';}} ?>
                                <br>
                                <input type="text" <?php if($erro == 34 || $erro == 33) echo 'value="'.$nome.'"';?> name="nome" class="form-control">
                            </div>
                            
                            <div class="mb-3 ">
                                <label for="exampleFormControlInput1" class="form-label">Quantidade em estoque</label>
                                <?php if($erro == 34 || $erro == 33){if($estoque == ''){echo '<label style="color: red">* Informação obrigatória!!</label>';}} ?>
                                <br>   
                                <div class="col-2">
                                    <input type="text" name="estoque" <?php if($erro == 34 || $erro == 33) echo 'value="'.$estoque.'"';?> class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-5">
                                    <label for="exampleFormControlInput1" class="form-label">Preço do produto</label>
                                    <?php if($erro == 34 || $erro == 33){if($preco == ''){echo '<label style="color: red">* Informação obrigatória!!</label>';}} ?>
                                    <div class="col-5">
                                        <input type="text" name="preco" <?php if($erro == 34 || $erro == 33) echo 'value="'.$preco.'"';?> class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-5">
                                    <label class="form-label">Promocional</label><br>
                                    <input type="checkbox"  name="desconto" id="desconto">
                                    <label class="form-label">Desconto</label><br>
                                    <label  class="form-label" style="display: none" id="valor-lb" >Valor do desconto</label><br>
                                    <input type="text" name="valor_desconto" style="display: none" id="valor" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
<script>
    $(document).ready(function(){
        $('#desconto').click(function(){
            if($('#desconto').prop('checked')){
                $('#valor').show();
                $('#valor-lb').show();
                
            }else{
                $('#valor').hide();
                $('#valor-lb').hide();
            }
        })
    })
</script>
<?php
include "diversos/footer.php";

?>