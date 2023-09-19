<?php
namespace TrabajoSube;

class Tarjeta{
    public $saldo;
    public $limite;
    public $limiteInferior;
    public $porcentajeDescuento;
    public $idTarjeta;
    public $tipoTarjeta;
    
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

    function cargar($monto){
        if($this->saldo + $monto <= $this->limite){
            if($monto >= 150){
                if($monto <= 500 && (($monto % 50) == 0)){
                    $this->saldo = $this->saldo + $monto;
                    return TRUE;
                }
                elseif($monto <= 1500 && (($monto % 100) == 0)){
                        $this->saldo = $this->saldo + $monto;
                        return TRUE;
                    }
                elseif($monto <= 4000 && (($monto % 500 == 0))){
                    $this->saldo = $this->saldo + $monto;
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
        else{
            echo "La carga excede el limite";
            return FALSE;
        }
    }
}
