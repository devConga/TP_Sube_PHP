<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class SaldoPendienteTest extends TestCase{
   
    public function testSaldoPendiente(){
    $tarjeta = new Tarjeta;
    $tarjeta->cargar(7000);
    $this->assertEquals($tarjeta->pendiente, 400);

}

}