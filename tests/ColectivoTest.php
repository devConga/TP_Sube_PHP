<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
   
    $colectivo = new Colectivo;
    $tarjeta = new Tarjeta;
    
    $this->assertFalse($colectivo->pagarCon($tarjeta));

}