<?php
namespace TrabajoSube;

class Boleto{
    public $hora;
    public $fecha;
    public $costoBoleto;
    public $saldoRestante;
    public $idTarjeta;

    function __construct($costoBoleto='Undefined', $saldoRestante='Undefined', $idTarjeta=0){
        $this->hora = date('h:i:s');
        $this->fecha = date('d-m');
        $this->costoBoleto = $costoBoleto;
        $this->saldoRestante = $saldoRestante;
        $this->$idTarjeta = $idTarjeta;
    }

    function getFecha(){
        return $this->fecha;
    }

    function getHora(){
        return $this->hora;
    }

    function getCosto(){
        return $this->costoBoleto;
    }

    function getSaldo(){
        return $this->saldoRestante;
    }
    
}