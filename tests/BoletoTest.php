<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{
   
    public function testEsBoleto(){
    $colectivo = new Colectivo();
    $tarjeta = new Tarjeta();
    $tarjeta->cargar(300);
    $this->assertInstanceOf(Boleto, $colectivo->pagarCon($tarjeta));
}

}