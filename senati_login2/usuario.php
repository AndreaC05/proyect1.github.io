<?php
class usuario {
  public $nombres;
  public $usuario;
  public $clave;

  function __construct($nombres, $usuario, $clave) {
    $this->nombres = $nombres;
    $this->usuario = $usuario;
    $this->clave = $clave;
  }
}
?>