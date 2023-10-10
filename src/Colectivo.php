<?php
namespace TrabajoSube;
include_once 'Boleto.php';

class Colectivo{

    public $boletoNormal;
    public $linea;
    private $hayPendiente;
    private $canceloPendiente;
    private $hora;

    function __construct($linea="Q", $hora){
        $this->boletoNormal = 185;
        $this->linea = $linea;
        $this->hora = $hora;
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
            switch($tarjeta->tipoTarjeta){
                case "Franquicia Parcial":
                    if(floor($this->hora/86400) != floor($tarjeta->ultimoViaje/86400)){
                        $tarjeta->viajesRealizados = 0;
                    }
                    if(($this->hora - $tarjeta->ultimoViaje) < 600){
                        echo 'Espere para viajar nuevamente';
                        return FALSE;
                    } 
                    else if($tarjeta->viajesRealizados < 4){
                        $tarjeta->saldo = $tarjeta->saldo - ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento));
                        $tarjeta->ultimoViaje = $this->hora;
                        $tarjeta->viajesRealizados+=1;
                    }
                    else{
                        $tarjeta->saldo = $tarjeta->saldo - $this->boletoNormal;
                    }
                    break;
                
                case "Franquicia Completa":
                    if(floor($this->hora/86400) != floor($tarjeta->ultimoViaje/86400)){
                        $tarjeta->viajesRealizados = 0;
                    }
                    if($tarjeta->viajesRealizados < 2){
                        $tarjeta->saldo = $tarjeta->saldo - ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento));
                    }
                    else{
                        $tarjeta->saldo = $tarjeta->saldo - $this->boletoNormal;
                    }
                    break;

                default:
                    $tarjeta->saldo = $tarjeta->saldo - $this->boletoNormal;
                    break;
            }
            
            if(($tarjeta->pendiente > 0) != $this->hayPendiente){
                $this->canceloPendiente = TRUE;
            }

            $boleto = new Boleto($this->boletoNormal, $tarjeta->saldo, $tarjeta->idTarjeta, $tarjeta->tipoTarjeta, $this->linea, $this->canceloPendiente);
            $this->canceloPendiente = FALSE;
            return $boleto;
        }
    }
    
}


