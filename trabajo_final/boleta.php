<?php

require_once 'trabajadores.php';

class Boleta extends Trabajador {

    private $descuento;
    private $pago_hora_e;
    private $sueldo_neto;

    public function __construct($nombre, $categoria, $horas_extra, $tardanzas) {

        parent::__construct($nombre, $categoria, $horas_extra, $tardanzas / 60);

        $this->sueldo_base = $this->sueldo_basico($categoria);
        
    }

    public function imprimir_boleta() {
        
        $this->descuento = $this->tardanzas_desc();
        $this->pago_hora_e = $this->pago_hora_e();
        $this->sueldo_neto = ($this->sueldo_base + $this->pago_hora_e) - $this->descuento;

        $imp_b = "
        Sueldo Basico: $this->sueldo_base
        Descuento Tardanzas: " . round($this->descuento, 2) . "
        Pago Horas Extra: " . round($this->pago_hora_e, 2) . "
        Sueldo Neto: " . round($this->sueldo_neto, 2) . "
        ";

        return $imp_b;
    }
}

?>
