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
if(isset($_POST['eliminar'])) {
  $objeto = new AlumnoDAO();
  $alumnos = $objeto->obtenerAlumno();   
  foreach($alumnos as $alumno) {
    if(isset($_POST['eliminar_'.$alumno['codigo']])) {
      $objeto->eliminarAlumno($alumno['codigo']);
    }
  }
}

$objeto = new AlumnoDAO();
$alumnos = $objeto->obtenerAlumno();

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
        <li><a href="cursodao.php">Curso</a></li>
        <li><a href="ProductoLista.php">Producto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Salir</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h2>PRODUCTO</h2>
    <form method="post" action="">
      <?php if(isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php } ?>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Direccion</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($alumnos as $alumno) { ?>
            <tr>
              <td><?php echo $alumno['nombre']; ?></td>
              <td><?php echo $alumno['apellido']; ?></td>
              <td><?php echo $alumno['edad']; ?></td>
              <td><?php echo $alumno['direccion']; ?></td>
              <td>
                <div class="checkbox">
                  <label><input type="checkbox" name="eliminar_<?php echo $alumno['codigo']; ?>">Eliminar</label>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <a href="AlumnoForm.php" class="btn btn-success">AGREGAR</a>
      <a href="AlumnoEditar.php" class="btn btn-warning">EDITAR</a>
      <button type="submit" class="btn btn-danger" name="eliminar">Eliminar seleccionados</button>
    </form>
  </div>


</div>

</body>
</html>