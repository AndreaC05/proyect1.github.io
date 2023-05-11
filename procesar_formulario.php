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

// Obtener el id ingresado por el usuario
	$id = $_POST['id'];

// Consultar la base de datos por el id
	$sql = "SELECT * FROM mi_tabla WHERE id = $id";
	$resultado = $conexion->query($sql);

// Verificar si hay resultados
	if ($resultado->num_rows > 0) {
    // Mostrar los datos del usuario
    		$fila = $resultado->fetch_assoc();
    		echo "Nombre: " . $fila["nombre"] . "<br>";
    		echo "Edad: " . $fila["edad"] . "<br>";
    		echo "Correo: " . $fila["correo"] . "<br>";
	} else {
    		echo "El usuario no existe.";
	}

// Cerrar la conexión
	$conexion->close();
?>
