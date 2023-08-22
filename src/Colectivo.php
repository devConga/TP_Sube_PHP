<?php
namespace TrabajoSube;

class Tarjeta{
    $saldo;
    $limite;
    
    function __construct(){
        $this->saldo = 0;
        $this->limite = 6600; 
    }

    function cargar($monto){
        if($this->saldo + $monto <= $this->limite){
            $this->saldo = $this->saldo + $monto;
        }
        else{
            echo "La carga excede el limite";
        }
    }

}



class Colectivo{
    function pagarCon($tarjeta){
        
    }
}