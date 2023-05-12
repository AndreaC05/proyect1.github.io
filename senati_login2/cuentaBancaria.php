<?php

class cuentaBancaria {
  public $nombre;
  public $dni;
  public $cuenta;

  public function __construct($nombre, $dni, $cuenta) {
    $this->nombre = $nombre;
    $this->dni = $dni;
    $this->cuenta = $cuenta;

  }
}
?>