<?php
class Produto{
    var $Nome;
    var $Valor;
    var $Quantidade;
    var $Img;
    var $Id;

    function Adcionar(){
        
        $this->Quantidade++;
    }
    function Remover(){
        
        $this->Quantidade--;
        
        
    }
    function Criar($a,$b,$c,$d,$e){
        $this->Nome = $a;
        $this->Valor = $b;
        $this->Quantidade = $c;
        $this->Img = $d;
        $this->Id = $e;
    }
}
?>