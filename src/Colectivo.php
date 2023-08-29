<?php
namespace TrabajoSube;
include 'Boleto.php';

class Colectivo{

    public $boletoNormal;

    function __construct(){
        $this->boletoNormal = 120;
    }

    function pagarCon($tarjeta){
        if($tarjeta->saldo < $this->boletoNormal){
            echo 'Saldo insuficiente';
            return FALSE;
        }
        else{
            $tarjeta->saldo = $tarjeta->saldo - $this->boletoNormal;

            $boleto = new Boleto($this->boletoNormal, $tarjeta->saldo);
            $boleto->observar();
            return $boleto;
        }
    }
    
}


