<?php
namespace TrabajoSube;

class Boleto{
    public $hora;
    public $fecha;
    public $costoBoleto;
    public $saldoRestante;
    public $idTarjeta;
    public $tipoTarjeta;
    public $linea;
    public $result;

    function __construct($costoBoleto, $saldoRestante, $idTarjeta, $tipoTarjeta, $linea){
        $this->hora = date('h:i:s');
        $this->fecha = date('d-m');
        $this->costoBoleto = $costoBoleto;
        $this->saldoRestante = $saldoRestante;
        $this->idTarjeta = $idTarjeta;
        $this->tipoTarjeta = $tipoTarjeta;
        $this->linea = $linea;
        $this->result = "ABONA: " . $costoBoleto . "\nSALDO: " . $saldoRestante . "\nLINEA: " . $linea . "\nID: " . $idTarjeta;
    }


    function getBoleto(){
        echo $this->result;
        return $this->result;
    }
    
}