<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TFranquiciaParcialTest extends TestCase{

    public function testFParcialEsMitad(){
    
        $tarjeta = new TFranquiciaParcial();
        $colectivo = new Colectivo("Q", time(), date('d'));
        $boleto = $colectivo->pagarCon($tarjeta);
        

        $this->assertTrue(($colectivo->boletoNormal * $colectivo->descuento2multiplicador($tarjeta->porcentajeDescuento)) == (185 / 2));
        $this->assertEquals("Franquicia Parcial", $tarjeta->tipoTarjeta);
        $this->assertEquals("Franquicia Parcial", $boleto->tipoTarjeta);

    }

    public function testMarcarCincoMinutos(){
        $tarjeta = new TFranquiciaParcial();
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("115", $tiempo->segundos, $tiempo->dia);

        $tarjeta->cargar(600);
        $tiempo->AvanzarSegundos(15); $colectivo->dia = $tiempo->dia; $colectivo->hora = $tiempo->hora;
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);

        echo $tarjeta->viajesRealizados . ' ';
        echo $tarjeta->ultimoViajeHora . ' ';

        $this->assertFalse($colectivo->pagarCon($tarjeta));
    }

    public function testQuintoBoletoDia(){
        $tarjeta = new TFranquiciaParcial();
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("115", $tiempo->segundos, $tiempo->dia);
        $tarjeta->cargar(600);

        $boleto = $colectivo->pagarCon($tarjeta);
        $tiempo->AvanzarSegundos(350);
        $boleto = $colectivo->pagarCon($tarjeta);
        $tiempo->AvanzarSegundos(350);
        $boleto = $colectivo->pagarCon($tarjeta);
        $tiempo->AvanzarSegundos(350);
        $boleto = $colectivo->pagarCon($tarjeta);

        $saldo = $tarjeta->saldo;
        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals($saldo - 185, $tarjeta->saldo);

    }

}