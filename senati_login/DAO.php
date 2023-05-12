<?php
require_once('Conexion.php');

class ProductoDAO {
    private $conn;

    function __construct() {
        $this->conn = (new Conexion('localhost', 'root', '', 'web'))->getConn();
    }

    function __destruct() {
        $this->conn->close();
    }

    function agregarProducto($nombre, $descripcion, $precio, $proveedor) {
        $stmt = $this->conn->prepare("INSERT INTO productos (nombre, descripcion, precio, proveedor) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $proveedor);
        return $stmt->execute();
    }

    function obtenerProductos() {
        $result = $this->conn->query("SELECT codigo , nombre , descripcion , precio, proveedor FROM productos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function actualizarProducto($codigo, $nombre, $descripcion, $precio, $proveedor) {
        $stmt = $this->conn->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, proveedor=? WHERE codigo=?");
        $stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $proveedor, $codigo);
        return $stmt->execute();
    }

    function eliminarProducto($codigo) {
        $stmt = $this->conn->prepare("DELETE FROM productos WHERE codigo=?");
        $stmt->bind_param("i", $codigo);
        return $stmt->execute();
    }
}
?>