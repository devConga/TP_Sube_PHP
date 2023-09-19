<?php
namespace TrabajoSube;
include_once 'Boleto.php';

class Colectivo{

    public $boletoNormal;
    public $linea;
    private $hayPendiente;
    private $canceloPendiente;

    function __construct($linea="Q"){
        $this->boletoNormal = 120;
        $this->linea = $linea;
    }

    function descuento2multiplicador($descuento = 0){
        return (100-$descuento)/100;
    }

    function pagarCon($tarjeta){

        if($tarjeta->pendiente > 0){
            $this->hayPendiente = TRUE;
        }

        if(($tarjeta->saldo - ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento))) < $tarjeta->limiteInferior){
            echo 'Saldo insuficiente';
            return FALSE;
        }
        else{
            $tarjeta->saldo = $tarjeta->saldo - ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento));
            
            if(($tarjeta->pendiente > 0) != $this->hayPendiente){
                $this->canceloPendiente = TRUE;
            }

            $boleto = new Boleto($this->boletoNormal, $tarjeta->saldo, $tarjeta->idTarjeta, $tarjeta->tipoTarjeta, $this->linea, $this->canceloPendiente);
            $this->canceloPendiente = FALSE;
            return $boleto;
        }
    }
    
}


