<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
   
    public function testPagarCon(){
    $tiempo = new Tiempo();
    $colectivo = new Colectivo("Q", $tiempo);
    $tarjeta = new Tarjeta();
    
    $boleto = $colectivo->pagarCon($tarjeta);
    
    $this->assertEquals("Q", $colectivo->linea);
    $this->assertFalse($colectivo->pagarCon($tarjeta));
}

}