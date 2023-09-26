<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{
   
    public function testEsBoleto(){
        $colectivo = new Colectivo("Q", time());
        $tarjeta = new Tarjeta();
        $tarjeta->cargar(300);
        $this->assertInstanceOf(Boleto::class, $colectivo->pagarCon($tarjeta));
    }
    public function testTipoTarjetaNormal(){
        $colectivo = new Colectivo("Q", time());
        $tarjeta = new Tarjeta();
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals("Normal", $boleto->getTipoTarjeta);
    }
    public function testTipoTarjetaParcial(){
        $colectivo = new Colectivo("Q", time());
        $tarjeta = new TFranquiciaParcial();
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals("Franquicia Parcial", $boleto->getTipoTarjeta);
    }
    public function testTipoTarjetaCompleta(){
        $colectivo = new Colectivo("Q", time());
        $tarjeta = new TFranquiciaCompleta();
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals("Franquicia Completa", $boleto->getTipoTarjeta);
    }

}