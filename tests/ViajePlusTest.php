<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ViajePlusTest extends TestCase{
   
    public function testDescuentaSaldo(){
    $colectivo = new Colectivo("Q", time(), date('d'));
    $tarjeta = new Tarjeta();
    $colectivo->pagarCon($tarjeta);
    $this->assertEquals(-185, $tarjeta->saldo);
}

}