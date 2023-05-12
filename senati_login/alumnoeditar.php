<?php
session_start();

require_once('Usuario.php');
require_once('alumnodao.php');

// Verificamos si hay una sesión activa
if(isset($_SESSION['usuario'])) {
  // Obtenemos el objeto Usuario de la sesión
  $usuario = unserialize($_SESSION['usuario']);
} else {
  // Redirigimos al login
  header("Location: index.php");
}

// Verificamos si se ha enviado el formulario
if(isset($_POST['enviar'])) {

  $var_codigo = $_POST['codigo'];
  $var_nombre = $_POST['nombre'];
  $var_apellido = $_POST['apellido'];  
  $var_edad = $_POST['edad'];
  $var_direccion = $_POST['direccion'];

  $objeto = new alumnodao();
  $objeto->actualizarAlumno($var_codigo, $var_nombre, $var_apellido, $var_edad, $var_direccion);
  
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
        <li><a href="aulaLista.php">Aula</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Salir</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
  <h2>CURSO</h2>
  <form method="post" action="">
    <?php if(isset($error)) { ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>

    <div class="form-group">
      <label for="codigo">Codigo:</label>
      <input type="text" class="form-control" id="codigo" name="codigo">
    </div>

        <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    
    <div class="form-group">
      <label for="supercodigo">apellido:</label>
      <input type="text" class="form-control" id="apellido" name="apellido">
    </div>

    <div class="form-group">
      <label for="supercodigo">Edad:</label>
      <input type="text" class="form-control" id="edad" name="edad">
    </div>

    <div class="form-group">
      <label for="direccion">Direccion:</label>
      <input type="text" class="form-control" id="direccion" name="direccion">
    </div>
    <button type="submit" class="btn btn-default" name="enviar">Ingresar</button>
  </form>
  </div>


</div>

</body>
</html>