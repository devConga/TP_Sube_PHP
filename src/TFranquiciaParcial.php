<?php
namespace TrabajoSube;
include_once 'Tarjeta.php';

class TFranquiciaParcial extends Tarjeta{
    public $porcentajeDescuento;
    public $viajesRealizados;
    public $ultimoViajeDia;
    public $ultimoViajeHora;

    function __construct(){
        parent::__construct();
        $this->tipoTarjeta = "Franquicia Parcial";
        $this->porcentajeDescuento = 50;
        $this->viajesRealizados = 0;
        $this->ultimoViajeHora = 0;
    }
}
