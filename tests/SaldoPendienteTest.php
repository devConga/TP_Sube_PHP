<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class SaldoPendienteTest extends TestCase{
   
    public function testSaldoPendiente(){
        $tarjeta = new Tarjeta;
        $tarjeta->cargar(3500);
        $tarjeta->cargar(3500);

        $this->assertEquals(6600, $tarjeta->saldo);
        $this->assertEquals(400, $tarjeta->pendiente);
    }

    public function testRecargaPendiente(){
        $tarjeta = new Tarjeta;
        $tarjeta->cargar(3500);
        $tarjeta->cargar(3500);

        $tiempo = new Tiempo();
        $colectivo = new Colectivo("138", $tiempo);

        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);
        
        $this->assertEquals(6400, $tarjeta->saldo);
    }

}