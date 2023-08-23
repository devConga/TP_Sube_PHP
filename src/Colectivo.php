<?php
namespace TrabajoSube;

class Tarjeta{
    public $saldo;
    public $limite;
    
    function __construct(){
        $this->saldo = 0;
        $this->limite = 6600; 
    }

    function cargar($monto){
        if($this->saldo + $monto <= $this->limite){
            if($monto >= 150){
                if($monto <= 500 && (($monto % 50) == 0)){
                    $this->saldo = $this->saldo + $monto;
                }
                elseif($monto <= 1500 && (($monto % 100) == 0)){
                        $this->saldo = $this->saldo + $monto;
                    }
                elseif($monto <= 4000 && (($monto % 500 == 0))){
                    $this->saldo = $this->saldo + $monto;
                }
                else{
                    echo "El monto de la carga no es valido.";
                }
            }
            else{
                echo "El monto de la carga no es valido.";
            }
        }
        else{
            echo "La carga excede el limite";
        }
    }
}

class Boleto{
    public $hora;
    public $costoBoleto;
    public $saldoRestante;

    function __construct($costoBoleto='Undefined', $saldoRestante='Undefined'){
        $this->hora = date('h:i:s');
        $this->costoBoleto = $costoBoleto;
        $this->saldoRestante = $saldoRestante;
    }

    function observar(){
        echo ('Hora: ' . $this->hora . "\nCosto del Boleto: " . $this->costoBoleto . "\nSaldo Restante: " . $this->saldoRestante);
    }
}


class Colectivo{

    public $boletoNormal;

    function __construct(){
        $this->boletoNormal = 120;
    }

    function pagarCon($tarjeta){
        if($tarjeta->saldo < $this->boletoNormal){
            echo 'Saldo insuficiente';
        }
        else{
            $tarjeta->saldo = $tarjeta->saldo - $this->boletoNormal;

            $boleto = new Boleto($this->boletoNormal, $tarjeta->saldo);
            $boleto->observar();
        }
    }
    
}