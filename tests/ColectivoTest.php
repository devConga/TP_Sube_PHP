<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
   
    public function testPagarCon(){
    $tiempo = new Tiempo();
    $colectivo = new Colectivo("Q", $tiempo);
    $tarjeta = new Tarjeta();
    $tarjeta->saldo = -200;
    
    $this->assertFalse($colectivo->pagarCon($tarjeta));}

}