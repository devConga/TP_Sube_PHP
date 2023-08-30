<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TFranquiciaParcialTest extends TestCase{

    public function testFParcialEsMitad(){
    
        $tarjeta = new TFranquiciaParcial();
        $colectivo = new Colectivo();
        $this->assertTrue(($colectivo->boletoNormal * $colectivo->descuento2multiplicador($tarjeta->porcentajeDescuento)) == ($colectivo->boletoNormal / 2));

    }

}