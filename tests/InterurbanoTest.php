<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class InterurbanoTest extends TestCase{

    public function testPrecioBoleto(){

        $tiempo = new Tiempo();
        $colectivo = new ColectivoInterurbano("35/9", $tiempo);
        $tarjeta = new Tarjeta();
        $tarjeta->cargar(200);

        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals(16, $tarjeta->getSaldo());
    }
}