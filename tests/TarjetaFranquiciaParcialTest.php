<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaFranquiciaParcialTest extends TestCase{
   
    /** @test */
    public function FParcialEsMitad(){
    
        $tarjeta = new TarjetaFranquiciaParcial();
        $colectivo = new Colectivo();
        $this->assertEquals(($colectivo->boletoNormal * (100-$tarjeta->porcentajeDescuento)/100), ($colectivo->boletoNormal / 2));

    }

}