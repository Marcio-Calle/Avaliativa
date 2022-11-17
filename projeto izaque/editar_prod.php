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

$op = $_GET['opcao'];
if($op == '2'){
  $codproduto = $_GET['cod_produto'];
  $sql = "DELETE FROM produtos  where cod_produto='$codproduto'";
  mysqli_query($conn, $sql);
  if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  header("location: produtos.php");
  die();
}
if($op == '3'){
  echo'deu bom';
  die();
}
$codproduto = $_GET['cod_produto'];
$sql = "SELECT * FROM produtos where cod_produto='$codproduto'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$descricao = $row['descricao_produto'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <form>
          <div class="mb-3">
          
            <label for="exampleInputEmail1" class="form-label">Descrição do Produto</label>
            <input type="text" class="form-control" id="descricao_produto" name="descricao_produto" value="<?php
            echo $descricao ?>">
            
          </div>
          <div class="mb-3">
            <label for="v_unit_produto" class="form-label">Valor Unitário</label>
            <input type="text" class="form-control" id="v_unit" value=<?php
            echo $row['v_unit_produto']?> name="v_unit_produto">
          </div>
          <div class="mb-3">
          <label for="cod_categoria" class="form-label">Categoria do Produto</label>
            <select name="cod_categoria" id="">
              <?php  
                $categoria = $row["categoria_produto"];
                                  
                $sql2 = "SELECT * FROM categorias";
                              
                $result2 = mysqli_query($conn, $sql2);
                while($ctg = mysqli_fetch_assoc($result2)) {
                  $categoria =$row['categoria_produto'];
                  $codcate = $ctg['cod_categoria'];
                  $nomecategoria = $ctg['descricao_categoria'];

                  if($categoria == $codcate){

                    echo ' <option value='."$codcate".'>'.$nomecategoria.'</option>';
                    $sql3 = "SELECT * FROM categorias where cod_categoria != $categoria";

                    $result3 = mysqli_query($conn, $sql3);

                    while($ctg = mysqli_fetch_assoc($result3)) {
                  
                      $codcate = $ctg['cod_categoria'];
                      $nomecategoria = $ctg['descricao_categoria'];
                      
                      echo ' <option value='."$codcate".'>'.$nomecategoria.'</option>';
                      
                     };
                  };  
                };
               
              ?>
            </select>

          </div>
     
       
          
        </form>       
      </div>
    </div>
  </div>
  


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
</body>
</html>