<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TFranquiciaParcialTest extends TestCase{

    public function testFParcialEsMitad(){
    
        $tarjeta = new TFranquiciaParcial();
        $colectivo = new Colectivo();
        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertTrue(($colectivo->boletoNormal * $colectivo->descuento2multiplicador($tarjeta->porcentajeDescuento)) == (120 / 2));
        $this->assertEquals("Franquicia Parcial", $tarjeta->tipoTarjeta);
        $this->assertEquals("Franquicia Parcial", $boleto->tipoTarjeta);

    }

}