<?php
namespace TrabajoSube;
include_once 'Tarjeta.php';

class TFranquiciaParcial extends Tarjeta{
    public $porcentajeDescuento;

    function __construct(){
        parent::__construct();
        $this->tipoTarjeta = "Franquicia Parcial";
        $this->porcentajeDescuento = 50;
    }
}



//No quiero hablar de lo que esta aca abajo


/* namespace TrabajoSube;

class TFranquiciaParcial{
    public $saldo;
    public $limite;
    public $porcentajeDescuento;
    
    
    function __construct(){
        $this->saldo = 0;
        $this->limite = 6600; 
        $this->porcentajeDescuento = 50;
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
} */