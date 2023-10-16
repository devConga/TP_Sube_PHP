<?php
namespace TrabajoSube;
include_once 'Boleto.php';

class Colectivo{

    public $boletoNormal = 185;
    public $linea;
    private $hayPendiente;
    public $tiempo;

    function __construct($linea="Q", TiempoInterface $tiempo){
        $this->linea = $linea;
        $this->tiempo = $tiempo;
    }

    function descuento2multiplicador($descuento = 0){
        return (100-$descuento)/100;
    }

    function checkFranjaHoraria(){
        if($this->tiempo->dayOTW() != "Sat" && $this->tiempo->dayOTW() != "Sun"){
            if($this->tiempo->time24Hr() >= 6 && $this->tiempo->time24Hr() < 22){
                return TRUE;
            }
            return FALSE;
        }
        return FALSE;
    }

    function pagarCon($tarjeta){

        if($tarjeta->tipoTarjeta == "Normal"){
            $tarjeta->SetDescuentoUsoFrecuente();
        }

        if(($tarjeta->saldo - ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento))) < $tarjeta->limiteInferior){
            echo 'Saldo insuficiente';
            return FALSE;
        }
        else{
            switch($tarjeta->tipoTarjeta){
                case "Franquicia Parcial":
                    if($this->tiempo->day() != $tarjeta->ultimoViajeDia){
                        $tarjeta->viajesRealizados = 0;
                    }

                    if((($this->tiempo->time() - $tarjeta->ultimoViajeHora) < 300 && $tarjeta->ultimoViajeHora != 0) && $tarjeta->viajesRealizados < 4){
                        echo 'Espere para viajar nuevamente';
                        return FALSE;
                    } 
                    else{
                        if($tarjeta->viajesRealizados < 4 && $this->checkFranjaHoraria()){
                        $tarjeta->saldo = $tarjeta->saldo - ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento));
                        $tarjeta->ultimoViajeDia = $this->tiempo->day();
                        $tarjeta->ultimoViajeHora = $this->tiempo->time();
                        $tarjeta->viajesRealizados+=1;
                        }
                        else{
                            $tarjeta->saldo = $tarjeta->saldo - $this->boletoNormal;
                            $tarjeta->ultimoViajeDia = $this->tiempo->day();
                            $tarjeta->ultimoViajeHora = $this->tiempo->time();
                        }
                    }
                    
                    break;
                
                case "Franquicia Completa":
                    if($this->tiempo->day() != $tarjeta->ultimoViajeDia){
                        $tarjeta->viajesRealizados = 0;
                    }
                    if($tarjeta->viajesRealizados < 2 && $this->checkFranjaHoraria()){
                        $tarjeta->saldo = $tarjeta->saldo - ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento));
                        $tarjeta->viajesRealizados+=1;
                        $tarjeta->ultimoViajeDia = $this->tiempo->day();
                    }
                    else{
                        $tarjeta->saldo = $tarjeta->saldo - $this->boletoNormal;
                        $tarjeta->ultimoViajeDia = $this->tiempo->day();
                    }
                    break;

                default:
                    if($tarjeta->GetViajesMes() != $this->tiempo->month()){
                        $tarjeta->ResetearViajes($this->tiempo->month());
                    }
                    $tarjeta->saldo = $tarjeta->saldo - ($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento));
                    $tarjeta->AumentarViajes();
                    break;
            }

            if($tarjeta->pendiente > 0){
                $this->hayPendiente = TRUE;
                $tarjeta->AcreditarPendienteColectivo();
            }

            $boleto = new Boleto(($this->boletoNormal * $this->descuento2multiplicador($tarjeta->porcentajeDescuento)), $tarjeta->saldo, $tarjeta->idTarjeta, $tarjeta->tipoTarjeta, $this->linea);

            return $boleto;
        }
    }
    
}


