<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ViajePlusTest extends TestCase{
   
    public function testDescuentaSaldo(){
    $tiempo = new Tiempo();
    $colectivo = new Colectivo("Q", $tiempo);
    $tarjeta = new Tarjeta();
    $colectivo->pagarCon($tarjeta);
    $this->assertEquals(-185, $tarjeta->saldo);
}

}