<?php
session_start();

require_once('Usuario.php');

// Verificamos si hay una sesión activa
if(isset($_SESSION['usuario'])) {
  // Obtenemos el objeto Usuario de la sesión
  $usuario = unserialize($_SESSION['usuario']);
} else {
  // Redirigimos al login
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>VENTANA</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2>PAGINA</h2>
  <p class="text-right">Hola <?php echo $usuario->nombres; ?></p>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="welcome.php">Inicio</a></li>
        <li><a href="alumnolista.php">Alumno</a></li>
        <li><a href="cursolista.php">Curso</a></li>
        <li><a href="ProductoLista.php">Producto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Salir</a></li>
      </ul>
    </div>
  </nav>
</div>

</body>
</html>