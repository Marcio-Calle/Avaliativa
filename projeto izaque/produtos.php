<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ny_coffe";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Conexão Falhou: " . mysqli_connect_error());
}
$sql = "SELECT * FROM produtos";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
    rel="stylesheet"
    type="text/css"
    href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body >
    <div class="container">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <div class="row mt-5">
            <div class="col">
                <div class="">
                    <div class="row justify-content-md-center">
                        
                        <div class="col-5 col-md-auto">
                            <input type="button" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#myModal" value="Adcionar">
                        </div>
                    </div>
                <table class="table table-striped" id="tabela">
                    <thead class="thead-dark ">
                        <tr class='table-dark'>
                        <th scope="col" class='h4 text-center'>Nome</th>
                        <th scope="col" class='h4 text-center'>Valor</th>
                        <th scope="col" class='h4 text-center'>Categoria</th>
                        <th scope="col" class='h4 text-center'></th>
                        <th scope="col" class='h4 text-center'></th>
                        
                        </tr>
                    </thead>
                 
                        <tbody>
                                      
                        <?php

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                
                                while($row = mysqli_fetch_assoc($result)) {
                                $categoria = $row["categoria_produto"];
                            
                                $sql2 = "SELECT * FROM categorias where cod_categoria =$categoria";
                            
                                $result2 = mysqli_query($conn, $sql2);
                            
                                while($ctg = mysqli_fetch_assoc($result2)){
                                    $categ = $ctg['descricao_categoria'];
                                    $codigoproduto = $row['cod_produto'];
                                    $codprod = $ctg['cod_categoria'];
                                    echo('<tr>
                                            <th class="h5 text-center">'.$row['descricao_produto'].'</th>
                                            <td class="h5 text-center">'.$row['v_unit_produto'].'</td>
                                            <td class="h5 text-center">'.$categ.'        </td>
                                            <td class="h5 text-center">
                                                <a class="btn btn-success" href="editar_prod.php?cod_produto='.$codigoproduto.'& opcao=1">
                                                    Editar
                                                </a>
                                            </td>
                                            <td class="h5 text-center">
                                                <a class="btn btn-danger" href="editar_prod.php?cod_produto='.$codigoproduto.'& opcao=2">
                                                    Excluir
                                                </a>
                                            </td>
                                          </tr>');
                                    }
                                
                                }
                            } else {
                                echo "Não há resultados";
                            }
                            
                            mysqli_close($conn);

                            ?>
                        
                        
                        </tbody>
                    </table>
                            
                </div>
               
            </div>
            
        </div>
   

        
       
    </div>
  
    
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> 

<script>
       $(document).ready(function(){
            $('#tabela').DataTable();
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })
            $('#adcionar').click(function(){
                
                $.ajax({
                    type: 'get',
                    url: 'editar_prod.php',
                    data:{
                        'opcao': '3'
                    },
                    success: function(result){
                    var dados = result;
                    console.log(dados);
                
                   
            }});
                // window.location.replace("editar_prod.php");
            })
           
        });
</script>


</body>
</html>

