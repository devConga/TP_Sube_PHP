<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{
   
    public function testEsBoleto(){
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("Q", $tiempo);
        $tarjeta = new Tarjeta();
        $tarjeta->cargar(300);
        $this->assertInstanceOf(Boleto::class, $colectivo->pagarCon($tarjeta));
    }
    public function testTipoTarjetaNormal(){
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("Q", $tiempo);
        $tarjeta = new Tarjeta();
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals("Normal", $boleto->getTipoTarjeta());
    }
    public function testTipoTarjetaParcial(){
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("Q", $tiempo);
        $tarjeta = new TFranquiciaParcial();
        $tiempo->AvanzarSegundos(21600);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals("Franquicia Parcial", $boleto->getTipoTarjeta());
    }
    public function testTipoTarjetaCompleta(){
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("Q", $tiempo);
        $tarjeta = new TFranquiciaCompleta();
        $tiempo->AvanzarSegundos(21600);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals("Franquicia Completa", $boleto->getTipoTarjeta());
    }

}