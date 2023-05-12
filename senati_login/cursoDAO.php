<?php
require_once('Conexion.php');
class cursoDAO {
    private $conn;

    function __construct() {
        $this->conn = (new Conexion('localhost', 'root', '', 'web'))->getConn();
    }

    function __destruct() {
        $this->conn->close();
    }


    function agregarCurso($curso, $descripcion, $creditos, $horas) {
        $stmt = $this->conn->prepare("INSERT INTO cursos (curso, descripcion, creditos, horas) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $curso, $descripcion, $creditos, $horas);
        return $stmt->execute();
    }

    function obtenerCurso() {
        $result = $this->conn->query("SELECT codigo , curso , descripcion, creditos, horas FROM cursos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function actualizarCurso($codigo, $curso, $descripcion, $creditos, $horas) {
        $stmt = $this->conn->prepare("UPDATE cursos SET curso=?, descripcion=?, creditos=?, horas=? WHERE codigo=?");
        $stmt->bind_param("ssisi", $curso, $descripcion, $creditos, $horas);
        return $stmt->execute();
    }
    function eliminarCurso($codigo) {
        $stmt = $this->conn->prepare("DELETE FROM cursos WHERE codigo=?");
        $stmt->bind_param("i", $codigo);
        return $stmt->execute();
    }
}
?>