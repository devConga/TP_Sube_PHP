<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
   
    public function testPagarCon(){
    $colectivo = new Colectivo();
    $tarjeta = new Tarjeta();
    $tarjeta->saldo = -200;
    
    $this->assertFalse($colectivo->pagarCon($tarjeta));}

}