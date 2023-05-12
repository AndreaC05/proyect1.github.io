<?php
require_once('Conexion.php');
class AlumnoDAO {
    private $conn;

    function __construct() {
        $this->conn = (new Conexion('localhost', 'root', '', 'web'))->getConn();
    }

    function __destruct() {
        $this->conn->close();
    }


    function agregarAlumno($nombre, $apellido, $edad, $direccion) {
        $stmt = $this->conn->prepare("INSERT INTO alumnos (nombre, apellido, edad, direccion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $nombre, $apellido, $edad, $direccion);
        return $stmt->execute();
    }

    function obtenerAlumno() {
        $result = $this->conn->query("SELECT codigo , nombre , apellido, edad, direccion FROM alumnos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function actualizarAlumno($codigo, $nombre, $apellido, $edad, $direccion) {
        $stmt = $this->conn->prepare("UPDATE alumnos SET nombre=?, apellido=?, edad=?, direccion=? WHERE codigo=?");
        $stmt->bind_param("ssisi", $nombre, $apellido, $edad, $direccion, $codigo);
        return $stmt->execute();
    }
    function eliminarAlumno($codigo) {
        $stmt = $this->conn->prepare("DELETE FROM alumnos WHERE codigo=?");
        $stmt->bind_param("i", $codigo);
        return $stmt->execute();
    }
}
?>    