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

}