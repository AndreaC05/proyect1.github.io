<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mi_bd";
$conexion = new mysqli($host, $user, $pass, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta a la base de datos
$sql = "SELECT * FROM mi_tabla";
$resultado = $conexion->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 1) {
    // Crear la tabla HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Correo</th></tr>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr><td>".$fila["id"]."</td><td>".$fila["nombre"]."</td><td>".$fila["edad"]."</td><td>".$fila["correo"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay resultados.";
}

// Cerrar la conexión
$conexion->close();
?>
