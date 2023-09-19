<?php
namespace TrabajoSube;

class Boleto{
    public $hora;
    public $fecha;
    public $costoBoleto;
    public $saldoRestante;
    public $idTarjeta;
    public $tipoTarjeta;
    private $linea;
    private $canceloPendiente;

    function __construct($costoBoleto='Undefined', $saldoRestante='Undefined', $idTarjeta=0, $tipoTarjeta="Undefined", $linea, $canceloPendiente){
        $this->hora = date('h:i:s');
        $this->fecha = date('d-m');
        $this->costoBoleto = $costoBoleto;
        $this->saldoRestante = $saldoRestante;
        $this->idTarjeta = $idTarjeta;
        $this->tipoTarjeta = $tipoTarjeta;
        $this->linea = $linea;
        $this->canceloPendiente = $canceloPendiente;
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

    function getTipoTarjeta(){
        return $this->tipoTarjeta;
    }

    function getLinea(){
        return $this->linea;
    }

    function getCanceloPendiente(){
        return $this->canceloPendiente;
    }
    
}