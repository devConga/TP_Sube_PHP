<?php
namespace TrabajoSube;

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