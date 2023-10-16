<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranjaHorariaTest extends TestCase{

    public function testFranquiciaCompletaFranja(){
        $tarjeta = new TFranquiciaCompleta();
        $tiempoFalso = new TiempoFalso();
        $colectivo = new Colectivo("115", $tiempoFalso);
        $tarjeta->cargar(600);
        $tiempoFalso->AvanzarSegundos(15000);
        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals(415, $tarjeta->saldo);
    }
}