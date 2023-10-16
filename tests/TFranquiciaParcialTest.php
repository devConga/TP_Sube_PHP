<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TFranquiciaParcialTest extends TestCase{

    public function testFParcialEsMitad(){
    
        $tarjeta = new TFranquiciaParcial();
        $tiempoFalso = new TiempoFalso();
        $colectivo = new Colectivo("Q", $tiempoFalso);
        $tiempoFalso->AvanzarSegundos(21600);
        $boleto = $colectivo->pagarCon($tarjeta);
        

        $this->assertTrue(($colectivo->boletoNormal * $colectivo->descuento2multiplicador($tarjeta->porcentajeDescuento)) == (185 / 2));
        $this->assertEquals("Franquicia Parcial", $tarjeta->tipoTarjeta);
        $this->assertEquals("Franquicia Parcial", $boleto->tipoTarjeta);

    }

    public function testMarcarCincoMinutos(){
        $tarjeta = new TFranquiciaParcial();
        $tiempoFalso = new TiempoFalso();
        $colectivo = new Colectivo("115", $tiempoFalso);

        $tarjeta->cargar(600);
        $tiempoFalso->AvanzarSegundos(21600);
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertFalse($colectivo->pagarCon($tarjeta));
    }

    public function testQuintoBoletoDia(){
        $tarjeta = new TFranquiciaParcial();
        $tiempoFalso = new TiempoFalso();
        $colectivo = new Colectivo("115", $tiempoFalso);
        $tarjeta->cargar(600);
        $tiempoFalso->AvanzarSegundos(21600);

        $boleto = $colectivo->pagarCon($tarjeta);
        $tiempoFalso->AvanzarSegundos(350);
        $boleto = $colectivo->pagarCon($tarjeta);
        $tiempoFalso->AvanzarSegundos(350);
        $boleto = $colectivo->pagarCon($tarjeta);
        $tiempoFalso->AvanzarSegundos(350);
        $boleto = $colectivo->pagarCon($tarjeta);

        $saldo = $tarjeta->saldo;
        
        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals($saldo - 185, $tarjeta->saldo);

    }

}