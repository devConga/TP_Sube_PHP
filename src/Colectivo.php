<?php
namespace TrabajoSube;

class Tarjeta{
    $saldo;
    $limite;
    
    function __construct(){
        $this->saldo = 0;
        $this->limite = 6600; 
    }

    function cargar($monto){
        if($this->saldo + $monto <= $this->limite){
            $this->saldo = $this->saldo + $monto;
        }
        else{
            echo "La carga excede el limite";
        }
    }

}

class Boleto{
    $hora;
    $costoBoleto;
    $saldoRestante;
    date_default_timezone_set('UTC-3');

    function __construct($costoBoleto='Undefined', $saldoRestante='Undefined'){
        $this->hora = date('h:i:s');
        $this->costoBoleto = $costoBoleto;
        $this->saldoRestante = $saldoRestante;
    }

    function observar(){
        echo ('Hora: ' . $this->hora . '\nCosto del Boleto: ' . $this->costoBoleto . '\nSaldo Restante: ' . $this->saldoRestante);
    }
}


class Colectivo{

    $boletoNormal;

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