<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TFranquiciaParcialTest extends TestCase{

    public function testFParcialEsMitad(){
    
        $tarjeta = new TarjetaFranquiciaParcial();
        $colectivo = new Colectivo();
        $this->assertTrue(($colectivo->boletoNormal * (100-$tarjeta->porcentajeDescuento)/100) == ($colectivo->boletoNormal / 2));

    }

}