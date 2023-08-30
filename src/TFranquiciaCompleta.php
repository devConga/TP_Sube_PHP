<?php
namespace TrabajoSube;
include_once 'Tarjeta.php';

class TFranquiciaCompleta extends Tarjeta{
    public $porcentajeDescuento;

    function __construct(){
        parent::__construct();
        $this->porcentajeDescuento = 100;
    }
}