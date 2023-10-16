<?php
namespace TrabajoSube;

class Tarjeta{
    protected $saldo;
    public $limite;
    public $limiteInferior;
    public $porcentajeDescuento;
    public $idTarjeta;
    public $tipoTarjeta;
    protected $pendiente;
    public $viajes = 0;
    public $viajesMes;
    
    
    function __construct(){
        $this->saldo = 0;
        $this->limite = 6600; 
        $this->limiteInferior = -211.84;
        $this->porcentajeDescuento = 0;
        $this->idTarjeta = $this->str_rand(16);
        $this->tipoTarjeta = "Normal";
        $this->pendiente = 0;
        $this->viajesMes = "Jan";
    }

    function getSaldo(){
        return $this->saldo;
    }
    
    function getPendiente(){
        return $this->pendiente;
    }

    function str_rand(int $length = 64){
        $length = ($length < 4) ? 4 : $length;
        return bin2hex(random_bytes(($length-($length%2))/2));
    }

    function CalcularPendiente(){
        if($this->saldo > $this->limite){
            $this->pendiente = $this->pendiente + ($this->saldo - $this->limite);
            $this->SaldoAlMax();
        }
    }

    function SetDescuentoUsoFrecuente(){
        if($this->viajes <= 29){
            $this->porcentajeDescuento = 0;
            return;
        }
        if($this->viajes <= 79){
            $this->porcentajeDescuento = 20;
            return;
        }
        if($this->viajes >= 80){
            $this->porcentajeDescuento = 25;
            return;
        }
    }

    function AumentarViajes(){
        $this->viajes += 1;
    }

    function ResetearViajes($_mes){
        $this->viajes = 0;
        $this->viajesMes = $_mes;
    }
    
    function GetViajesMes(){
        return $this->viajesMes;
    }

    function SaldoAlMax(){
        if($this->saldo > $this->limite){
            $this->saldo = $this->limite;
        }
    }

    function AcreditarPendienteColectivo(){
        if($this->saldo < $this->limite){
            $this->saldo = $this->saldo + $this->pendiente;
        }
        if($this->saldo > $this->limite){
            $this->pendiente = $this->saldo - $this->limite;
            $this->saldo = $this->limite;
        }
    }


    function cargar($monto){
        if($monto >= 150){
            if($monto <= 500 && (($monto % 50) == 0)){
                $this->saldo = $this->saldo + $monto;
                $this->CalcularPendiente();
                $this->SaldoAlMax();
                return TRUE;
            }
            elseif($monto <= 1500 && (($monto % 100) == 0)){
                $this->saldo = $this->saldo + $monto;
                    $this->CalcularPendiente();
                    $this->SaldoAlMax();
                    return TRUE;
                    }
            elseif($monto <= 4000 && (($monto % 500 == 0))){
                $this->saldo = $this->saldo + $monto;
                $this->CalcularPendiente();
                $this->SaldoAlMax();
                return TRUE;
            }
            else{
                echo "El monto de la carga no es valido.";
                return FALSE;
            }
        }
        else{
            echo "El monto de la carga no es valido.";
            return FALSE;
        }
    }
    
    
    
}
