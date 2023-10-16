<?php
namespace TrabajoSube{

    interface TiempoInterface {
        public function time();
        public function day();
        public function dayOTW();
    }
class Tiempo implements TiempoInterface{
        public function time(){
            return time();
        }

        public function day(){
            return date('d');
        }

        public function dayOTW(){
            return date('D');
        }
    }
}