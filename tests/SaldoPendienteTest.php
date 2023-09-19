<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class SaldoPendienteTest extends TestCase{
   
    public function testSaldoPendiente(){
    $tarjeta = new Tarjeta;
    $tarjeta->cargar(7000);
    $this->assertEquals(400, $tarjeta->pendiente);

}

}