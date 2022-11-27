<?php
   class Cliente{
    var $Id;
    var $Nome_cliente;
    var $Adm;
    var $Img;
    
    function Criar($a,$b,$c,$d){
        $this->Nome_cliente = $a;
        $this->Adm = $b;
        $this->Img = $c;
        $this->Id = $d;
    }

   }
?>