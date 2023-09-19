<?php
namespace TrabajoSube{

class Tiempo{
    public $dia;
    public $segundos;
    private $segundosEnUnDia;

    function __construct(){
        $this->dia = 1;
        $this->segundos = 0;
        $this->segundosEnUnDia = 86400;
    }

    private function ArreglarTiempo(){
        if($this->segundos >= $this->segundosEnUnDia){
            $this->dia +=1;
            $this->segundos -= $this->segundosEnUnDia;
        }
    }
    
    function AvanzarSegundos($_segundos){
        $this->segundos += $_segundos;
        $this->ArreglarTiempo();
    }

    function DiferenciaDeTiempo($_dia, $_segundos){
        if($this->dia == $_dia && $this->segundos > $_segundos){
            return $this->segundos - $_segundos;
        }
        elseif($this->dia > $_dia){
            $segundosFicticios = $this->segundos;
            for($diasPorEncima = $this->dia - $_dia; !($diasPorEncima == $_dia); $diasPorEncima-=1){
                $segundosFicticios += $this->segundosEnUnDia;
            }
            return $segundosFicticios - $_segundos;
        }
        else{
            echo 'El primer tiempo debe ser mayor al segundo';
            return FALSE;
        }
        return TRUE;
    }

}

$tiempo = new Tiempo;

}