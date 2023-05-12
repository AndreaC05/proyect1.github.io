<?php
require_once('Conexion.php');
class aulaDAO {
    private $conn;

    function __construct() {
        $this->conn = (new Conexion('localhost', 'root', '', 'web'))->getConn();
    }

    function __destruct() {
        $this->conn->close();
    }


    function agregarAula($aula, $descripcion, $creditos, $horas) {
        $stmt = $this->conn->prepare("INSERT INTO aula (aula, seccion, sede, alumnado) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $aula, $seccion, $sede, $alumnado);
        return $stmt->execute();
    }

    function obtenerAula() {
        $result = $this->conn->query("SELECT codigo , aula , seccion, sede, alumnado FROM aula");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function actualizarAula($codigo, $aula, $seccion, $sede, $alumnado) {
        $stmt = $this->conn->prepare("UPDATE aula SET aula=?, seccion=?, sede=?, alumnado=? WHERE codigo=?");
        $stmt->bind_param("ssisi", $aula, $seccion, $sede, $alumnado);
        return $stmt->execute();
    }
    function eliminarAula($codigo) {
        $stmt = $this->conn->prepare("DELETE FROM aula WHERE codigo=?");
        $stmt->bind_param("i", $codigo);
        return $stmt->execute();
    }
}
?>