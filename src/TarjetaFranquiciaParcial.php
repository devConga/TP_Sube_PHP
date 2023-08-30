<?php
namespace TrabajoSube;
include 'Tarjeta.php';

class TarjetaFranquiciaParcial extends Tarjeta{
    public $porcentajeDescuento;

    function __construct(){
        $this->porcentajeDescuento = 100;
    }
}