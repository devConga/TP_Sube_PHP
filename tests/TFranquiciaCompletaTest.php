<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TFranquiciaCompletaTest extends TestCase{

    public function testSiemprePuedePagar(){
    
        $tarjeta = new TFranquiciaCompleta();
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("Q", $tiempo);
        $tiempo->AvanzarSegundos(21600);
        $boleto = $colectivo->pagarCon($tarjeta);
        
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->assertEquals("Franquicia Completa", $tarjeta->tipoTarjeta);
        $this->assertEquals("Franquicia Completa", $boleto->tipoTarjeta);

    }

    public function testTercerBoletoDia(){
        $tarjeta = new TFranquiciaCompleta();
        $tiempoFalso = new TiempoFalso();
        $colectivo = new Colectivo("115", $tiempoFalso);
        $tarjeta->cargar(600);
        $tiempoFalso->AvanzarSegundos(21600);

        $boleto = $colectivo->pagarCon($tarjeta);
        $tiempoFalso->AvanzarSegundos(350);
        $boleto = $colectivo->pagarCon($tarjeta);

        $saldo = $tarjeta->saldo;
        
        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals($saldo - 185, $tarjeta->getSaldo());

    }


}