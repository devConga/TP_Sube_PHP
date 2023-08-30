<?php
namespace TrabajoSube;
include 'Tarjeta.php';

class TFranquiciaParcial extends Tarjeta{
    public $porcentajeDescuento;

    function __construct(){
        parent::__construct();
        $this->porcentajeDescuento = 100;
    }
}