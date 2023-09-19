<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class SaldoPendienteTest extends TestCase{
   
    public function testSaldoPendiente(){
    $tarjeta = new Tarjeta;
    $tarjeta->cargar(3500);
    $tarjeta->cargar(3500);
    $this->assertEquals(400, $tarjeta->pendiente);

}

}