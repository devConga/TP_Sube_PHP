<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaFCompletaTest extends TestCase{
   
    public function siemprePuedePagar(){
    $colectivo = new Colectivo();
    $tarjeta = new Tarjeta();
    $tarjeta->cargar(300);
    $this->assertInstanceOf(Boleto::class, $colectivo->pagarCon($tarjeta));
}

}