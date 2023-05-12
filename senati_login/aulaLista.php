<?php
session_start();

require_once('Usuario.php');
require_once('aulaDAO.php');

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
  $objeto = new aulaDAO();
  $aulas= $objeto->obtenerAula();   
  foreach($aula as $aula) {
    if(isset($_POST['eliminar_'.$aula['codigo']])) {
      $objeto->eliminarAula($aula['codigo']);
    }
  }
}

$objeto = new aulaDAO();
$aulas = $objeto->obtenerAula();

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
    <h2>AULAS</h2>
    <form method="post" action="">
      <?php if(isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php } ?>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Aula</th>
            <th>Seccion</th>
            <th>Sede</th>
            <th>Alumnado</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($aulas as $aula) { ?>
            <tr>
              <td><?php echo $aula['aula']; ?></td>
              <td><?php echo $aula['seccion']; ?></td>
              <td><?php echo $aula['sede']; ?></td>
              <td><?php echo $aula['alumnado']; ?></td>
              <td>
                <div class="checkbox">
                  <label><input type="checkbox" name="eliminar_<?php echo $aula['codigo']; ?>">Eliminar</label>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <a href="aulaForm.php" class="btn btn-success">AGREGAR</a>
      <a href="aulaEditar.php" class="btn btn-warning">EDITAR</a>
      <button type="submit" class="btn btn-danger" name="eliminar">Eliminar seleccionados</button>
    </form>
  </div>


</div>

</body>
</html>