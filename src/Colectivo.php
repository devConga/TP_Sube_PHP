<?php
namespace TrabajoSube;
include_once 'Boleto.php';

class Colectivo{

    public $boletoNormal;
    public $linea;
    private $hayPendiente;
    private $canceloPendiente;
    private $hora;
    private $dia;

    function __construct($linea="Q", $hora, $dia){
        $this->boletoNormal = 185;
        $this->linea = $linea;
        $this->hora = $hora;
        $this->dia = $dia;
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
                    if($this->dia != $tarjeta->ultimoViajeDia){
                        $tarjeta->viajesRealizados = 0;
                    }

                    if(($this->hora - $tarjeta->ultimoViajeHora) < 300 && $tarjeta->ultimoViajeHora != 0){
                        echo 'Espere para viajar nuevamente';
                        return FALSE;
                    } 
                    else{
                        if($tarjeta->viajesRealizados < 4){
                        $tarjeta->saldo = $tarjeta->saldo - ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento));
                        $tarjeta->ultimoViajeDia = $this->dia;
                        $tarjeta->ultimoViajeHora = $this->hora;
                        $tarjeta->viajesRealizados+=1;
                        }
                        else{
                            $tarjeta->saldo = $tarjeta->saldo - $this->boletoNormal;
                            $tarjeta->ultimoViajeDia = $this->dia;
                            $tarjeta->ultimoViajeHora = $this->hora;
                        }
                    }
                    
                    break;
                
                case "Franquicia Completa":
                    if($this->dia != $tarjeta->ultimoViajeDia){
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

            $boleto = new Boleto(($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento)), $tarjeta->saldo, $tarjeta->idTarjeta, $tarjeta->tipoTarjeta, $this->linea, $this->canceloPendiente);
            $this->canceloPendiente = FALSE;
            return $boleto;
        }
    }
    
}


