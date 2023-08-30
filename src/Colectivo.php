<?php
namespace TrabajoSube;
include 'Boleto.php';

class Colectivo{

    public $boletoNormal;

    function __construct(){
        $this->boletoNormal = 120;
    }

   /*  function descuento2multiplicador($descuento = 0){
        return (100-$descuento)/100;
    } */

    function pagarCon($tarjeta){
        if($tarjeta->saldo < ($this->boletoNormal * (100-$tarjeta->porcentajeDescuento)/100)){
            echo 'Saldo insuficiente';
            return FALSE;
        }
        else{
            $tarjeta->saldo = $tarjeta->saldo - ($this->boletoNormal * (100-$tarjeta->porcentajeDescuento)/100);

            $boleto = new Boleto($this->boletoNormal, $tarjeta->saldo);
            return $boleto;
        }
    }
    
}


