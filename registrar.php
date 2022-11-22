<?php
echo "<pre>";
if($_FILES['img']['error'] === 0){
    echo "sem erros amigo";
}else{echo 'deu ruim';};
print_r($_POST);
?>