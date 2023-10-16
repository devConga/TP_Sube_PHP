<?php
namespace TrabajoSube{

class TiempoFalso implements TiempoInterface{
    protected $dia;
    protected $segundos;
    protected $segundosEnUnDia;
    protected $indexSemana;
    protected $diaSemana;
    protected $semana = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");

    function __construct(){
        $this->dia = 1;
        $this->indexSemana = 1;
        $this->diaSemana = $this->semana[$this->indexSemana];
        $this->segundos = 0;
        $this->segundosEnUnDia = 86400;
    }

    private function ArreglarTiempo(){
        if($this->segundos >= $this->segundosEnUnDia){
            $this->dia +=1;
            $this->indexSemana +=1;
            if($this->indexSemana > 7){
                $this->indexSemana = 0;
            }
            $this->diaSemana = $this->semana[$this->indexSemana];
            $this->segundos -= $this->segundosEnUnDia;
        }
    }
    
    function AvanzarSegundos($_segundos){
        $this->segundos += $_segundos;
        $this->ArreglarTiempo();
    }

    public function time(){
        return $this->segundos;
    }

    public function day(){
        return $this->dia;
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
}