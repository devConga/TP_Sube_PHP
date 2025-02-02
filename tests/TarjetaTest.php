<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{
   
    public function testCargar(){
    $tarjeta = new Tarjeta();

    $this->assertTrue($tarjeta->cargar(250));
    $this->assertTrue($tarjeta->cargar(600));
    $this->assertTrue($tarjeta->cargar(2000));
    $this->assertFalse($tarjeta->cargar(270));
    $this->assertFalse($tarjeta->cargar(100));
}

    public function testUsoFrecuente30Viajes(){

        $tiempo = new TiempoFalso();
        $tarjeta = new Tarjeta();
        $colectivo = new Colectivo("102R", $tiempo);

        $i = 0;

        $tarjeta->cargar(4000);
        $tarjeta->cargar(2000);

        while($i < 31){
            $boleto = $colectivo->pagarCon($tarjeta);
            $i += 1;
        }

        $this->assertEquals(302, $tarjeta->saldo);

    }

    public function testUsoFrecuente80Viajes(){

        $tiempo = new TiempoFalso();
        $tarjeta = new Tarjeta();
        $colectivo = new Colectivo("102R", $tiempo);

        $i = 0;

        $tarjeta->cargar(4000);
        $tarjeta->cargar(2000);

        while($i < 30){
            $boleto = $colectivo->pagarCon($tarjeta);
            $i += 1;
        }

        $tarjeta->cargar(4000);
        $tarjeta->cargar(2000);

        while($i < 70){
            $boleto = $colectivo->pagarCon($tarjeta);
            $i += 1;
        }
        $tarjeta->cargar(2000);
        while($i < 81){
            $boleto = $colectivo->pagarCon($tarjeta);
            $i += 1;
        }

        $this->assertEquals(911.25, $tarjeta->saldo);

    }

}