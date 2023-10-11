<?php
namespace TrabajoSube;

class Tarjeta{
    private $saldo;
    public $limite;
    public $limiteInferior;
    public $porcentajeDescuento;
    public $idTarjeta;
    public $tipoTarjeta;
    public $pendiente;
    
    
    function __construct(){
        $this->saldo = 0;
        $this->limite = 6600; 
        $this->limiteInferior = -211.84;
        $this->porcentajeDescuento = 0;
        $this->idTarjeta = $this->str_rand(16);
        $this->tipoTarjeta = "Normal";
    }
        
    function str_rand(int $length = 64){
        $length = ($length < 4) ? 4 : $length;
        return bin2hex(random_bytes(($length-($length%2))/2));
    }

    function AcreditarYCalcularPendiente(){
        if($this->saldo < $this->limite){
            $this->saldo = $this->saldo + $this->pendiente;
            $this->pendiente = 0;
        }
        if($this->saldo > $this->limite){
            $this->pendiente = $this->pendiente + ($this->saldo - $this->limite);
            $this->saldo = $this->limite;
        }
    }


    function cargar($monto){
        if($monto >= 150){
            if($monto <= 500 && (($monto % 50) == 0)){
                $this->saldo = $this->saldo + $monto;
                $this->AcreditarYCalcularPendiente();
                return TRUE;
            }
            elseif($monto <= 1500 && (($monto % 100) == 0)){
                $this->saldo = $this->saldo + $monto;
                    $this->AcreditarYCalcularPendiente();
                    return TRUE;
                    }
            elseif($monto <= 4000 && (($monto % 500 == 0))){
                $this->saldo = $this->saldo + $monto;
                $this->AcreditarYCalcularPendiente();
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
