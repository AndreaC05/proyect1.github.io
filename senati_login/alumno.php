<?php
class alumno {
  private $codalumno;
  private $nombre;
  private $apellidos;
  private $carrera;

  public function __construct($codalumno, $nombre, $apellidos, $carrera) {
    $this->codalumno = $codalumno;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->carrera = $carrera;
  }

  public function getCodalumno() {
    return $this->codalumno;
  }

  public function setCodAlumno($codalumno) {
    $this->codalumno = $codalumno;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getApellidos() {
    return $this->apellidos;
  }

  public function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
  }

  public function getCarrera() {
    return $this->carrera;
  }

  public function setCarrera($carrera) {
    $this->carrera = $carrera;
  }
}
?>