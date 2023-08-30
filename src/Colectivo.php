<?php
namespace TrabajoSube;
include 'Boleto.php';

class Colectivo{

    public $boletoNormal;

    function __construct(){
        $this->boletoNormal = 120;
    }

    function descuento2multiplicador($descuento = 0){
        return (100-$descuento)/100;
    }

    function pagarCon($tarjeta){
        if($tarjeta->saldo < ($this->boletoNormal * descuento2multiplicador($tarjeta->porcentajeDescuento))){
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


