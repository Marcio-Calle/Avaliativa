<?php
class Produto{
    var $Nome;
    var $Valor;
    var $Quantidade;
    var $Img;

    function Adcionar(){
        
        $this->Quantidade++;
    }
    function Remover(){
        
        $this->Quantidade--;
        
        
    }
    function Criar($a,$b,$c){
        $this->Nome = $a;
        $this->Valor = $b;
        $this->Quantidade = 1;
        $this->Img = $c;
    }
}
?>