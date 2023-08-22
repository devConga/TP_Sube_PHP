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

class Boleto{
    
}


class Colectivo{

    $boletoNormal;

    function __construct(){
        $this->boletoNormal = 120;
    }

    function pagarCon($tarjeta){
        if($tarjeta->saldo < $this->boletoNormal){
            echo 'Saldo insuficiente';
        }
        else{
            $tarjeta->saldo = $tarjeta->saldo - $this->boletoNormal;
        }
    }
}