<?php
namespace TrabajoSube;
include_once 'Tarjeta.php';

class TFranquiciaCompleta extends Tarjeta{
    public $porcentajeDescuento;
    public $viajesRealizados;
    public $ultimoViajeDia;

    function __construct(){
        parent::__construct();
        $this->tipoTarjeta = "Franquicia Completa";
        $this->porcentajeDescuento = 100;
        $this->viajesRealizados = 0;
    }
}