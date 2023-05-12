<?php
session_start();

require_once('Usuario.php');
require_once('cursodao.php');

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
  $objeto = new cursoDAO();
  $cursos = $objeto->obtenerCurso();   
  foreach($cursos as $curso) {
    if(isset($_POST['eliminar_'.$curso['codigo']])) {
      $objeto->eliminarCurso($curso['codigo']);
    }
  }
}

$objeto = new cursoDAO();
$cursos = $objeto->obtenerCurso();

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
    <h2>CURSOS</h2>
    <form method="post" action="">
      <?php if(isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php } ?>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Curso</th>
            <th>Descripcion</th>
            <th>Creditos</th>
            <th>Horas</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($cursos as $curso) { ?>
            <tr>
              <td><?php echo $curso['curso']; ?></td>
              <td><?php echo $curso['descripcion']; ?></td>
              <td><?php echo $curso['creditos']; ?></td>
              <td><?php echo $curso['horas']; ?></td>
              <td>
                <div class="checkbox">
                  <label><input type="checkbox" name="eliminar_<?php echo $curso['codigo']; ?>">Eliminar</label>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <a href="cursoform.php" class="btn btn-success">AGREGAR</a>
      <a href="cursoeditar.php" class="btn btn-warning">EDITAR</a>
      <button type="submit" class="btn btn-danger" name="eliminar">Eliminar seleccionados</button>
    </form>
  </div>


</div>

</body>
</html>