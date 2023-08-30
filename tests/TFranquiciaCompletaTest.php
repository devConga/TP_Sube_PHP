<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TFranquiciaCompletaTest extends TestCase{

    public function testSiemprePuedePagar(){
    
        $tarjeta = new TFranquiciaCompleta();
        $colectivo = new Colectivo();
        
        $tarjeta->saldo = -211.84;
        this->assertTrue($colectivo->pagarCon($tarjeta));

    }

}