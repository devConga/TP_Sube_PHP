<?php
namespace TrabajoSube{

    interface TiempoInterface {
        public function time();
        public function day();
    }
class Tiempo implements TiempoInterface{
        public function time(){
            return time();
        }

        public function day(){
            return date('d');
        }
    }
}