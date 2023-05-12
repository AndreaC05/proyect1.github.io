<?php
require_once('Conexion.php');

class cuentaBancariaDAO {
    private $conn;

    function __construct() {
        $this->conn = (new Conexion('localhost', 'root', '', 'web'))->getConn();
    }

    function __destruct() {
        $this->conn->close();
    }

    function agregarCuenta(cuentaBancaria $bancaria) {
        $stmt = $this->conn->prepare("INSERT INTO bancaria (nombre, dni, cuenta) VALUES (?, ?, ?)");
        $stmt->bind_param("sdd", $bancaria->nombre, $bancaria->dni, $bancaria->cuenta);
        return $stmt->execute();
    }

    function obtenerCuenta() {
        $result = $this->conn->query("SELECT codigo , nombre , dni , cuenta FROM bancaria");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function actualizarCuenta($codigo, cuentaBancaria $bancaria) {
        $stmt = $this->conn->prepare("UPDATE bancaria SET nombre=?, dni=?, cuenta=? WHERE codigo=?");
        $stmt->bind_param("sddi", $bancaria->nombre, $bancaria->dni, $bancaria->cuenta, $codigo);
        return $stmt->execute();
    }

    function eliminarCuenta($codigo) {
        $stmt = $this->conn->prepare("DELETE FROM bancaria WHERE codigo=?");
        $stmt->bind_param("i", $codigo);
        return $stmt->execute();
    }
}
?>