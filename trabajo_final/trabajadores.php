<?php

class Trabajador {

    private $nombre;
    private $categoria;
    private $horas_extra;
    private $tardanzas;
    private $sueldo_base;
    private $phx = 0;

    public function __construct($nombre, $categoria, $horas_extra, $tardanzas) {
        
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->horas_extra = $horas_extra;
        $this->tardanzas = $tardanzas;
        $this->sueldo_base = $this->sueldo_basico($categoria);

    }

    public function __toString() {
        return $this->nombre . " " . $this->categoria . " " . $this->horas_extra . " " . $this->tardanzas;
    }
    
    public function sueldo_basico($categoria) {

        $dic_su = array(
            "A" => 3000,
            "B" => 2500,
            "C" => 2000
        );

        foreach ($dic_su as $key => $value) {

            if ($key == $categoria) {
                if ($value == 3000) {
                    $this->phx = 4;
                    return $value;
                } else if ($value == 2500) {
                    $this->phx = 3;
                    return $value;
                } else if ($value == 2000) {
                    $this->phx = 2;
                    return $value;
                }
            }
            
        }
    }

    public function pago_hora_e() {
        $pghe = (($this->sueldo_base / 240) * $this->horas_extra) * $this->phx;
        return $pghe;
    }

    public function tardanzas_desc() {
        $desc_tard = ($this->sueldo_base / 240) * $this->tardanzas;
        return round($desc_tard, 2);
    }
}

?>
