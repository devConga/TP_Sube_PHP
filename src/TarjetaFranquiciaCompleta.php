<?php
namespace TrabajoSube;
include 'Tarjeta.php';

class TarjetaFranquiciaCompleta extends Tarjeta{
    public $porcentajeDescuento;

    function __construct(){
        $this->porcentajeDescuento = 50;
    }
}