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

        $i = 0;

        $tarjeta->cargar(4000);
        $tarjeta->cargar(2000);
        $tarjeta->cargar(600);
        /* echo $tarjeta->saldo . " "; */

        /* for($i = 1; $i<=29; $i++){
            echo "Pago numero " . $i . " ";
            $boleto = $colectivo->pagarCon($tarjeta);
            $this->assertEquals(6415, $tarjeta->saldo);
            echo "E ";
            $tarjeta->cargar(200);
            echo $tarjeta->saldo . " ";
        } */

        //-----------------------------------------------------------------------------

        /* for($i = 1; $i<=29; $i++){
            echo "Pago numero " . $i . " ";
            $boleto = $colectivo->pagarCon($tarjeta);
            $this->assertEquals(6415, $tarjeta->saldo);
            $tarjeta->saldo += 185;
        }

        for($i = 30; $i <= 79; $i++){
            echo "Pago numero " . $i . " ";
            $boleto = $colectivo->pagarCon($tarjeta);
            $this->assertEquals(6452, $tarjeta->saldo);
            $tarjeta->saldo += 148;
        } */

        while($this->i < 80){
            if($this->ii<=29){
                echo "Pago numero " . $i . " ";
                $boleto = $colectivo->pagarCon($tarjeta);
                $this->assertEquals(6415, $tarjeta->saldo);
                $tarjeta->saldo += 185;
            }
            if($this->i<=79){
                echo "Pago numero " . $i . " ";
                $boleto = $colectivo->pagarCon($tarjeta);
                $this->assertEquals(6452, $tarjeta->saldo);
                $tarjeta->saldo += 148;
            }
            $this->i += 1;
        }

        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals(6461.25, $tarjeta->saldo);
        $tarjeta->saldo += 138.75;

        $tiempo->AvanzarSegundos(3456000);

        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals(6415, $tarjeta->saldo);

        

    }

}