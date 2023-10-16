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
    $this->assertFalse($tarjeta->cargar(100));}

    public function testUsoFrecuente(){

        $tiempo = new TiempoFalso();
        $tarjeta = new Tarjeta();
        $colectivo = new Colectivo("102R", $tiempo);

        $tarjeta->cargar(6600);

        for($i = 1; $i<=29; $i++){
            $boleto = $colectivo->pagarCon($tarjeta);
            $this->assertEquals(6415, $tarjeta->saldo);
            $tarjeta->cargar(200);
        }



    }

}