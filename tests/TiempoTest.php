<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TiempoTest extends TestCase{
    public function testDay(){
        $tiempo = new Tiempo();
        $this->assertEquals(date('d'), $tiempo->day());
    }

    public function testDayOTW(){
        $tiempo = new Tiempo();
        $this->assertEquals(date('D'), $tiempo->dayOTW());
    }
    public function testTime24Hr(){
        $tiempo = new Tiempo();
        $this->assertEquals(date('G'), $tiempo->time24Hr());
    }

    public function testMonth(){
        $tiempo = new Tiempo();
        $this->assertEquals(date('M'), $tiempo->month());
    }

    public function testTime(){
        $tiempo = new Tiempo();
        $this->assertEquals(time(), $tiempo->day());
    }
}