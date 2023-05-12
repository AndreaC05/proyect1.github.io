<?php

class Producto {
  public $nombre;
  public $descripcion;
  public $precio;
  public $proveedor;

  public function __construct($nombre, $descripcion, $precio, $proveedor) {
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->precio = $precio;
    $this->proveedor = $proveedor;
  }
}
?>