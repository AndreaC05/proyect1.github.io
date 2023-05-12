<?php
session_start();

require_once('Usuario.php');
require_once('cursoDAO.php');

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

  $var_curso = $_POST['curso'];
  $var_descripcion = $_POST['descripcion'];  
  $var_creditos = $_POST['creditos'];
  $var_horas = $_POST['horas'];

  $objeto = new cursoDAO();
  $objeto->agregarCurso($var_curso, $var_descripcion, $var_creditos, $var_horas   );
  
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
  <h2>CURSO</h2>
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
      <label for="nombre">Curso:</label>
      <input type="text" class="form-control" id="curso" name="curso">
    </div>

    <div class="form-group">
      <label for="supercodigo">Descripcion:</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion">
    </div>

    <div class="form-group">
      <label for="supercodigo">Creditos:</label>
      <input type="text" class="form-control" id="creditos" name="creditos">
    </div>

    <div class="form-group">
      <label for="horas">Horas:</label>
      <input type="text" class="form-control" id="horas" name="horas">
    </div>    
    <button type="submit" class="btn btn-default" name="enviar">Ingresar</button>
  </form>
  </div>


</div>

</body>
</html>