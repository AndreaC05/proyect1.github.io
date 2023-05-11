<?php
// Clase para la conexión a la base de datos
class ConexionBD {
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "mi_bd";

	protected function conectar() {
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($conn->connect_error) {
			die("Error al conectar a la base de datos: " . $conn->connect_error);
		}
		return $conn;
	}
}

// Clase para la consulta a la tabla "mi_tabla"
class ConsultaTabla extends ConexionBD {
	public function obtenerDatos($id) {
		$conn = $this->conectar();
		$sql = "SELECT nombre, edad, correo FROM mi_tabla WHERE id = $id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo "<p>Nombre: " . $row["nombre"] . "</p>";
			echo "<p>Edad: " . $row["edad"] . "</p>";
			echo "<p>Correo: " . $row["correo"] . "</p>";
		} else {
			echo "No se encontraron resultados para el ID ingresado.";
		}
		$conn->close();
	}
}

?>
