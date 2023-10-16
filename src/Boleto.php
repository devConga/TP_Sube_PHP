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

    function __construct($costoBoleto, $saldoRestante, $idTarjeta=0, $tipoTarjeta, $linea){
        $this->hora = date('h:i:s');
        $this->fecha = date('d-m');
        $this->costoBoleto = $costoBoleto;
        $this->saldoRestante = $saldoRestante;
        $this->idTarjeta = $idTarjeta;
        $this->tipoTarjeta = $tipoTarjeta;
        $this->linea = $linea;
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

    
}