<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TFranquiciaCompletaTest extends TestCase{

    public function testSiemprePuedePagar(){
    
        $tarjeta = new TFranquiciaCompleta();
        $colectivo = new Colectivo("Q", time());
        $boleto = $colectivo->pagarCon($tarjeta);
        
        $tarjeta->saldo = -211.84;
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->assertEquals("Franquicia Completa", $tarjeta->tipoTarjeta);
        $this->assertEquals("Franquicia Completa", $boleto->tipoTarjeta);

    }

}