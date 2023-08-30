<?php
namespace TrabajoSube;
include_once 'Boleto.php';

class Colectivo{

    public $boletoNormal;

    function __construct(){
        $this->boletoNormal = 120;
    }

    function descuento2multiplicador($descuento = 0){
        return (100-$descuento)/100;
    }

    function pagarCon($tarjeta){
        if($tarjeta->saldo < ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento))){
            echo 'Saldo insuficiente';
            return FALSE;
        }
        else{
            $tarjeta->saldo = $tarjeta->saldo - ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento));

            $boleto = new Boleto($this->boletoNormal, $tarjeta->saldo);
            return $boleto;
        }
    }
    
}


