<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
   
    public function testPagarCon(){
        $tiempoFalso = new TiempoFalso();
    $colectivo = new Colectivo("Q", $tiempoFalso);
    $tarjeta = new Tarjeta();
    $tarjeta->saldo = -200;
    
    $this->assertFalse($colectivo->pagarCon($tarjeta));}

}