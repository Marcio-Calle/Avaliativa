<?php
echo "<pre>";
if($_FILES['img']['error'] === 0){
    echo "sem erros amigo";
    
    move_uploaded_file($_FILES['img']['tmp_name'],'img/'.$_FILES['img']['name']);
}else{echo 'deu ruim';};
print_r($_POST);
?>