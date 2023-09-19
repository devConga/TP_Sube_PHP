<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ViajePlusTest extends TestCase{
   
    public function testDescuentaSaldo(){
    $colectivo = new Colectivo();
    $tarjeta = new Tarjeta();
    $colectivo->pagarCon($tarjeta);
    $this->assertEquals(-120, $tarjeta->saldo);
}

}