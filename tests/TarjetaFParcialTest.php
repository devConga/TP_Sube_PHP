<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaFParcialTest extends TestCase{
   
    public function FParcialEsMitad(){
    
        $tarjeta = new TarjetaFranquiciaParcial();
        $colectivo = new Colectivo();
        $this->assertEquals($colectivo->boletoNormal * $colectivo->descuento2multiplicador($tarjeta->porcentajeDescuento), $colectivo->boletoNormal/2);

}

}